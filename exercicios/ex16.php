<?php
// Exemplo de diferentes tipos de dados

$inteiro = 42; // Inteiro
$ponto_flutuante = 3.14; // Ponto flutuante
$texto = "Olá, mundo!"; // String
$verdadeiro = true; // Booleano

// Convertendo tipos de dados
$texto_para_inteiro = (int)$texto; // Conversão para inteiro (resulta em 0)
$flutuante_para_string = (string)$ponto_flutuante; // Conversão para string

// Exibindo valores e tipos
echo "Inteiro: $inteiro (" . gettype($inteiro) . ")<br>";
echo "Ponto flutuante: $ponto_flutuante (" . gettype($ponto_flutuante) . ")<br>";
echo "Texto: $texto (" . gettype($texto) . ")<br>";
echo "Booleano: $verdadeiro (" . gettype($verdadeiro) . ")<br>";

echo "Texto para inteiro: $texto_para_inteiro (" . gettype($texto_para_inteiro) . ")<br>";
echo "Flutuante para string: $flutuante_para_string (" . gettype($flutuante_para_string) . ")<br>";
?>
