<?php
// objeto literal
//Em PHP, você pode criar um objeto similar a um objeto JavaScript usando a palavra-chave `stdClass` ou criando uma classe customizada. Aqui estão dois exemplos:

$carro = new stdClass();
$carro->ano = 2023;

// Para acessar o valor
echo $carro->ano; // Saída: 2023
echo PHP_EOL;
// Usando uma Classe Customizada

class Carro {
public $marca;
public $ano;

public function __construct($marca,$ano) {
$this->marca = $marca;
$this->ano = $ano;
}
}

$carro = new Carro("Ford",2023);

// Para acessar o valor
printf( "Carro = { marca : ".$carro->marca. ", ano : ". $carro->ano."}"); // Saída: 2023

echo PHP_EOL;

//Se você estiver gerando texto em um formato que pode incluir quebras de linha (por exemplo, texto de um banco de dados), pode usar `nl2br()` para converter quebras de linha em `<br>` para exibição:
$texto = "Linha 1\nLinha 2\nLinha 3";
echo nl2br($texto);

?>