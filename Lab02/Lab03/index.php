<?php
require_once 'Controller/Controller.php';
$mvcController = new Controller();
$act = isset($_GET['act']) ? $_GET['act'] : 'home';
switch ($act) {
    case 'home':
        $mvcController->renderHome();
        break;

    case 'product':
        $mvcController->renderProduct();
        break;

    case 'admin':
        $mvcController->renderAdmin();
        break;

    default:
        $mvcController->renderHome();
        break;
}