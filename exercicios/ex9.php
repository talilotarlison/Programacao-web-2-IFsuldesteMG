<?php
// Exemplo de manipulação de arrays

$notas = [8, 9, 7, 6, 10];

// Acessando elementos do array
echo "Nota do segundo aluno: " . $notas[1] . "<br>";

// Calculando a média
$media = array_sum($notas) / count($notas);
echo "Média das notas: " . $media;
?>
