<?php
// Exemplo de variáveis dinâmicas

$nome = "Maria";
$$nome = "João"; // A variável $nome contém "Maria", então cria-se a variável $Maria

echo $nome . "<br>";   // Exibe: Maria
echo $$nome . "<br>";  // Exibe: João (referência à variável $Maria)

// Criando variáveis dinamicamente com loop
for ($i = 1; $i <= 3; $i++) {
    $$"var$i" = "Valor $i"; // Cria variáveis $var1, $var2, $var3
}

echo $var1 . "<br>"; // Exibe: Valor 1
echo $var2 . "<br>"; // Exibe: Valor 2
echo $var3 . "<br>"; // Exibe: Valor 3
?>
