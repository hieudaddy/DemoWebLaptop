<?php
include 'connection.php';
if(isset($_GET['ID_GioHang'])){
    $ID_GioHang = $_GET['ID_GioHang'];
    $sql = "DELETE FROM giohang WHERE ID_GioHang = :ID_GioHang";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID_GioHang', $ID_GioHang);
    if($stmt->execute()){
        if(isset($_GET['checkout'])){
            header('Location: checkout.php');
        }else if(isset($_GET['detail'])){
            header('Location: product_detail.php?ID='.$_GET['detail']);
        }else{
            header('Location: index.php');
        }
    }
}
?>