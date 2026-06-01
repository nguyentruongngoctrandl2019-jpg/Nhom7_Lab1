<?php
require_once 'Model/Database.php';

class HomeController { 

    public function __construct() { 
        
        $db_host = "localhost";
        $db_name = "php1"; 
        $db_user = "root";
        $db_pass = "";
        $this->db = new Database($db_host, $db_name, $db_user, $db_pass);
        $this->db->connect();
    }
    public function index() {
        require_once 'Views/header.php';
        require_once 'Views/home.php'; 
        require_once 'Views/footer.php';
    }

    // Nạp trang sản phẩm [cite: 137]
    public function product() {
        require_once 'Views/header.php';
        require_once 'Views/product.php'; 
        require_once 'Views/footer.php';
    }

   
    public function __destruct() {
        $this->db->disconnect(); 
    }
}