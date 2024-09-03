<?php
include 'connection.php';
if ($_GET['ID_Noti']) {
    $notificationId = $_GET['ID_Noti'];
    $sql_update_notification = "UPDATE notification SET STATUS = 1 WHERE ID_Noti = :ID_Noti";
    $stmt_update_notification = $conn->prepare($sql_update_notification);
    $stmt_update_notification->bindParam(':ID_Noti', $notificationId);
    if($stmt_update_notification->execute()){
        if(isset($_GET['admin-accept'])){
            header('Location: admin-accept.php');
        }else if(isset($_GET['account-setting'])){
            header('Location: account-setting.php');
        }else if(isset($_GET['admin-add-hang'])){
            header('Location: admin-add-hang.php');
        }else if(isset($_GET['admin-add-loaisp'])){
            header('Location: admin-add-loaisp.php');
        }else if(isset($_GET['admin-add-product'])){
            header('Location: admin-add-product.php');
        }else if(isset($_GET['admin-dashboard'])){
            header('Location: admin-dashboard.php');
        }else if(isset($_GET['admin-edit-hang'])){
            header('Location: admin-edit-hang.php?ID_Hang='.$_GET['admin-edit-hang']);
        }else if(isset($_GET['admin-edit-loaisp'])){
            header('Location: admin-edit-loaisp.php?ID_Hang='.$_GET['admin-edit-loaisp']);
        }else if(isset($_GET['admin-edit-product'])){
            header('Location: admin-edit-product.php?ID_SanPham='.$_GET['admin-edit-product']);
        }else if(isset($_GET['admin-edit-khuyenmai'])){
            header('Location: admin-edit-khuyenmai.php?ID_KhuyenMai='.$_GET['admin-edit-khuyenmai']);
        }else if(isset($_GET['admin-hang'])){
            header('Location: admin-hang.php');
        }else if(isset($_GET['admin-loaisp'])){
            header('Location: admin-loaisp.php');
        }else if(isset($_GET['admin-product'])){
            header('Location: admin-product.php');
        }else if(isset($_GET['admin-product'])){
            header('Location: admin-product.php');
        }else if(isset($_GET['admin-order'])){
            header('Location: admin-order.php');
        }else if(isset($_GET['checkout'])){
            header('Location: checkout.php');
        }else if(isset($_GET['order'])){
            header('Location: order.php');
        }else if(isset($_GET['payment'])){
            header('Location: product_detail.php?ID='.$_GET['payment']);
        }else if(isset($_GET['product_detail'])){
            header('Location: product_detail.php?ID='.$_GET['product_detail']);
        }else{
            header('Location: index.php');
        }
    }
}
?>