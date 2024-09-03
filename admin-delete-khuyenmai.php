<?php
    include 'connection.php';
    if(isset($_GET['ID_KhuyenMai'])){
        $ID_KhuyenMai = $_GET['ID_KhuyenMai'];
        $sql = "UPDATE sanpham SET ID_KhuyenMai = NULL WHERE ID_KhuyenMai = :ID_KhuyenMai";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ID_KhuyenMai', $ID_KhuyenMai);
        if($stmt->execute()){
            $sql = "DELETE FROM khuyenmai WHERE ID_KhuyenMai = :ID_KhuyenMai";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ID_KhuyenMai', $ID_KhuyenMai);
            if($stmt->execute()){
                header('Location: admin-khuyenmai.php');
            }
        }
    }
?>