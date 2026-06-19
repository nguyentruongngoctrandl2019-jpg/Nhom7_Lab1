<!DOCTYPE html>
<html>
<head><title>Bài 3: Sản phẩm hết hàng</title></head>
<body>
    <h2>Sản phẩm hết hàng trong kho</h2>
    <table border="1" cellpadding="10">
        <tr><th>ID</th><th>Tên sản phẩm</th><th>Giá</th><th>Số lượng</th></tr>
        <?php if(empty($products)): ?>
            <tr><td colspan="4">Không có sản phẩm nào hết hàng!</td></tr>
        <?php else: ?>
            <?php foreach ($products as $prod): ?>
            <tr>
                <td><?= $prod['id'] ?></td>
                <td><?= $prod['name'] ?></td>
                <td><?= number_format($prod['price']) ?> đ</td>
                <td style="color:red; font-weight:bold;"><?= $prod['quantity'] ?></td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</body>
</html>