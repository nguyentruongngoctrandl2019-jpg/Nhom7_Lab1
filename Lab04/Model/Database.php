<?php
class Database {
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;
    private $connection;
    public function __construct($db_host, $db_name, $db_user, $db_pass) {
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }

    
    public function connect() {
        try {
            $this->connection = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_user, $this->db_pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<script>console.log('Kết nối CSDL thành công!');</script>"; 
        } catch (PDOException $e) {
            echo "Lỗi kết nối: " . $e->getMessage() . "<br>"; 
            die();
    }
    public function disconnect() {
        if ($this->connection !== null) { 
            $this->connection = null; 
            echo "<script>console.log('Ngắt kết nối thành công!');</script>"; 
    }
}