<?php
    // Pegando o parâmetro 'x' da URL
    $json = $_GET['dados'];

    // Decodificando o JSON para um array associativo ou objeto
    $obj = json_decode($json,true); // Passando `true` para retornar um array associativo
    print_r($json);
?>