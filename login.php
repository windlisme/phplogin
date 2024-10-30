<?php
require 'config.php';

// Lấy dữ liệu từ form đăng nhập
$username = $_POST['username'];
$password = $_POST['password'];

// Chuẩn bị và thực thi câu truy vấn
$stmt = $pdo->prepare("SELECT * FROM TaiKhoan WHERE TaiKhoan = :username AND MatKhau = :password");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();

// Kiểm tra xem có bản ghi nào khớp không
if ($stmt->rowCount() > 0) {
    echo "Đăng nhập thành công!";
} else {
    echo "Đăng nhập thất bại!";
}
?>
