<?php
class Product
{
    private $conn;
    private $table_name = "products";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Hàm tìm kiếm theo tên
    public function searchByName($keyword)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE name LIKE :keyword";
        $stmt = $this->conn->prepare($query);

        // Thêm % vào từ khóa để tìm kiếm tương đối
        $keyword = "%{$keyword}%";
        $stmt->bindParam(':keyword', $keyword);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo trang
    public function readPaging($from_record_num, $records_per_page)
    {
        // Chú ý: Với LIMIT trong PDO, nên dùng bindValue và ép kiểu INT
        $query = "SELECT * FROM " . $this->table_name . " LIMIT :from, :count";
        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':from', (int) $from_record_num, PDO::PARAM_INT);
        $stmt->bindValue(':count', (int) $records_per_page, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tính tổng số sản phẩm
    public function countAll()
    {
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_rows'];
    }


}
?>