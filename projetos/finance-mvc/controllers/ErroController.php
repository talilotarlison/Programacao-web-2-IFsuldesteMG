<?php
    include_once 'services/middlewareAuth.php';
    include_once 'services/renderView.php';

    class ErroController{
        public function handle($view){
            // Verifica autenticação
            MiddlewareAuth::checkAuth('/login');
            // Renderiza a view com os dados
            RenderView::renderPage($view,[]);
            // include $view;

            exit;
        }
    }
?>