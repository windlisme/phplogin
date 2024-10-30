<?php
require 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM TaiKhoan WHERE TaiKhoan = :username AND MatKhau = :password");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "Đăng nhập thành công!";
} else {
    echo "Đăng nhập thất bại!";
}
?>
