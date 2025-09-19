<?php
// Exemplo de uma classe simples em PHP

class Carro {
    public $marca;
    public $modelo;
    public $cor;

    public function __construct($marca, $modelo, $cor) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->cor = $cor;
    }

    public function exibirDetalhes() {
        return "Marca: $this->marca, Modelo: $this->modelo, Cor: $this->cor";
    }
}

$carro = new Carro("Fiat", "Uno", "Azul");
echo $carro->exibirDetalhes();
?>
