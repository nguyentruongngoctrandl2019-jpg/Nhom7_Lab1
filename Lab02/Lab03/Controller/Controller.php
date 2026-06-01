<?php

class Controller
{
    public function renderHome()
    {
        include_once 'Views/header.php';
        include_once 'Views/home.php';
        include_once 'Views/footer.php';
    }
    public function renderProduct()
    {
        include_once 'Views/header.php';
        include_once 'Views/product.php';
        include_once 'Views/footer.php';
    }
    public function renderAdmin()
    {
        echo "<div style='padding: 50px; background: #f4f4f4; border: 2px solid #ccc; text-align: center;'>";
        echo "<h1>Trang Quản Trị (ADMIN PANEL)</h1>";
        echo "<p>Chào mừng Admin hệ thống. Bạn có thể quản lý sản phẩm và người dùng tại đây.</p>";
        echo "<a href='index.php?act=home'>← Quay lại Trang Chủ User</a>";
        echo "</div>";
    }
}