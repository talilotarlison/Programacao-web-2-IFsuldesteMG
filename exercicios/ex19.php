<?php
// Exemplo de escopo de variáveis

$globalVar = "Variável global";

function exemploEscopo() {
    $localVar = "Variável local";
    echo $localVar . "<br>"; // Acessa a variável local dentro da função
    //echo $globalVar; // Isso geraria um erro, pois a variável global não pode ser acessada diretamente
}

exemploEscopo();

// Acessando a variável global fora da função
echo $globalVar . "<br>"; // Acessa a variável global diretamente

// Usando o modificador global dentro da função
function exemploEscopoGlobal() {
    global $globalVar; // Acessa a variável global dentro da função
    echo $globalVar . "<br>"; // Exibe: Variável global
}

exemploEscopoGlobal();
?>
