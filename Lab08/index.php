<?php
include_once 'controllers/ProductController.php';

$controller = new ProductController();

// Lấy action từ URL, mặc định là show bài 1
$action = isset($_GET['action']) ? $_GET['action'] : 'bai1';

// Menu điều hướng nhanh giữa các bài
echo '<div style="margin-bottom: 20px;">
    <a href="index.php?action=bai1">Bài 1: Danh mục</a> | 
    <a href="index.php?action=bai2">Bài 2: Người dùng</a> | 
    <a href="index.php?action=bai3">Bài 3: Hết hàng</a> | 
    <a href="index.php?action=bai4">Bài 4: Bán chạy</a>
</div><hr>';

switch ($action) {
    case 'bai1':
        $controller->listCategories(); 
        break;
    case 'bai2':
        $controller->listUsers();
        break;
    case 'bai3':
        $controller->listOutOfStock();
        break;
    case 'bai4':
        $controller->listBestSellers();
        break;
    default:
        $controller->listCategories();
        break;
}
?>