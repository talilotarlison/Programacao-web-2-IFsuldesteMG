<?php
// Exemplo de variáveis superglobais em PHP

// $_GET: Usada para obter dados via URL
if (isset($_GET['nome'])) {
    echo "Olá, " . $_GET['nome'] . "!";
}

// $_POST: Usada para obter dados via formulário (exemplo abaixo)

// $_SESSION: Usada para armazenar dados temporários durante uma sessão
session_start();
$_SESSION['usuario'] = "João";

// $_COOKIE: Usada para ler e definir cookies no navegador
setcookie("usuario", "Maria", time() + 3600);

// Exibindo valores das variáveis superglobais
echo "<br>Variável de sessão: " . $_SESSION['usuario'];
echo "<br>Cookie de usuário: " . (isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : "Não definido");
?>
