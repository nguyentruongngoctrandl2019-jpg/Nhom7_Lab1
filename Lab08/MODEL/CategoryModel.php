<?php
class CategoryModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllCategories()
    {
        $query = "SELECT * FROM categories"; // Thay 'categories' bằng tên bảng của bạn
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>