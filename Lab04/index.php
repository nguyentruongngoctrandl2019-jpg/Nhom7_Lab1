<?php
require_once 'Controller/Controller.php';

$controller = new HomeController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'product':
        $controller->product();
        break;
    default:
        $controller->index();
        break;
}