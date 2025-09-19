<?php
// https://www.alura.com.br/conteudo/php-oo-heranca-polimorfirmo-interfaces?srsltid=AfmBOoozXYx7turTU2fOzojdLLuqOU5mgyenbQfTEb0iLK4Gyg2ggMXq
// https://www.php.net/manual/en/language.oop5.inheritance.php
class Endereco
{
    private $cidade;
    private $bairro;
    private $rua;
    private $numero;

    public function __construct(string $cidade, string $bairro, string $rua, string $numero)
    {
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->numero = $numero;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function getRua(): string
    {
        return $this->rua;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

}