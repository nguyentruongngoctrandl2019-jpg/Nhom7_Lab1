<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Bài 2: Danh sách người dùng</title>
</head>

<body>
    <h2>Danh sách người dùng</h2>
    <table border="1" cellpadding="10" style="border-collapse: collapse; text-align: left;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users) && is_array($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" style="text-align: center; color: red;">
                        Không có dữ liệu người dùng hoặc lỗi kết nối Cơ sở dữ liệu!
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>