<?php
require_once 'Model/Database.php';

class AdminController
{
    private $db;

    public function __construct()
    {
        $db_host = "localhost";
        $db_name = "php1";
        $db_user = "root";
        $db_pass = "";

        $this->db = new Database($db_host, $db_name, $db_user, $db_pass);
        $this->db->connect();
    }

    public function dashboard()
    {
        require_once 'Views/header.php';
        require_once 'Views/dashboard.php';
        require_once 'Views/footer.php';
    }

    public function __destruct()
    {
        $this->db->disconnect();
    }
}