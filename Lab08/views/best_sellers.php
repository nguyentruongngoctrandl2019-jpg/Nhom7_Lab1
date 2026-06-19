<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Bài 4: Sản phẩm bán chạy</title>
</head>

<body>
    <h2>Top 5 Sản phẩm bán chạy nhất</h2>
    <table border="1" cellpadding="10" style="border-collapse: collapse; text-align: left;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Đã bán</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($products) && is_array($products)): ?>
                <?php foreach ($products as $prod): ?>
                    <tr>
                        <td><?= htmlspecialchars($prod['id']) ?></td>
                        <td><?= htmlspecialchars($prod['name']) ?></td>
                        <td><?= number_format($prod['price']) ?> đ</td>
                        <td style="color:green; font-weight:bold;"><?= htmlspecialchars($prod['sold']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center; color: red;">
                        Không có dữ liệu sản phẩm bán chạy hoặc lỗi kết nối!
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>