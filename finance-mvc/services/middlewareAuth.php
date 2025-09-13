<?php

    class MiddlewareAuth
    {
        public static function checkAuth(string $rotaRedirecionamento = '/login')
        {   # sessao do usuario
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            if (!isset($_SESSION['usuario'])) {
                header("Location: $rotaRedirecionamento");
                exit;
            }
        }

        public static function isAuthenticated(string $rotaRedirecionamento = '/home')
        {   # sessao do usuario
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            if (isset($_SESSION['usuario'])) {
                header("Location: $rotaRedirecionamento");
                exit;
            }
        }
    }
?>