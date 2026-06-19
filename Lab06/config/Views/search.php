<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Tìm kiếm sản phẩm</title>
</head>

<body>
    <h2>Bài 1: Tìm kiếm Sản phẩm</h2>
    <form method="GET" action="index.php">
        <input type="hidden" name="action" value="search">
        <input type="text" name="keyword" placeholder="Nhập tên sản phẩm..."
            value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
        <button type="submit">Tìm kiếm</button>
    </form>

    <table border="1" style="margin-top: 20px; width: 50%; border-collapse: collapse;">
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
        </tr>
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo number_format($row['price']); ?> đ</td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Không tìm thấy sản phẩm nào!</td>
            </tr>
        <?php endif; ?>
    </table>
</body>

</html>