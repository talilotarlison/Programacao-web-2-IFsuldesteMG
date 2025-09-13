<?php
    // O problema é que, ao rodar com o servidor embutido do PHP (php -S), ele só encaminha requisições para o index.php automaticamente se
    // você usar um arquivo .htaccess ou configurar o roteamento corretamente. Caso contrário, ele procura arquivos físicos (ex: /home) e,
    // como não existem, retorna 404.

    // Para funcionar com roteamento amigável no servidor embutido, adicione um arquivo router.php assim:

    // php -S localhost:8000 router.php

    // router.php
    if (php_sapi_name() == 'cli-server') {
        $url = parse_url($_SERVER["REQUEST_URI"]);
        $file = __DIR__ . $url["path"];
        if (is_file($file)) {
            return false; // serve o arquivo físico
        }
    }

    require_once __DIR__ . '/index.php';

?>