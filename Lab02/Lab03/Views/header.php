<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mô hình MVC - PHP1</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        header { background: #ff793f; color: white; padding: 20px; text-align: center; }
        nav { background: #333; padding: 10px; text-align: center; }
        nav a { color: white; margin: 0 15px; text-decoration: none; font-weight: bold; }
        nav a:hover { color: #ff793f; }
        .container { padding: 20px; min-height: 400px; }
        footer { background: #333; color: white; text-align: center; padding: 15px; position: relative; bottom: 0; width: 100%; }
        .product-list { display: flex; gap: 20px; margin-top: 20px; }
        .product-item { border: 1px solid #ddd; padding: 15px; border-radius: 5px; width: 200px; text-align: center; }
    </style>
</head>
<body>

<header>
    <h1>DỰ ÁN MẪU MVC - PHP OOP CƠ BẢN</h1>
</header>

<nav>
    <a href="index.php?act=home">Trang Chủ</a>
    <a href="index.php?act=product">Sản Phẩm</a>
    <a href="index.php?act=admin" style="color: #ffda79;">Trang Admin</a>
</nav>

<div class="container"></div>