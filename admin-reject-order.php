<?php
include 'connection.php';
if(isset($_GET['ID_DonHang']) && isset($_GET['ID_Account'])){
    $ID_DonHang = $_GET['ID_DonHang'];
    $ID_Account = $_GET['ID_Account'];
    $sql = "DELETE FROM chitietaccept WHERE ID_DonHang = :ID_DonHang";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID_DonHang', $ID_DonHang);
    if($stmt->execute()){
        $sql = "DELETE FROM accept WHERE ID_DonHang = :ID_DonHang";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ID_DonHang', $ID_DonHang);
        if($stmt->execute()){
            if($_GET['reject'] == 'true'){
                $message = 'Đơn hàng #' .$ID_DonHang .' đã không được chấp nhận vì nhiều lý do!';
                $sql_noti = "INSERT INTO notification VALUES (NULL, :ID_Account, :message , 0)";
                $stmt_noti = $conn->prepare($sql_noti);
                $stmt_noti->bindParam(':ID_Account', $ID_Account);
                $stmt_noti->bindParam(':message', $message);
                $stmt_noti->execute();
            }
            if(isset($_GET['user']) == 'true'){
                header('Location: order.php');
            }
            else{
                header('Location: admin-accept.php?ID_Account='.$ID_Account);
            }
        }
    }
}
?>