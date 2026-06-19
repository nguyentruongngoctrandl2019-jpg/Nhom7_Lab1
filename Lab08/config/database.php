<?php
class Database
{
    private $db_host = "103.57.220.210";
    private $db_name = "gtpixbirhosting_lethikieunguyen";
    private $db_user = "gtpixbirhosting_lethikieunguyen";
    private $db_pass = "tP1A%7qX<V#`rW0";
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Lỗi kết nối: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>