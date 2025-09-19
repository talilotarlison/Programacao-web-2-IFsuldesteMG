<?php
// Exemplo de referências de variáveis

$a = 10;
$b = &$a; // $b é uma referência a $a

echo "Valor de a: $a<br>"; // Exibe: 10
echo "Valor de b: $b<br>"; // Exibe: 10

$b = 20; // Alterando o valor de b

echo "Novo valor de a: $a<br>"; // Exibe: 20
echo "Novo valor de b: $b<br>"; // Exibe: 20


// Observações:

// Variáveis Superglobais: São usadas para acessar dados de fora do escopo local, como dados de formulários, sessões, cookies, etc. 
// Exemplos: $_GET, $_POST, $_SESSION, $_COOKIE, etc.

// Variáveis de Escopo: Mostra a diferença entre variáveis locais e globais, e como você pode acessar as globais dentro de funções com 
// a palavra-chave global.

// Variáveis de Referência: Quando você usa uma referência (&), você cria uma ligação entre duas variáveis. 
// Alterar o valor de uma afeta a outra.

// Esses exemplos devem ser úteis para entender como as variáveis funcionam em PHP em diferentes contextos. 
// Se precisar de mais alguma coisa ou ajustes, estou à disposição!

?>
