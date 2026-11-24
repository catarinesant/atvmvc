<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function ($classe) {

    $prefixo = 'App\\Controllers\\';

    if (strncmp($prefixo, $classe, strlen($prefixo)) !== 0) {
        return;
    }

    $nomeArquivo = substr($classe, strlen($prefixo));

    $caminho = __DIR__ . '/../app/controllers/' . str_replace('\\', '/', $nomeArquivo) . '.php';

    if (file_exists($caminho)) {
        require_once $caminho;
    }

});

$url = $_GET['url'] ?? parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$url = trim($url, '/');

if ($url == '') {
    $url = 'tecnico/index';
}

$partes = explode('/', $url);

$controllerNome = ucfirst($partes[0]) . 'Controller';

$classeCompleta = "App\\Controllers\\" . $controllerNome;

$acao = $partes[1] ?? 'index';

if (class_exists($classeCompleta)) {

    $controller = new $classeCompleta();

    if (method_exists($controller, $acao)) {

        $parametros = array_slice($partes, 2);

        call_user_func_array([$controller, $acao], $parametros);

    } else {
        echo "Método não encontrado!";
    }

} else {
    echo "Controlador não encontrado!";
}