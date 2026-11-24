
<?php

$caminho = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$arquivo = __DIR__ . $caminho;

if ($caminho !== '/' && is_file($arquivo)) {
    return false;
}

require_once __DIR__ . '/index.php';