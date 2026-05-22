<?php
session_start();


class SinhVien
{
    private $hoTen;
    private $gioiTinh;
    private $ngaySinh;
    private $diemTB;

    // Constructor mặc định + Constructor có tham số
    public function __construct($hoTen = "", $gioiTinh = "", $ngaySinh = "", $diemTB = 0)
    {
        $this->hoTen = $hoTen;
        $this->gioiTinh = $gioiTinh;
        $this->ngaySinh = $ngaySinh;
        $this->diemTB = $diemTB;
    }

    // Getter và setter
    public function getHoTen()
    {
        return $this->hoTen;
    }
    public function setHoTen($v)
    {
        $this->hoTen = $v;
    }

    public function getGioiTinh()
    {
        return $this->gioiTinh;
    }
    public function setGioiTinh($v)
    {
        $this->gioiTinh = $v;
    }

    public function getNgaySinh()
    {
        return $this->ngaySinh;
    }
    public function setNgaySinh($v)
    {
        $this->ngaySinh = $v;
    }

    public function getDiemTB()
    {
        return $this->diemTB;
    }
    public function setDiemTB($v)
    {
        $this->diemTB = $v;
    }

    // Hàm hiển thị thông tin sinh viên
    public function hienThiThongTin()
    {
        echo "Họ tên: " . $this->getHoTen() . "\n";
        echo "Giới tính: " . $this->getGioiTinh() . "\n";
        echo "Ngày sinh: " . $this->getNgaySinh() . "\n";
        echo "Điểm TB: " . $this->getDiemTB() . "\n";
    }
}

if (!isset($_SESSION['mangSinhVien'])) {
    $_SESSION['mangSinhVien'] = [];
}

$errors = [];
$successMsg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['xoa_tat_ca'])) {
        $_SESSION['mangSinhVien'] = [];
    } else {
        $hoTen = trim($_POST['hoTen'] ?? '');
        $gioiTinh = trim($_POST['gioiTinh'] ?? '');
        $ngaySinh = trim($_POST['ngaySinh'] ?? '');
        $diemTB = $_POST['diemTB'] ?? '';

        if ($hoTen === '')
            $errors[] = "Họ tên không được để trống.";
        if ($gioiTinh === '')
            $errors[] = "Vui lòng chọn giới tính.";
        if ($ngaySinh === '')
            $errors[] = "Ngày sinh không được để trống.";
        if ($diemTB === '' || (float) $diemTB < 0 || (float) $diemTB > 10)
            $errors[] = "Điểm TB phải từ 0 đến 10.";

        if (empty($errors)) {
            $sinhVien = new SinhVien($hoTen, $gioiTinh, $ngaySinh, (float) $diemTB);


            $_SESSION['mangSinhVien'][] = $sinhVien;

            $successMsg = "Đã lưu sinh viên <strong>" . htmlspecialchars($hoTen) . "</strong> thành công!";
        }
    }
}

$mangSinhVien = $_SESSION['mangSinhVien'];


function xepLoai($diem)
{
    if ($diem >= 9.0)
        return 'Xuất sắc';
    if ($diem >= 8.0)
        return 'Giỏi';
    if ($diem >= 6.5)
        return 'Khá';
    if ($diem >= 5.0)
        return 'Trung bình';
    return 'Yếu';
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sinh Viên</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap');

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary: #1a56db;
            --primary-dark: #1245b5;
            --bg: #eef2ff;
            --card: #ffffff;
            --text: #1e293b;
            --muted: #64748b;
            --border: #e2e8f0;
            --radius: 12px;
        }

        body {
            font-family: 'Be Vietnam Pro', sans-serif;
            background: var(--bg);
            min-height: 100vh;
            padding: 2rem 1rem;
            color: var(--text);
        }


        .page-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .page-header .badge {
            display: inline-block;
            background: linear-gradient(135deg, #1a56db, #3b82f6);
            color: #fff;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.3rem 1rem;
            border-radius: 99px;
            margin-bottom: 0.6rem;
        }

        .page-header h1 {
            font-size: 1.9rem;
            font-weight: 700;
        }

        .page-header p {
            color: var(--muted);
            margin-top: 0.3rem;
            font-size: 0.9rem;
        }


        .layout {
            display: grid;
            grid-template-columns: 380px 1fr;
            gap: 1.5rem;
            max-width: 1100px;
            margin: 0 auto;
            align-items: start;
        }

        @media (max-width: 780px) {
            .layout {
                grid-template-columns: 1fr;
            }
        }


        .card {
            background: var(--card);
            border-radius: 16px;
            padding: 1.75rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.04), 0 12px 30px rgba(26, 86, 219, 0.08);
            border: 1px solid rgba(26, 86, 219, 0.09);
        }

        .card-title {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--bg);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }


        .form-group {
            margin-bottom: 1.1rem;
        }

        label {
            display: block;
            font-size: 0.82rem;
            font-weight: 600;
            margin-bottom: 0.4rem;
            color: var(--text);
        }

        label .req {
            color: #ef4444;
            margin-left: 2px;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        select {
            width: 100%;
            padding: 0.7rem 0.9rem;
            border: 1.5px solid var(--border);
            border-radius: var(--radius);
            font-family: inherit;
            font-size: 0.92rem;
            color: var(--text);
            background: #fafbff;
            transition: border 0.2s, box-shadow 0.2s;
            outline: none;
            appearance: none;
        }

        input:focus,
        select:focus {
            border-color: var(--primary);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(26, 86, 219, 0.1);
        }

        .select-wrap {
            position: relative;
        }

        .select-wrap::after {
            content: '▾';
            position: absolute;
            right: 0.9rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            pointer-events: none;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.65rem 1.2rem;
            border-radius: var(--radius);
            font-family: inherit;
            font-size: 0.88rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            text-decoration: none;
        }

        .btn-primary {
            width: 100%;
            justify-content: center;
            background: linear-gradient(135deg, #1a56db, #2563eb);
            color: #fff;
            box-shadow: 0 2px 8px rgba(26, 86, 219, 0.25);
            margin-top: 0.25rem;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #1245b5, #1a56db);
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(26, 86, 219, 0.35);
        }

        .btn-danger {
            background: #fef2f2;
            color: #dc2626;
            border: 1.5px solid #fecaca;
            font-size: 0.82rem;
            padding: 0.45rem 0.9rem;
        }

        .btn-danger:hover {
            background: #fee2e2;
        }


        .alert {
            padding: 0.85rem 1rem;
            border-radius: var(--radius);
            font-size: 0.88rem;
            margin-bottom: 1.1rem;
        }

        .alert-success {
            background: #ecfdf5;
            border: 1.5px solid #a7f3d0;
            color: #065f46;
        }

        .alert-error {
            background: #fef2f2;
            border: 1.5px solid #fecaca;
            color: #991b1b;
        }

        .alert ul {
            margin-left: 1.2rem;
            margin-top: 0.35rem;
        }


        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .count-badge {
            font-size: 0.82rem;
            color: var(--muted);
            font-weight: 500;
        }

        .count-badge strong {
            color: var(--primary);
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: linear-gradient(135deg, #1a56db, #2563eb);
            color: #fff;
        }

        thead th {
            padding: 0.85rem 1rem;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background 0.15s;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #f5f8ff;
        }

        tbody td {
            padding: 0.85rem 1rem;
            font-size: 0.88rem;
            vertical-align: middle;
        }

        .stt {
            font-weight: 700;
            color: var(--muted);
        }

        .name {
            font-weight: 600;
        }

        .tag {
            display: inline-block;
            padding: 0.18rem 0.65rem;
            border-radius: 99px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .tag-nam {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .tag-nu {
            background: #fce7f3;
            color: #be185d;
        }

        .tag-xs {
            background: #fef3c7;
            color: #92400e;
        }

        .tag-gioi {
            background: #d1fae5;
            color: #065f46;
        }

        .tag-kha {
            background: #dbeafe;
            color: #1e40af;
        }

        .tag-tb {
            background: #e0e7ff;
            color: #3730a3;
        }

        .tag-yeu {
            background: #fee2e2;
            color: #991b1b;
        }

        .diem-val {
            font-weight: 700;
            font-size: 1rem;
        }


        .empty {
            text-align: center;
            padding: 3rem 1rem;
            color: var(--muted);
        }

        .empty .icon {
            font-size: 2.5rem;
            margin-bottom: 0.75rem;
        }

        .empty p {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <div class="page-header">
        <div class="badge">FPT Polytechnic — Lab 1</div>
        <h1>🎓 Quản lý Sinh Viên</h1>
        <p>Nhập thông tin và xem danh sách sinh viên đã lưu</p>
    </div>

    <div class="layout">


        <div class="card">
            <div class="card-title">📝 Nhập thông tin sinh viên</div>

            <?php if (!empty($successMsg)): ?>
                <div class="alert alert-success">✅ <?= $successMsg ?></div>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-error">
                    <strong>⚠️ Có lỗi xảy ra:</strong>
                    <ul>
                        <?php foreach ($errors as $e): ?>
                            <li><?= htmlspecialchars($e) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="post" action="">
                <div class="form-group">
                    <label for="hoTen">Họ tên <span class="req">*</span></label>
                    <input type="text" id="hoTen" name="hoTen" placeholder="Nguyễn Văn A"
                        value="<?= htmlspecialchars($_POST['hoTen'] ?? '') ?>" required>
                </div>

                <div class="form-group">
                    <label for="gioiTinh">Giới tính <span class="req">*</span></label>
                    <div class="select-wrap">
                        <select id="gioiTinh" name="gioiTinh" required>
                            <option value="" disabled <?= empty($_POST['gioiTinh']) ? 'selected' : '' ?>>-- Chọn giới
                                tính --</option>
                            <option value="Nam" <?= (($_POST['gioiTinh'] ?? '') === 'Nam') ? 'selected' : '' ?>>Nam
                            </option>
                            <option value="Nữ" <?= (($_POST['gioiTinh'] ?? '') === 'Nữ') ? 'selected' : '' ?>>Nữ</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ngaySinh">Ngày sinh <span class="req">*</span></label>
                    <input type="date" id="ngaySinh" name="ngaySinh"
                        value="<?= htmlspecialchars($_POST['ngaySinh'] ?? '') ?>" required>
                </div>

                <div class="form-group">
                    <label for="diemTB">Điểm TB <span class="req">*</span></label>
                    <input type="number" id="diemTB" name="diemTB" step="0.01" min="0" max="10"
                        placeholder="0.00 – 10.00" value="<?= htmlspecialchars($_POST['diemTB'] ?? '') ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">💾 Lưu sinh viên</button>
            </form>
        </div>


        <div class="card">
            <div class="card-title">📋 Danh sách sinh viên đã lưu</div>

            <div class="table-header">
                <div class="count-badge">
                    Tổng số: <strong><?= count($mangSinhVien) ?></strong> sinh viên
                </div>
                <?php if (!empty($mangSinhVien)): ?>
                    <form method="post" action="" onsubmit="return confirm('Xóa toàn bộ danh sách?')">
                        <button type="submit" name="xoa_tat_ca" value="1" class="btn btn-danger">
                            🗑 Xóa tất cả
                        </button>
                    </form>
                <?php endif; ?>
            </div>

            <?php if (empty($mangSinhVien)): ?>
                <div class="empty">
                    <div class="icon">📭</div>
                    <p>Chưa có sinh viên nào.<br>Hãy nhập thông tin ở bên trái!</p>
                </div>
            <?php else: ?>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Họ tên</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Điểm TB</th>
                                <th>Xếp loại</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mangSinhVien as $i => $sv):
                                $diem = $sv->getDiemTB();
                                $xl = xepLoai($diem);

                                // CSS tag cho xếp loại
                                $xlClass = match ($xl) {
                                    'Xuất sắc' => 'tag-xs',
                                    'Giỏi' => 'tag-gioi',
                                    'Khá' => 'tag-kha',
                                    'Trung bình' => 'tag-tb',
                                    default => 'tag-yeu',
                                };

                                $gtClass = ($sv->getGioiTinh() === 'Nam') ? 'tag-nam' : 'tag-nu';
                                $ns = date('d/m/Y', strtotime($sv->getNgaySinh()));
                                ?>
                                <tr>
                                    <td class="stt"><?= $i + 1 ?></td>
                                    <td class="name"><?= htmlspecialchars($sv->getHoTen()) ?></td>
                                    <td><span class="tag <?= $gtClass ?>"><?= htmlspecialchars($sv->getGioiTinh()) ?></span>
                                    </td>
                                    <td><?= $ns ?></td>
                                    <td class="diem-val"><?= number_format($diem, 2) ?></td>
                                    <td><span class="tag <?= $xlClass ?>"><?= $xl ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

    </div><!-- /layout -->

</body>

</html>