<?php
    include_once 'database/conection.php';
    include 'models/LoginModel.php';
    include_once 'services/renderView.php';
    include_once 'services/middlewareAuth.php';

    class LoginController{
        public function handle($view){

            // Verifica autenticação
            MiddlewareAuth::isAuthenticated('/home');

            // Conexão com o banco de dados SQLite
            $db = Database::getConnection();
            $loginModel = new LoginModel($db);
            // $loginModel->createTableIfNotExists();

            $erro = '';    // Conexão com o banco de dados SQLite

            // Conexão com o banco de dados SQLite
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'] ?? '';
                $senha = $_POST['senha'] ?? '';

                // Consulta ao banco de dados
                $usuario = $loginModel->verificarUsuario($email);

                if ($usuario && password_verify($senha, $usuario['senha'])) {
                    // Login bem-sucedido
                    $_SESSION['usuario'] = $usuario['nome'];
                    header('Location: /home');
                    exit;
                } else {
                    $erro = 'E-mail ou senha inválidos.';
                }
            }


            RenderView::renderPage($view, ['erro' => $erro ?? '']);
            // include $view;
            exit;
        }
    }
?>