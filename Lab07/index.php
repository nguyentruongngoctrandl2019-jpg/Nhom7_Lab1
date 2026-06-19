<?php
include_once 'controllers/AuthController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$authController = new AuthController();

switch ($action) {
    case 'login':
        $authController->login();
        break;
    case 'register':
        $authController->register();
        break;
    case 'welcome':
        session_start();
        if (isset($_SESSION['user'])) {
            echo "<h2>Chào mừng, " . $_SESSION['user'] . " đã đăng nhập thành công!</h2>";
            echo "<a href='index.php?action=logout'>Đăng xuất</a>";
        } else {
            header("Location: index.php?action=login");
        }
        break;
    case 'logout':
        session_start();
        session_destroy();
        header("Location: index.php?action=login");
        break;
    default:
        $authController->login();
        break;
}
?>