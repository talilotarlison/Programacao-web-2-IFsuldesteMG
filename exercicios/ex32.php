<?php

    class Carro {
    public $modelo;
    public $marca;
    public $ano;

    public function __construct($modelo,$marca,$ano) {
    $this->$modelo =$modelo;
    $this->marca = $marca;
    $this->ano = $ano;
    }
    public function object(){
    return "Carro = { modelo : ".$this->modelo. ", marca : ".$this->marca. ", ano : ".$this->ano."}"; // object

    }
    }

    $carro = new Carro("Fusca","Ford",2023);

    // Para acessar o valor

    print($carro->object());

?>