
<?php
    include_once 'services/middlewareAuth.php';
    include_once 'services/renderView.php';

    class SairController{
        public function handle($view){
            // Inicia a sessão
            session_start();
            
            // Verifica autenticação
            MiddlewareAuth::checkAuth('/login');

            // Destroi todas as variáveis de sessão
            $_SESSION = array();

            // Se desejar destruir o cookie de sessão, descomente as linhas abaixo
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            // Destroi a sessão
            session_destroy();

            // Redireciona para a página inicial
            // header('Location: /login');
            RenderView::renderPage($view,[]);
            exit;
        }
    }
?>
