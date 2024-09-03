<?php
include 'connection.php';
session_start();
$ID_Account = $_SESSION['ID_Account'];
if (isset($_GET['ID_SanPham']) && isset($_GET['SoLuong'])) {
    $ID_SanPham = $_GET['ID_SanPham'];
    $SoLuong = $_GET['SoLuong'];
    $sql = "UPDATE giohang SET SoLuong = :SoLuong WHERE ID_SanPham = :ID_SanPham AND ID_Account = :ID_Account";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':SoLuong', $SoLuong);
    $stmt->bindParam(':ID_SanPham', $ID_SanPham);
    $stmt->bindParam(':ID_Account', $ID_Account);
    if($stmt->execute()){
        header('Location: checkout.php');
    }
}
?>