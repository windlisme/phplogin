<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $action = $_POST['action'];

    if ($action === 'login') {
        $stmt = $pdo->prepare("SELECT * FROM TaiKhoan WHERE TaiKhoan = :username AND MatKhau = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Đăng nhập thành công!";
        } else {
            echo "Đăng nhập thất bại!";
        }
    } elseif ($action === 'register') {
        $stmt = $pdo->prepare("SELECT * FROM TaiKhoan WHERE TaiKhoan = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Tài khoản đã tồn tại!";
        } else {
            $stmt = $pdo->prepare("INSERT INTO TaiKhoan (TaiKhoan, MatKhau, LoaiTK) VALUES (:username, :password, '0')");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);

            if ($stmt->execute()) {
                echo "Thêm tài khoản thành công!";
            } else {
                echo "Lỗi khi thêm tài khoản!";
            }
        }
    }
}
?>
