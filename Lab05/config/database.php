<?php
class Database
{
    private $host = "gtpixbirhosting";
    private $db_name = "gtpixbirhosting";
    private $username = "gtpixbirhosting_lethikieunguyen";
    private $password = "3EcR7IdTel*<?<>vkkVL";
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