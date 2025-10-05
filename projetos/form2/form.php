<?php

// 1 - metodo procedural
    // $nome = $_POST['nome'];
    // $telefone = $_POST['telefone'];
    // $data_nascimento = $_POST['data_nascimento'];
    // $rua = $_POST['rua'];
    // $cidade = $_POST['cidade'];
    // $mensagem = $_POST['mensagem'];

    // echo "Nome: $nome <br>";
    // echo "Telefone: $telefone <br>";
    // echo "Data de Nascimento: $data_nascimento <br>";
    // echo "Rua: $rua <br>";
    // echo "Cidade: $cidade <br>";
    // echo "Mensagem: $mensagem <br>";

// 2 - metodo orientado a objetos
    class FormData {
        public $nome;
        public $telefone;
        public $data_nascimento;
        public $rua;
        public $cidade;
        public $mensagem;

        public function __construct($data) {
            $this->nome = $data['nome'] ?? '';
            $this->telefone = $data['telefone'] ?? '';
            $this->data_nascimento = $data['data_nascimento'] ?? '';
            $this->rua = $data['rua'] ?? '';
            $this->cidade = $data['cidade'] ?? '';
            $this->mensagem = $data['mensagem'] ?? '';
        }

        public function exibir() {
            echo "Nome: {$this->nome} <br>";
            echo "Telefone: {$this->telefone} <br>";
            echo "Data de Nascimento: {$this->data_nascimento} <br>";
            echo "Rua: {$this->rua} <br>";
            echo "Cidade: {$this->cidade} <br>";
            echo "Mensagem: {$this->mensagem} <br>";
        }
    }

    $formData = new FormData($_POST);
    $formData->exibir();
    print $formData->nome;

// 3 - metodo orientado a objetos com JSON
// https://www.php.net/manual/pt_BR/language.types.object.php

    // $obj = (object) [
    //     'nome' =>$_POST['nome'],
    //     'telefone' =>$_POST['telefone'],
    //     'data_nascimento' => $_POST['data_nascimento'],
    //     'rua' =>$_POST['rua'],
    //     'cidade' => $_POST['cidade'],
    //     'mensagem' => $_POST['mensagem'],
    // ];

    // $json = json_encode($obj);
    // echo $json;
    // header("Location: salve.php?dados=$json");
    // echo $obj->nome;
?>