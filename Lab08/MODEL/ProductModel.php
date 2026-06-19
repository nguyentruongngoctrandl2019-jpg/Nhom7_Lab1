<?php
class ProductModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Bài 3: Sản phẩm hết hàng (quantity = 0)
    public function getOutOfStockProducts()
    {
        $query = "SELECT * FROM products WHERE quantity = 0";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Bài 4: Sản phẩm bán chạy (Giả sử dựa trên số lượng đã bán 'sold' giảm dần)
    public function getBestSellingProducts()
    {
        $query = "SELECT * FROM products ORDER BY sold DESC LIMIT 5";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>