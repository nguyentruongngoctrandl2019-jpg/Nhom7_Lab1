<?php
// Gọi Controller vào
include_once 'controllers/StudentController.php';

// Khởi tạo Controller
$controller = new StudentController();

// Mặc định chạy trang danh sách sinh viên (Bài 1)
$controller->index();
?>