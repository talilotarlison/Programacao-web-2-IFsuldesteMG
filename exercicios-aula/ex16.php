<?php
    $numero1 = 5;
    $numero2 = 6;

    // Para verificar se $numero1 é maior ou menor que $numero2, você pode usar os operadores de comparação (>, <, >=, <=, ==, !=). 
    // Neste caso, você deseja comparar se $numero1 é maior ou menor que $numero2. Vou usar a estrutura if-else para isso.

    // Verificando se $numero1 é maior ou menor que $numero2
    if ($numero1 > $numero2) {
        echo "{$numero1} é maior que {$numero2}.<br>";
    } elseif ($numero1 < $numero2) {
        echo "{$numero1} é menor que {$numero2}.<br>";
    } else {
        echo "{$numero1} é igual a {$numero2}.<br>";
    }
?>
