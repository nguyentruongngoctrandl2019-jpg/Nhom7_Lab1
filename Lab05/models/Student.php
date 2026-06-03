<?php
class Student
{
    private $conn;
    private $table_name = "students";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Hàm lấy toàn bộ danh sách sinh viên
    public function getAll()
    {
        $query = "SELECT id, name, email, phone FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>