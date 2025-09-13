<?php
    require_once('database/conection.php');
    include 'models/TransacoesModel.php';
    include_once 'services/renderView.php';
    include_once 'services/middlewareAuth.php';

    class HomeController{
        public function handle($view){
            // Verifica autenticação
            MiddlewareAuth::checkAuth('/login');

            // conexao aqui
            $db = Database::getConnection();
            // Criação da tabela se não existir
            $trasacoesModel = new TransacoesModel($db);
            $trasacoesModel->createTableIfNotExists();

            // Remover transação
            if (isset($_GET['remover'])) {
                $id = $_GET['remover'];
                $trasacoesModel->removerTransacao($id);
                header("Location: /home");
                exit;
            }

            // Adicionar transação
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $transacao = (object) [
                    'nome'  => $_POST['nome'] ?? '',
                    'tipo'  => $_POST['tipo'] ?? '',
                    'valor' => $_POST['valor'] ?? '',
                    'data'  => $_POST['data'] ?? '',
                ];

                // Validação simples
                $nome = trim($transacao->nome);
                $valor = floatval($transacao->valor);
                $tipo = $transacao->tipo;
                $data = trim($transacao->data);

                if ($nome && in_array($tipo, ['entrada','saida']) && $data) {
                    $trasacoesModel->adicionarTransacao($nome, $valor, $tipo, $data);
                    header("Location: /home");
                    exit;
                }
            }

            // Listar transações
            $transacoes = $trasacoesModel->listarTransacoes();

            // Renderiza a view com os dados
            // @view -> @transacoes
            RenderView::renderPage($view, ['transacoes' => $transacoes]);
            // include $view;
            exit;
        }
    }
?>