<?php
require 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$accountType = '0'; 

$stmt = $pdo->prepare("SELECT * FROM TaiKhoan WHERE TaiKhoan = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "Tài khoản đã tồn tại!";
    exit();
}

$stmt = $pdo->prepare("INSERT INTO TaiKhoan (TaiKhoan, MatKhau, LoaiTK) VALUES (:username, :password, :accountType)");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':accountType', $accountType);

if ($stmt->execute()) {
    echo "Thêm tài khoản thành công!";
} else {
    echo "Thêm tài khoản thất bại!";
}
?>
