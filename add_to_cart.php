<?php
include 'connection.php';
session_start();
$ID_Account = $_SESSION['ID_Account'];
if (isset($_GET['ID_SanPham']) && isset($_GET['SoLuong']) && isset($_GET['SoLuongKho'])) {
    $ID_SanPham = $_GET['ID_SanPham'];
    $SoLuong = $_GET['SoLuong'];
    $SoLuongKho = $_GET['SoLuongKho'];
    $sql = "SELECT * FROM giohang WHERE ID_SanPham = :ID_SanPham AND ID_Account = :ID_Account";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID_SanPham', $ID_SanPham);
    $stmt->bindParam(':ID_Account', $ID_Account);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($SoLuong + $row['SoLuong'] > $SoLuongKho){
            $_SESSION['error'] = 'Đã đạt số lượng giỏ hàng tối đa';
            if(isset($_GET['detail'])){
                header('Location: product_detail.php?ID='.$ID_SanPham );
            }else{
                header('Location: index.php');
            }
        }else{
            $sql = "UPDATE giohang SET SoLuong = SoLuong + :SoLuong WHERE ID_SanPham = :ID_SanPham AND ID_Account = :ID_Account";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':SoLuong', $SoLuong);
            $stmt->bindParam(':ID_SanPham', $ID_SanPham);
            $stmt->bindParam(':ID_Account', $ID_Account);
            if($stmt->execute()){
                if(isset($_GET['detail'])){
                    header('Location: product_detail.php?ID='.$ID_SanPham );
                }else{
                    header('Location: index.php');
                }
            }
        }
    }else{
        if($SoLuong > $SoLuongKho){
            $_SESSION['error'] = 'Đã đạt số lượng giỏ hàng tối đa';
            if(isset($_GET['detail'])){
                header('Location: product_detail.php?ID='.$ID_SanPham );
            }else{
                header('Location: index.php');
            }
        }else{
            $sql = "INSERT INTO giohang VALUES (NULL, :ID_Account, :ID_SanPham, :SoLuong)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ID_Account', $ID_Account);
            $stmt->bindParam(':ID_SanPham', $ID_SanPham);
            $stmt->bindParam(':SoLuong', $SoLuong);
            if($stmt->execute()){
                if(isset($_GET['detail'])){
                    header('Location: product_detail.php?ID='.$ID_SanPham );
                }else{
                    header('Location: index.php');
                }
            }
        }
    }
}
?>