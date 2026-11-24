
<?php

require_once __DIR__ . "/app/controllers/TecnicoController.php";

$controller = new TecnicoController();

$url = $_GET["url"] ?? "tecnico/index";

$partes = explode("/", $url);

$acao = $partes[1] ?? "index";

if ($partes[0] == "tecnico") {

    if ($acao == "index") {
        $controller->index();

    } elseif ($acao == "perfil") {
        $id = $partes[2] ?? "";
        $controller->perfil($id);

    } else {
        echo "Página não encontrada!";
    }

} else {
    echo "Controlador não encontrado!";
}