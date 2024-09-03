<?php
include 'connection.php';
//Truy vấn các hãng
session_start();
if (!isset($_SESSION['ID_Account']) || $_SESSION['ID_Account'] == NULL || !isset($_SESSION['user']) || $_SESSION['user'] == null || $_SESSION['user'] != 'admin' || $_SESSION['ID_Account'] != 1) {
   header('Location: sign-in.php');
   exit();
}
$sql = "UPDATE sanpham SET ID_KhuyenMai = NULL WHERE ID_KhuyenMai IN (SELECT ID_KhuyenMai FROM khuyenmai WHERE KetThuc < CURDATE())";
$stmt = $conn->prepare($sql);
if($stmt->execute()){
    header('Location: admin-khuyenmai.php');
}
?>