<?php
    // Definindo a classe
    class Carro {
    // Propriedades
    public $cor;
    public $modelo;

    // Método construtor
    public function __construct($cor, $modelo) {
    $this->cor = $cor;
    $this->modelo = $modelo;
    }

    // Método para exibir detalhes do carro
    public function exibirDetalhes() {
    return "Modelo: $this->modelo, Cor: $this->cor";
    }
    }

    // Criando um objeto da classe Carro
    $meuCarro = new Carro("vermelho", "Fusca");

    // Chamando um método do objeto
    echo $meuCarro->exibirDetalhes();
?>