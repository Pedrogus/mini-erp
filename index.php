<?php

require_once 'config/config.php';
require_once 'controllers/ProdutoController.php';

$controller = new ProdutoController();
$action = isset($_GET['action']) ? $_GET['action'] : 'listar';

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo 'Ação invalida';
}
