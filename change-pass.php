<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['ID_Account']) || $_SESSION['ID_Account'] == NULL || !isset($_SESSION['user']) || $_SESSION['user'] == null) {
    header('Location: sign-in.php');
    exit();
}
if(isset($_GET['oldpass']) && isset($_GET['newpass'])){
    $sql="SELECT * FROM account WHERE ID_Account = :ID_Account";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID_Account', $_SESSION['ID_Account']);
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    if(!password_verify($_GET['oldpass'], $row['MatKhau'])){
        $_SESSION['error'] = "Mật khẩu cũ không đúng";
        header('Location: account-setting.php');
        exit;
    }else{
        $hashedPassword = password_hash($_GET['newpass'], PASSWORD_BCRYPT);
        $sql_temp="UPDATE account SET MatKhau = :MatKhau WHERE ID_Account = :ID_Account";
        $stmt_temp = $conn->prepare($sql_temp);
        $stmt_temp->bindParam(':MatKhau', $hashedPassword);
        $stmt_temp->bindParam(':ID_Account', $_SESSION['ID_Account']);
        if($stmt_temp->execute()){
            $_SESSION['error'] = "Đổi mật khẩu thành công";
            header('Location: account-setting.php');
            exit;
        }
    }
}
?>