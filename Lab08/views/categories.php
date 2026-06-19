<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Bài 1: Danh mục sản phẩm</title>
</head>

<body>
    <h2>Danh mục sản phẩm</h2>
    <table border="1" cellpadding="10" style="border-collapse: collapse; text-align: left;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>ID</th>
                <th>Tên danh mục</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($categories) && is_array($categories)): ?>
                <?php foreach ($categories as $cat): ?>
                    <tr>
                        <td><?= htmlspecialchars($cat['id']) ?></td>
                        <td><?= htmlspecialchars($cat['name']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2" style="text-align: center; color: red;">
                        Không có dữ liệu danh mục hoặc lỗi kết nối!
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>