<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['ID_Account']) || $_SESSION['ID_Account'] == NULL || !isset($_SESSION['user']) || $_SESSION['user'] == null) {
    header('Location: sign-in.php');
    exit();
}

$ID_Account = $_SESSION['ID_Account'];

if (isset($_POST['HoTen']) && isset($_POST['SDT']) && isset($_POST['DiaChi']) && isset($_POST['Email'])) {
    $sql = "UPDATE userinfo SET HoTen = :HoTen, SDT = :SDT, DiaChi = :DiaChi, Email = :Email WHERE ID_Account = :ID_Account";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':HoTen', $_POST['HoTen']);
    $stmt->bindParam(':SDT', $_POST['SDT']);
    $stmt->bindParam(':DiaChi', $_POST['DiaChi']);
    $stmt->bindParam(':Email', $_POST['Email']);
    $stmt->bindParam(':ID_Account', $ID_Account);

    if ($stmt->execute()) {
        if (isset($_POST['ID_SanPham']) && isset($_POST['TongTien'])) {
            $ID_SanPham = $_POST['ID_SanPham'];
            $TongTien = $_POST['TongTien'];
            echo '
            <form id="redirectForm" method="POST" action="payment.php">
                <input type="hidden" name="ID_SanPham" value="'.$ID_SanPham.'">
                <input type="hidden" name="TongTien" value="'.$TongTien.'">
            </form>
            <script>
                document.getElementById("redirectForm").submit();
            </script>
            ';
        } else {
            header('Location: checkout.php');
            exit();
        }
    }
}
?>