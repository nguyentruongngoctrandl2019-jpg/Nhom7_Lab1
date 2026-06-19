<?php
class UserModel
{
    private $conn;
    private $table_name = "users";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Hàm Đăng ký (Bài 2)
    public function register($username, $email, $password)
    {
        $query = "INSERT INTO " . $this->table_name . " (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $this->conn->prepare($query);

        // Mã hóa mật khẩu trước khi lưu vào CSDL cho an toàn
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindValue(':password', $hashed_password); 
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Hàm Đăng nhập (Bài 1)
    public function login($username, $password)
    {
        $query = "SELECT id, username, password FROM " . $this->table_name . " WHERE username = :username LIMIT 0,1";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // Kiểm tra mật khẩu mã hóa
            if (password_verify($password, $row['password'])) {
                return $row; // Đăng nhập thành công, trả về thông tin user
            }
        }
        return false; // Sai tài khoản hoặc mật khẩu
    }
}
?>