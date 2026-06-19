<?php
include_once 'config/database.php';
include_once 'models/UserModel.php';

class AuthController
{
    private $db;
    private $userModel;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->userModel = new UserModel($this->db);

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login()
    {
        $error = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->login($username, $password);
            if ($user) {
                $_SESSION['user'] = $user['username'];

                // Xử lý "Ghi nhớ mật khẩu" nếu được tích chọn
                if (isset($_POST['remember'])) {
                    setcookie('remember_user', $username, time() + (86400 * 30), "/"); // Lưu 30 ngày
                } else {
                    if (isset($_cookie['remember_user'])) {
                        setcookie('remember_user', '', time() - 3600, "/");
                    }
                }

                header("Location: index.php?action=welcome");
                exit();
            } else {
                $error = "Tài khoản hoặc mật khẩu không chính xác!";
            }
        }
        include 'views/login.php';
    }

    // Xử lý Đăng ký (Bài 2)
    public function register()
    {
        $msg = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->userModel->register($username, $email, $password)) {
                $msg = "Đăng ký thành công! <a href='index.php?action=login'>Đăng nhập ngay</a>";
            } else {
                $msg = "Đăng ký thất bại. Vui lòng thử lại!";
            }
        }
        include 'views/register.php';
    }
}
?>