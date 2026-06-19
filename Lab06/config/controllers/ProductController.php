<?php
include_once 'config/database.php';
include_once 'models/Product.php';

class ProductController
{
    // Xử lý tìm kiếm (Bài 1)
    public function search()
    {
        $database = new Database();
        $db = $database->getConnection();
        $product = new Product($db);

        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $products = $product->searchByName($keyword);

        // Trả về view kèm dữ liệu
        include_once 'views/search.php';
    }

    // Xử lý phân trang (Bài 2)
    public function paginate()
    {
        $database = new Database();
        $db = $database->getConnection();
        $product = new Product($db);

        // Cấu hình phân trang
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $records_per_page = 4; // Số sản phẩm trên 1 trang
        $from_record_num = ($records_per_page * $page) - $records_per_page;

        // Lấy dữ liệu
        $products = $product->readPaging($from_record_num, $records_per_page);
        $total_rows = $product->countAll();

        // Tính tổng số trang
        $total_pages = ceil($total_rows / $records_per_page);

        include_once 'views/paginate.php';
    }


}
?>