<?php
    include 'connection.php';
    $ID_Hang = $_GET['ID_Hang'];

    $sql_del_sp = "select * from sanpham where ID_LoaiSanPham = '$ID_Hang'";
    $stmt_del_sp = $conn->prepare($sql_del_sp);
    $query_del_sp = $stmt_del_sp->execute();
    while ($res_del_sp = $stmt_del_sp->fetch(PDO::FETCH_ASSOC)) {
        $ID_SanPham = $res_del_sp['ID_SanPham'];
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
    }
    $sql_del_hang = "delete from loaisanpham where ID_LoaiSanPham = '$ID_Hang'";
    $stmt_del_hang = $conn->prepare($sql_del_hang);
    $query_del_hang = $stmt_del_hang->execute();
    if ($query_del_hang) {
        header("location:admin-loaisp.php");
    } else {
        echo 'ngu';
    }
?>