<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['ID_Account']) || $_SESSION['ID_Account'] == NULL || !isset($_SESSION['user']) || $_SESSION['user'] == null) {
    header('Location: sign-in.php');
    exit();
}
$ID_Account = $_SESSION['ID_Account'];
if(isset($_GET['ID_ThanhToan'])){
    $ID_ThanhToan = $_GET['ID_ThanhToan'];
    $sql = "INSERT INTO accept VALUES (NULL, :ID_Account, :ID_ThanhToan)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID_Account', $ID_Account);
    $stmt->bindParam(':ID_ThanhToan', $ID_ThanhToan);
    if($stmt->execute()){
        $ID_DonHang = $conn->lastInsertId();
        if(isset($_GET['ID_SanPham']) && isset($_GET['TongTien'])){
            $sql_excute = "INSERT INTO chitietaccept VALUES (:ID_DonHang, :ID_SanPham, 1, :TongTien)";
            $stmt_excute = $conn->prepare($sql_excute);
            $stmt_excute->bindParam(':ID_DonHang', $ID_DonHang);
            $stmt_excute->bindParam(':ID_SanPham', $_GET['ID_SanPham']);
            $stmt_excute->bindParam(':TongTien', $_GET['TongTien']);
            $stmt_excute->execute();
            header('Location: order.php');
        }else{
            $sql = "SELECT gh.ID_GioHang, gh.SoLuong, sp.ID_SanPham, sp.Status, sp.Gia as GiaTruoc, COALESCE( CASE WHEN km.MucGiam IS NOT NULL THEN (sp.Gia * (100 - km.MucGiam)) / 100 ELSE sp.Gia END, sp.Gia ) AS Gia FROM giohang gh JOIN sanpham sp ON gh.ID_SanPham = sp.ID_SanPham LEFT JOIN khuyenmai km ON sp.ID_KhuyenMai = km.ID_KhuyenMai JOIN (SELECT ID_SanPham, MIN(ID_HASP) AS Min_ID_HASP FROM hinhanhsanpham GROUP BY ID_SanPham) AS ha_min ON sp.ID_SanPham = ha_min.ID_SanPham JOIN hinhanhsanpham ha ON ha_min.Min_ID_HASP = ha.ID_HASP WHERE gh.ID_Account = :ID_Account GROUP BY sp.ID_SanPham ORDER BY gh.ID_GioHang DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ID_Account', $ID_Account);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    if($row['Status'] == 1){
                        $sql_excute = "INSERT INTO chitietaccept VALUES (:ID_DonHang, :ID_SanPham, :SoLuong, :TongTien)";
                        $stmt_excute = $conn->prepare($sql_excute);
                        $stmt_excute->bindParam(':ID_DonHang', $ID_DonHang);
                        $stmt_excute->bindParam(':ID_SanPham', $row['ID_SanPham']);
                        $stmt_excute->bindParam(':SoLuong', $row['SoLuong']);
                        $TongTien = $row['Gia']*$row['SoLuong'];
                        $stmt_excute->bindParam(':TongTien', $TongTien);
                        $stmt_excute->execute();
        
                        $sql_excute = "DELETE FROM giohang WHERE ID_GioHang = :ID_GioHang";
                        $stmt_excute = $conn->prepare($sql_excute);
                        $stmt_excute->bindParam(':ID_GioHang', $row['ID_GioHang']);
                        $stmt_excute->execute();
                    }
                }
            }
        }
        $message = 'Đơn hàng #' .$ID_DonHang .' đã được account: '.$ID_Account.' yêu cầu';
        $sql_temp = "INSERT INTO notification VALUES (NULL, 1, :message, 0)";
        $stmt_temp = $conn->prepare($sql_temp);
        $stmt_temp->bindParam(':message', $message);
        $stmt_temp->execute();
        header('Location: order.php');
    }
}
?>