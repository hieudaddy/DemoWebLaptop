<?php
include 'connection.php';
if(isset($_GET['ID_DonHang']) && isset($_GET['ID_Status_Giao']) && isset($_GET['ID_Account'])){
    $ID_DonHang = $_GET['ID_DonHang'];
    $ID_Status_Giao = $_GET['ID_Status_Giao'];
    $ID_Account = $_GET['ID_Account'];
    $sql = "UPDATE donhang SET ID_Status_Giao = :ID_Status_Giao WHERE ID_DonHang = :ID_DonHang";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID_Status_Giao', $ID_Status_Giao);
    $stmt->bindParam(':ID_DonHang', $ID_DonHang);
    switch($ID_Status_Giao){
        case 3:
            $message = 'Đơn hàng #' .$ID_DonHang .' đang chờ giao hàng, vui lòng chú ý điện thoại';
            $sql_temp = "INSERT INTO notification VALUES (NULL, :ID_Account, :message, 0)";
            $stmt_temp = $conn->prepare($sql_temp);
            $stmt_temp->bindParam(':ID_Account', $ID_Account);
            $stmt_temp->bindParam(':message', $message);
            $stmt_temp->execute();
            break;
        case 4:
            $message = 'Đơn hàng #' .$ID_DonHang .' đã được giao, vui lòng xác nhận đơn hàng';
            $sql_temp = "INSERT INTO notification VALUES (NULL, :ID_Account, :message, 0)";
            $stmt_temp = $conn->prepare($sql_temp);
            $stmt_temp->bindParam(':ID_Account', $ID_Account);
            $stmt_temp->bindParam(':message', $message);
            $stmt_temp->execute();
            break;
        case 5:
            $message = 'Đơn hàng #' .$ID_DonHang .' đã giao thành công';
            $sql_temp = "INSERT INTO notification VALUES (NULL, 1, :message, 0)";
            $stmt_temp = $conn->prepare($sql_temp);
            $stmt_temp->bindParam(':message', $message);
            $stmt_temp->execute();
            break;
        case 6:
            $message = 'Đơn hàng #' .$ID_DonHang .' đã bị hủy';
            $sql_temp = "INSERT INTO notification VALUES (NULL, 1, :message, 0)";
            $stmt_temp = $conn->prepare($sql_temp);
            $stmt_temp->bindParam(':message', $message);
            $stmt_temp->execute();

            $sql_update_sanpham_when_huydon = "UPDATE sanpham SET SoLuong = SoLuong + ( SELECT SUM(SoLuong) FROM chitietdonhang WHERE ID_DonHang = :ID_DonHang AND ID_SanPham = sanpham.ID_SanPham), DaBan = DaBan - ( SELECT SUM(SoLuong) FROM chitietdonhang WHERE ID_DonHang = :ID_DonHang AND ID_SanPham = sanpham.ID_SanPham), Status = CASE WHEN Status = 0 THEN 1 ELSE Status END WHERE ID_SanPham IN (SELECT ID_SanPham FROM chitietdonhang WHERE ID_DonHang = :ID_DonHang)";
            $stmt_update_sanpham_when_huydon = $conn->prepare($sql_update_sanpham_when_huydon);
            $stmt_update_sanpham_when_huydon->bindParam(':ID_DonHang', $ID_DonHang);
            $stmt_update_sanpham_when_huydon->execute();
            break;
        case 7:
            $message = 'Đơn hàng #' .$ID_DonHang.' đã bị trả hàng';
            $sql_temp = "INSERT INTO notification VALUES (NULL, 1, :message, 0)";
            $stmt_temp = $conn->prepare($sql_temp);
            $stmt_temp->bindParam(':message', $message);
            $stmt_temp->execute();
            break;
    }

    if($stmt->execute() && isset($_GET['user']) && $_GET['user'] == 'false'){
        header('Location: admin-order.php?ID_Account='. $ID_Account);
    }else{
        header('Location: order.php');
    }
}
?>