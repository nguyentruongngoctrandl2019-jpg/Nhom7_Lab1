<?php
include_once 'controllers/ProductController.php';

$controller = new ProductController();
$action = isset($_GET['action']) ? $_GET['action'] : 'search';

switch ($action) {
    case 'search':
        $controller->search();
        break;
    case 'paginate':
        $controller->paginate();
        break;
    default:
        $controller->search();
        break;
}
?>