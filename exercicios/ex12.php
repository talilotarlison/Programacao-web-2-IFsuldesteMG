<?php
// Exemplo de escrita em arquivo

$nome_arquivo = "saida.txt";
$texto = "Este é um exemplo de texto gravado no arquivo.";

if (file_put_contents($nome_arquivo, $texto)) {
    echo "Arquivo gravado com sucesso!";
} else {
    echo "Erro ao gravar o arquivo.";
}
?>
