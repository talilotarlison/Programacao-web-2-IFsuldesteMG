<?php
// Exemplo de manipulação de strings

$nome = "João da Silva";

// Convertendo para maiúsculas
echo strtoupper($nome) . "<br>"; // Exibe: JOÃO DA SILVA

// Substituindo parte da string
$novo_nome = str_replace("João", "Carlos", $nome);
echo $novo_nome . "<br>"; // Exibe: Carlos da Silva
?>
