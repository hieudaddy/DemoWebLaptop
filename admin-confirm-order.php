<?php
include 'connection.php';
if(isset($_GET['ID_DonHang']) && isset($_GET['ID_Account']) && isset($_GET['ID_ThanhToan'])){
    $ID_DonHang = $_GET['ID_DonHang'];
    $ID_Account = $_GET['ID_Account'];
    $ID_ThanhToan = $_GET['ID_ThanhToan'];
    $sql_hoadon = "INSERT INTO hoadon VALUES (NULL, :ID_Account)";
    $stmt_hoadon = $conn->prepare($sql_hoadon);
    $stmt_hoadon->bindParam(':ID_Account', $ID_Account);
    if($stmt_hoadon->execute()){
        $ID_HoaDon = $conn->lastInsertId();
        $currentDate = date('Y-m-d');
        $sql_donhang = "INSERT INTO donhang VALUES (:ID_DonHang, :ID_HoaDon, :NgayTao, :ID_ThanhToan, '2', :NgayCapNhat)";
        $stmt_donhang = $conn->prepare($sql_donhang);
        $stmt_donhang->bindParam(':ID_DonHang', $ID_DonHang);
        $stmt_donhang->bindParam(':ID_HoaDon', $ID_HoaDon);
        $stmt_donhang->bindParam(':NgayTao', $currentDate);
        $stmt_donhang->bindParam(':ID_ThanhToan', $ID_ThanhToan);
        $stmt_donhang->bindParam(':NgayCapNhat', $currentDate);
        if($stmt_donhang->execute()){
            $sql_temp = "SELECT * FROM chitietaccept WHERE ID_DonHang = :ID_DonHang";
            $stmt_temp = $conn->prepare($sql_temp);
            $stmt_temp->bindParam(':ID_DonHang', $ID_DonHang);
            $stmt_temp->execute();
            if($stmt_temp->rowCount() > 0){
                while($row = $stmt_temp->fetch(PDO::FETCH_ASSOC)){
                    $sql_chitiet_donhang = "INSERT INTO chitietdonhang VALUES (:ID_DonHang, :ID_SanPham, :SoLuong, :TongTien)";
                    $stmt_chitiet_donhang = $conn->prepare($sql_chitiet_donhang);
                    $stmt_chitiet_donhang->bindParam(':ID_DonHang', $ID_DonHang);
                    $stmt_chitiet_donhang->bindParam(':ID_SanPham', $row['ID_SanPham']);
                    $stmt_chitiet_donhang->bindParam(':SoLuong', $row['SoLuong']);
                    $stmt_chitiet_donhang->bindParam(':TongTien', $row['TongTien']);
                    $stmt_chitiet_donhang->execute();

                    $sql_sanpham = "UPDATE sanpham SET Status = CASE WHEN SoLuong - :SoLuong <= 0 THEN 0 ELSE Status END, SoLuong = SoLuong - :SoLuong, DaBan = DaBan + :SoLuong WHERE ID_SanPham = :ID_SanPham";
                    $stmt_sanpham = $conn->prepare($sql_sanpham);
                    $stmt_sanpham->bindParam(':SoLuong', $row['SoLuong']);
                    $stmt_sanpham->bindParam(':ID_SanPham', $row['ID_SanPham']);
                    $stmt_sanpham->execute();
                }
            }
        }
    }
    $message = 'Đơn hàng #' .$ID_DonHang .' đã được chấp nhận, hãy chờ đợi đơn hàng được giao tới bạn nhé!';
    $sql = "INSERT INTO notification VALUES (NULL, :ID_Account, :message , 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID_Account', $ID_Account);
    $stmt->bindParam(':message', $message);
    $stmt->execute();
    header('Location: admin-reject-order.php?ID_DonHang='.$ID_DonHang.'&ID_Account='.$ID_Account.'&reject=false');
}
?>