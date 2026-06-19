<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng Ký</title>
</head>

<body>
    <h2>ĐĂNG KÝ TÀI KHOẢN</h2>
    <?php if (!empty($msg))
        echo "<p style='color:green;'>$msg</p>"; ?>
    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Mật khẩu:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Đăng ký</button>
    </form>
    <p>Đã có tài khoản? <a href="index.php?action=login">Đăng nhập</a></p>
</body>

</html>