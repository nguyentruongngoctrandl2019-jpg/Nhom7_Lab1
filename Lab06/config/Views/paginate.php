<?php
if (!isset($products)) {
    $all_products = [
        ['id' => 1, 'name' => 'Sâm Ngọc Linh Kon Tum', 'price' => 2500000],
        ['id' => 2, 'name' => 'Đông Trùng Hạ Thảo Khô', 'price' => 1200000],
        ['id' => 3, 'name' => 'Nấm Linh Chi Tự Nhiên', 'price' => 850000],
        ['id' => 4, 'name' => 'Trà Thảo Mộc PyLoHerb', 'price' => 150000],
        ['id' => 5, 'name' => 'Mật Ong Rừng Nguyên Chất', 'price' => 450000],
        ['id' => 6, 'name' => 'Tinh Dầu Thảo Dược PyLo', 'price' => 220000],
        ['id' => 7, 'name' => 'Cao Đinh Lăng Chuẩn Chuẩn', 'price' => 350000],
        ['id' => 8, 'name' => 'Trà Đinh Lăng Túi Lọc', 'price' => 95000],
    ];

    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    if ($page < 1)
        $page = 1;

    $records_per_page = 3;

    $total_rows = count($all_products);
    $total_pages = ceil($total_rows / $records_per_page);

    if ($page > $total_pages)
        $page = $total_pages;

    $offset = ($page - 1) * $records_per_page;
    $products = array_slice($all_products, $offset, $records_per_page);
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Phân trang sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 60%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        /* Định dạng các nút phân trang */
        .pagination {
            margin-top: 20px;
        }

        .pagination a {
            margin: 0 5px;
            padding: 8px 14px;
            border: 1px solid #007bff;
            color: #007bff;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        /* Nút trang đang kích hoạt */
        .pagination a.active {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            cursor: default;
        }

        .pagination a:hover:not(.active) {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <h2>Bài 2: Phân trang Sản phẩm (Sử dụng LIMIT) [cite: 18, 22]</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
        </tr>
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo number_format($row['price'], 0, ',', '.'); ?> đ</td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" style="text-align: center;">Không có sản phẩm nào ở trang này!</td>
            </tr>
        <?php endif; ?>
    </table>

    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>">&laquo; Trước</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i; ?>" class="<?php echo ($i == $page) ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
            <a href="?page=<?php echo $page + 1; ?>">Sau &raquo;</a>
        <?php endif; ?>
    </div>
</body>

</html>