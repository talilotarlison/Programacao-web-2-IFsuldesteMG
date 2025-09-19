<?php
// Exemplo de leitura de arquivo

$nome_arquivo = "exemplo.txt"; // Certifique-se de que o arquivo exemplo.txt existe

if (file_exists($nome_arquivo)) {
    $conteudo = file_get_contents($nome_arquivo);
    echo "Conteúdo do arquivo:<br>" . nl2br($conteudo);
} else {
    echo "O arquivo não existe!";
}
?>
