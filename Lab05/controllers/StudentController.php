<?php
include_once 'config/database.php';
include_once 'models/Student.php';

class StudentController
{
    public function index()
    {
        // 1. Khởi tạo kết nối DB
        $database = new Database();
        $db = $database->getConnection();

        // 2. Khởi tạo Model
        $student = new Student($db);

        // 3. Lấy dữ liệu từ Model
        $stmt = $student->getAll();
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 4. Truyền dữ liệu qua View và hiển thị
        include_once 'views/student_list.php';
    }
}
?>