<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>
</head>

<body>
    <h2>ĐĂNG NHẬP</h2>
    <?php if (!empty($error))
        echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username"
            value="<?php echo isset($_COOKIE['remember_user']) ? $_COOKIE['remember_user'] : ''; ?>" required><br><br>

        <label>Mật khẩu:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="checkbox" name="remember" <?php echo isset($_COOKIE['remember_user']) ? 'checked' : ''; ?>>
        <label>Ghi nhớ tài khoản</label><br><br>

        <button type="submit">Đăng nhập</button>
    </form>
    <p>Chưa có tài khoản? <a href="index.php?action=register">Đăng ký tại đây</a></p>
</body>

</html>