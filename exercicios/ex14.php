<?php
// Exemplo de inicialização e uso de métodos

class Pessoa {
    private $nome;
    private $idade;

    public function __construct($nome, $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function apresentar() {
        return "Olá, meu nome é {$this->nome} e tenho {$this->idade} anos.";
    }
}

$pessoa = new Pessoa("Maria", 30);
echo $pessoa->apresentar(); // Exibe: Olá, meu nome é Maria e tenho 30 anos.
?>
