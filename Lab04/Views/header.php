<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Lab 4 - PHP OOP & CSDL</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f6f9;
        }

        header {
            background: #3c8dbc;
            color: white;
            padding: 15px;
            text-align: center;
        }

        nav {
            background: #222d32;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #b8c7ce;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            color: white;
        }

        .content {
            max-width: 1100px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            min-height: 350px;
        }

        footer {
            background: #222d32;
            color: #fff;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <h2>HỆ THỐNG QUẢN LÝ - MÔ HÌNH MVC</h2>
    </header>
    <nav>
        <a href="index.php">Trang Chủ</a>
        <a href="index.php?action=product">Sản Phẩm</a>
        <a href="admin.php" style="color: #f39c12;">Vào Trang Admin Dashboard</a>
    </nav>
    <div class="content"></div>