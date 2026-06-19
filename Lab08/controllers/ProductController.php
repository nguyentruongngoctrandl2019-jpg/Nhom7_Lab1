<?php
include_once 'config/database.php';
include_once 'models/CategoryModel.php';
include_once 'models/UserModel.php';
include_once 'models/ProductModel.php';

class ProductController
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Điều hướng Bài 1
    public function listCategories()
    {
        $categoryModel = new CategoryModel($this->db);
        $categories = $categoryModel->getAllCategories();
        include 'views/categories.php';
    }

    // Điều hướng Bài 2
    public function listUsers()
    {
        $userModel = new UserModel($this->db);
        $users = $userModel->getAllUsers();
        include 'views/users.php';
    }

    // Điều hướng Bài 3
    public function listOutOfStock()
    {
        $productModel = new ProductModel($this->db);
        $products = $productModel->getOutOfStockProducts();
        include 'views/out_of_stock.php';
    }

    // Điều hướng Bài 4
    public function listBestSellers()
    {
        $productModel = new ProductModel($this->db);
        $products = $productModel->getBestSellingProducts();
        include 'views/best_sellers.php';
    }
}
?>