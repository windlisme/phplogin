<?php
$host = 'qltv-db.cpwo840s438x.us-east-1.rds.amazonaws.com';
$db   = 'qltvdb';
$user = 'admin';
$pass = 'Luuthuyvotinh20';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
    exit();
}
?>