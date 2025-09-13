<?php
    require_once('database/conection.php');
    include 'models/CadastroModel.php';
    include_once 'services/renderView.php';
    include_once 'services/middlewareAuth.php';

    class CadastroController{
        public function handle($view){
            // Verifica autenticação
            MiddlewareAuth::isAuthenticated('/home');

            // Conexão com o banco SQLite
            $db = Database::getConnection();
            // Criação da tabela se não existir
            $cadastroModel = new CadastroModel($db);
            $cadastroModel->createTableIfNotExists();

            // Variáveis para mensagens
            $erro = '';
            $sucesso = '';

            // Processa o formulário
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome = trim($_POST['nome'] ?? '');
                $datan = trim($_POST['datan'] ?? '');
                $email = trim($_POST['email'] ?? '');
                $senha = $_POST['senha'] ?? '';
                $confirma = $_POST['confirma'] ?? '';

                // Validação simples
                if (!$nome || !$datan || !$email || !$senha || !$confirma) {
                    $erro = 'Preencha todos os campos.';
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $erro = 'Email inválido.';
                } elseif ($senha !== $confirma) {
                    $erro = 'As senhas não conferem.';
                } else {
                    // Criptografa a senha
                    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
                    // Tenta inserir no banco
                    // $stmt = $cadastroModel->prepare("INSERT INTO usuarios (nome, datan, email, senha) VALUES (?, ?, ?, ?)");
                    try {
                        $cadastroModel->cadastrarUsuario($nome, $datan, $email, $senhaHash);
                        $sucesso = 'Cadastro realizado com sucesso!';
                    } catch (PDOException $e) {
                        if ($e->getCode() == 23000) {
                            $erro = 'Email já cadastrado.';
                        } else {
                            $erro = 'Erro ao cadastrar: ' . $e->getMessage();
                        }
                    }
                }
            }

            // Renderiza a view com mensagens
            //  @view -> @erro, @sucesso
            RenderView::renderPage($view, ['erro' => $erro, 'sucesso' => $sucesso]);
            // extract(['erro' => $erro, 'sucesso' => $sucesso]);
            // include $view;
            exit;
        }
    }
?>