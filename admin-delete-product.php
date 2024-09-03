<?php
    include 'connection.php';
    $ID_SanPham = $_GET['ID_SanPham'];
    $sql_del_img = "delete from hinhanhsanpham where ID_SanPham = '$ID_SanPham'";
    $stmt_del_img = $conn->prepare($sql_del_img);
    $query_del_img = $stmt_del_img->execute();

    $sql_del_accept = "delete from chitietaccept where ID_SanPham = '$ID_SanPham'";
    $stmt_del_accept = $conn->prepare($sql_del_accept);
    $query_del_accept = $stmt_del_accept->execute();

    $sql_del_chitiet = "delete from chitietdonhang where ID_SanPham = '$ID_SanPham'";
    $stmt_del_chitiet = $conn->prepare($sql_del_chitiet);
    $query_del_chitiet = $stmt_del_chitiet->execute();

    $sql_del_giohang = "delete from giohang where ID_SanPham = '$ID_SanPham'";
    $stmt_del_giohang = $conn->prepare($sql_del_giohang);
    $query_del_giohang = $stmt_del_giohang->execute();

    $sql_del = "delete from sanpham where ID_SanPham = '$ID_SanPham'";
    $stmt_del = $conn->prepare($sql_del);
    $query_del = $stmt_del->execute();
    if ($query_del) {
        header("location:admin-products.php");
    } else {
        echo 'ngu';
    }
?>