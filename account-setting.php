<?php
   include 'connection.php';
   session_start();
   if (!isset($_SESSION['ID_Account']) || $_SESSION['ID_Account'] == NULL || !isset($_SESSION['user']) || $_SESSION['user'] == null) {
      header('Location: sign-in.php');
      exit();
   }
   $ID = $_SESSION['ID_Account'];
   $user = $_SESSION['user'];
   $sql_get_info = "select * from userinfo where ID_Account = '$ID'";
   $stmt_get_info = $conn->prepare($sql_get_info);
   $query_get_info = $stmt_get_info->execute();
   $res_get_info = $stmt_get_info->fetch(PDO::FETCH_ASSOC);
   //sửa đổi thông tin
   if (!empty($_POST['submit'])) {
      if (isset($_POST['hoten']) && isset($_POST['diachi']) && isset($_POST['sdt']) && isset($_POST['email'])) {
         $hoten = $_POST['hoten'];
         $diachi = $_POST['diachi'];
         $sdt = $_POST['sdt'];
         $email = $_POST['email'];
         $file_name = $res_get_info['Avatar'];
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_FILES['avatar']['name'])) {
               $file_name = "./asset/avatar" . strval($_FILES['avatar']['name']); // Lấy tên file từ thẻ input
               $file_tmp = $_FILES['avatar']['tmp_name'];
               move_uploaded_file($file_tmp, $file_name);
            }
         }
         $sql_change = "update userinfo set HoTen = '$hoten', DiaChi = '$diachi', SDT = '$sdt', Avatar = '$file_name', Email = '$email' where ID_Account = '$ID'";
         $stmt_change = $conn->prepare($sql_change);
         $query_change = $stmt_change->execute();
         header("location:account-setting.php");
      }
   }
   if(isset($_SESSION['error'])){
      echo '
      <script type="text/javascript">
         alert("'.$_SESSION['error'].'");
      </script>
      ';
      unset($_SESSION['error']);
   }
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Cài đặt tài khoản</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css">
   </head>
   <body class="sidebar-main-active right-column-fixed">
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
            <?php
               if ($ID == 1) {
                  echo '
         <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="admin-dashboard.php" class="header-logo">
                  <img src="./asset/avatar/logo.png" class="img-fluid rounded" alt="">
                  <div class="logo-title">
                     <span class="text-primary text-uppercase">LAPTOP 23H</span>
                  </div>
               </a>
               <div class="iq-menu-bt-sidebar">
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <li><a href="admin-dashboard.php"><i class="las la-home iq-arrow-left"></i><span>Bảng Điều Khiển</span></a></li>
                     <li><a href="admin-hang.php"><i class="ri-record-circle-line"></i><span>Danh Mục Hãng</span></a></li>
                     <li><a href="admin-loaisp.php"><i class="ri-record-circle-line"></i><span>Danh Mục Loại Sản Phẩm</span></a></li>
                     <li><a href="admin-products.php"><i class="ri-record-circle-line"></i><span>Sản phẩm</span></a></li>
                     <li><a href="admin-khuyenmai.php"><i class="ri-record-circle-line"></i><span>Khuyến mại</span></a></li>
                     <li><a href="sign-in.php"><i class="ri-record-circle-line"></i><span>Đăng Xuất</span></a></li>
                  </ul>
               </nav>
               <div id="sidebar-bottom" class="p-3 position-relative">
                  <div class="iq-card">
                     <div class="iq-card-body">
                        <div class="sidebarbottom-content">
                           <button type="submit" class="btn w-100 btn-primary mt-4 view-more">Shop 23h</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
                  ';
               } else {
                  echo '
               <div class="iq-sidebar">
                  <div class="iq-sidebar-logo d-flex justify-content-between">
                     <a href="index.php" class="header-logo">
                        <img src="./asset/avatar/logo.png" class="img-fluid rounded" alt="">
                        <div class="logo-title">
                           <span class="text-primary text-uppercase">LAPTOP 23H</span>
                        </div>
                     </a>
                     <div class="iq-menu-bt-sidebar">
                        <div class="iq-menu-bt align-self-center">
                           <div class="wrapper-menu">
                              <div class="main-circle"><i class="las la-bars"></i></div>
                           </div>
                        </div>
                     </div>
                  </div>
                     <div id="sidebar-scrollbar">
                        <nav class="iq-sidebar-menu">
                           <ul id="iq-sidebar-toggle" class="iq-menu">
                              <li class="active active-menu">
                                 <a href="#dashboard" class="iq-waves-effect" data-toggle="collapse" aria-expanded="true"><span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i><span>Trang Chủ</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                 <ul id="dashboard" class="iq-submenu collapse show" data-parent="#iq-sidebar-toggle">
                                 </ul>
                              </li>';
                                 $sql_danhmucsanpham = "select * from loaisanpham";
                                 $stmt_danhmucsanpham = $conn->prepare($sql_danhmucsanpham);
                                 $stmt_danhmucsanpham->execute();
                                 if($stmt_danhmucsanpham->rowCount() > 0){
                                    echo '
                                    <li>
                                       <a href="#ui-elements" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="lab la-elementor iq-arrow-left"></i><span>Danh mục sản phẩm</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                       <ul id="ui-elements" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                    ';
                                    while($row = $stmt_danhmucsanpham->fetch(PDO::FETCH_ASSOC)){
                                       echo '
                                          <li class="elements">
                                             <a href="index.php?ID_LoaiSanPham='.$row['ID_LoaiSanPham'].'" class="js-elements-tag-a iq-waves-effect collapsed" aria-expanded="false"><i class="ri-play-circle-line"></i><span>'.$row['TenLoai'].'</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                          </li>
                                       ';
                                    }
                                    echo '
                                       </ul>
                                    </li>
                                    ';
                                 }
                              echo'
                              <li class="active-menu"><a href="logout.php"><i class="ri-book-line"></i><span>Logout</span></a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
                  ';
               }
            ?>
         </div>
         <script>
            $('.js-elements-tag-a').on('click', function(e) {
               e.preventDefault(); // Prevent default link behavior
               $(this).closest('li').find('.collapse').collapse('toggle'); // Toggle collapse
               window.location.href = $(this).attr('href'); // Navigate to the link
            });
         </script>
         <!-- TOP Nav Bar -->
         <?php
            if ($ID == 1) {
               $hoten = strval($res_get_info['HoTen']);
               $avatar = strval($res_get_info['Avatar']);
               echo '
         <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-menu-bt d-flex align-items-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                     </div>
                     <div class="iq-navbar-logo d-flex justify-content-between">
                        <a href="index.html" class="header-logo">
                           <img src="./asset/avatar/logo.png" class="img-fluid rounded-normal" alt="">
                           <div class="logo-title">
                              <span class="text-primary text-uppercase">Shop 23h</span>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="navbar-breadcrumb">
                     <h5 class="mb-0">Trang Chủ</h5>
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-list">
                     <li class="nav-item nav-icon">
                           ';
                              $sql_notification = "SELECT COUNT(*) AS SoLuong FROM notification WHERE ID_Account = :ID_Account AND Status = 0";
                              $stmt_notification = $conn->prepare($sql_notification);
                              $stmt_notification->bindParam(':ID_Account', $_SESSION['ID_Account']);
                              $stmt_notification->execute();
                              $row_notification = $stmt_notification->fetch(PDO::FETCH_ASSOC);
               echo'
                           <a href="#" class="search-toggle iq-waves-effect text-gray rounded ">
                              <i class="ri-notification-2-line"></i>
                              ';
                                 if($row_notification['SoLuong'] > 0){
                                    echo '
                                    <span class="bg-primary dots"></span>
                                    ';
                                 }
                              echo '
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">Thông Báo<small class="badge  badge-light float-right pt-1">'.$row_notification['SoLuong'].'</small></h5>
                                    </div>
                                    <div class="scrollable scrollable-navbar">
                                    ';
                                          $sql_notification = "SELECT * FROM notification WHERE ID_Account = :ID_Account ORDER BY Status ASC, ID_Noti DESC";
                                          $stmt_notification = $conn->prepare($sql_notification);
                                          $stmt_notification->bindParam(':ID_Account', $_SESSION['ID_Account']);
                                          $stmt_notification->execute();
                                          while($row_notification = $stmt_notification->fetch(PDO::FETCH_ASSOC)){
                                             if($row_notification['Status'] == 0){
                                                echo '
                                                <a href="update_notification.php?ID_Noti='.$row_notification['ID_Noti'].'&account-setting=true" class="iq-sub-card notification-items notification-unseen">
                                                   <div class="media align-items-center">
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0 ">'.$row_notification['Mota'].'</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                                ';
                                             }
                                             else{
                                                echo '
                                                <a href="update_notification.php?ID_Noti='.$row_notification['ID_Noti'].'&account-setting=true" class="iq-sub-card notification-items">
                                                   <div class="media align-items-center">
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0 ">'.$row_notification['Mota'].'</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                                ';
                                             }
                                          }
                                    echo'
                                    </div>
                                    <div class="d-flex align-items-center text-center p-3">
                                       <a class="btn btn-primary iq-sign-btn" href="notification.php" role="button">Xem tất cả</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li class="nav-item nav-icon">
                           <a href="admin-accept.php" class="iq-waves-effect text-gray rounded">
                           <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M5.28 2.22a.75.75 0 0 1 0 1.06l-2 2a.75.75 0 0 1-1.06 0l-1-1a.75.75 0 0 1 1.06-1.06l.47.47l1.47-1.47a.75.75 0 0 1 1.06 0M6.5 3.75c0 .414.336.75.75.75h7a.75.75 0 0 0 0-1.5h-7a.75.75 0 0 0-.75.75m.75 3.5a.75.75 0 0 0 0 1.5h7a.75.75 0 0 0 0-1.5zm-1.97.03a.75.75 0 0 0-1.06-1.06L2.75 7.69l-.47-.47a.75.75 0 0 0-1.06 1.06l1 1a.75.75 0 0 0 1.06 0zm0 3.19a.75.75 0 0 1 0 1.06l-2 2a.75.75 0 0 1-1.06 0l-1-1a.75.75 0 1 1 1.06-1.06l.47.47l1.47-1.47a.75.75 0 0 1 1.06 0m1.97 1.03a.75.75 0 0 0 0 1.5h7a.75.75 0 0 0 0-1.5z" clip-rule="evenodd"/></svg>
                              ';
                              $sql_CoDonAcceptKhong = "SELECT * FROM accept";
                              $stmt_CoDonAcceptKhong = $conn->prepare($sql_CoDonAcceptKhong);
                              $stmt_CoDonAcceptKhong->execute();
                              if($stmt_CoDonAcceptKhong->rowCount() > 0){
                                 echo '<span class="bg-primary dots"></span>';
                              }
                              echo '
                           </a>
                        </li>
                        <li class="nav-item nav-icon">
                           <a href="admin-order.php" class="iq-waves-effect text-gray rounded">
                              <i class="ri-shopping-cart-2-line"></i>
                           </a>
                        </li>
                        <li class="line-height pt-3">
                           <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                              ';
                              if($res_get_info['Avatar'] == NULL){
                                 echo '<img src="./asset/image/default_profile.png" class="avatar-navbar img-fluid rounded-circle mr-3">';
                              }else{
                                 echo '<img src="'.$res_get_info['Avatar'].'" class="avatar-navbar img-fluid rounded-circle mr-3">';
                              }
                              echo '
                              <div class="caption">
                                 <h6 class="mb-1 line-height">'.$res_get_info['HoTen'].'</h6>
                                 <p class="mb-0 text-primary">Tài Khoản</p>
                              </div>
                           </a>
                           <div class="iq-sub-dropdown iq-user-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white line-height">Xin Chào '.$res_get_info['HoTen'].'</h5>
                                    </div>
                                    <a href="account-setting.php" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-file-user-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Tài khoản của tôi</h6>
                                          </div>
                                       </div>
                                    </a>
                                    <div class="d-inline-block w-100 text-center p-3">
                                       <a class="bg-primary iq-sign-btn" href="sign-in.php" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
               ';
            } else {
               echo '
         <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-menu-bt d-flex align-items-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                     </div>
                     <div class="iq-navbar-logo d-flex justify-content-between">
                        <a href="index.php" class="header-logo">
                           <img src="./asset/avatar/logo.png" class="img-fluid rounded" alt="">
                           <div class="logo-title">
                              <span class="text-primary text-uppercase">LAPTOP 23H</span>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="navbar-breadcrumb">
                     <h5 class="mb-0">Trang Chủ</h5>
                  </div>
                  <div class="iq-search-bar">
                     <form class="searchbox">
                        <input type="text" id="search_input" class="text search-input" placeholder="Tìm kiếm sản phẩm...">
                        <a id="search_link" class="search-link" href="#"><i class="ri-search-line"></i></a>
                     </form>
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-list">
                        <li class="nav-item nav-icon search-content">
                           <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                              <i class="ri-search-line"></i>
                           </a>
                           <form action="#" class="search-box p-0">
                              <input type="text" class="text search-input" placeholder="Type here to search...">
                              <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                           </form>
                        </li>
                        <li class="nav-item nav-icon">
                           ';
                              $sql_notification = "SELECT COUNT(*) AS SoLuong FROM notification WHERE ID_Account = :ID_Account AND Status = 0";
                              $stmt_notification = $conn->prepare($sql_notification);
                              $stmt_notification->bindParam(':ID_Account', $_SESSION['ID_Account']);
                              $stmt_notification->execute();
                              $row_notification = $stmt_notification->fetch(PDO::FETCH_ASSOC);
                           echo'
                           <a href="#" class="search-toggle iq-waves-effect text-gray rounded ">
                              <i class="ri-notification-2-line"></i>
                              ';
                                 if($row_notification['SoLuong'] > 0){
                                    echo '
                                    <span class="bg-primary dots"></span>
                                    ';
                                 }
                              echo'
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">Thông Báo<small class="badge  badge-light float-right pt-1">'.$row_notification['SoLuong'].'</small></h5>
                                    </div>
                                    <div class="scrollable scrollable-navbar">
                                    ';
                                          $sql_notification = "SELECT * FROM notification WHERE ID_Account = :ID_Account ORDER BY Status ASC, ID_Noti DESC";
                                          $stmt_notification = $conn->prepare($sql_notification);
                                          $stmt_notification->bindParam(':ID_Account', $_SESSION['ID_Account']);
                                          $stmt_notification->execute();
                                          while($row_notification = $stmt_notification->fetch(PDO::FETCH_ASSOC)){
                                             if($row_notification['Status'] == 0){
                                                echo '
                                                <a href="update_notification.php?ID_Noti='.$row_notification['ID_Noti'].'&account-setting=true" class="iq-sub-card notification-items notification-unseen">
                                                   <div class="media align-items-center">
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0 ">'.$row_notification['Mota'].'</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                                ';
                                             }
                                             else{
                                                echo '
                                                <a href="update_notification.php?ID_Noti='.$row_notification['ID_Noti'].'&account-setting=true" class="iq-sub-card notification-items">
                                                   <div class="media align-items-center">
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0 ">'.$row_notification['Mota'].'</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                                ';
                                             }
                                          }
                                    echo '
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                        
                        <li class="nav-item nav-icon dropdown">
                           <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                           <i class="ri-shopping-cart-2-line"></i>
                           <span class="badge badge-danger count-cart rounded-circle">
                              ';
                                 $sql_giohang = "SELECT IFNULL(SUM(SoLuong), 0) AS SoLuong FROM giohang WHERE ID_Account = :ID_Account";
                                 $stmt_giohang = $conn->prepare($sql_giohang);
                                 $stmt_giohang->bindParam(':ID_Account', $_SESSION['ID_Account']);
                                 $stmt_giohang->execute();
                                 $row_giohang = $stmt_giohang->fetch(PDO::FETCH_ASSOC);
                                 echo $row_giohang['SoLuong'];
                              echo'
                           </span>
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 toggle-cart-info">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">Giỏ Hàng
                                          <small class="badge  badge-light float-right pt-1">
                                             ';
                                                echo $row_giohang['SoLuong'];
                                             echo'
                                          </small>
                                       </h5>
                                    </div>
                                    <div class="scrollable scrollable-navbar">
                                    ';
                                       $sql_giohang = "SELECT gh.ID_GioHang, gh.ID_Account, gh.SoLuong, sp.ID_SanPham, sp.TenSP, sp.Gia as GiaTruoc, COALESCE( CASE WHEN km.MucGiam IS NOT NULL THEN (sp.Gia * (100 - km.MucGiam)) / 100 ELSE sp.Gia END, sp.Gia ) AS Gia, sp.Hang, sp.Status, sp.ThongTin, sp.DaBan, sp.BaoHanh, sp.ID_KhuyenMai, sp.ID_LoaiSanPham, ha.link FROM giohang gh JOIN sanpham sp ON gh.ID_SanPham = sp.ID_SanPham LEFT JOIN khuyenmai km ON sp.ID_KhuyenMai = km.ID_KhuyenMai JOIN (SELECT ID_SanPham, MIN(ID_HASP) AS Min_ID_HASP FROM hinhanhsanpham GROUP BY ID_SanPham) AS ha_min ON sp.ID_SanPham = ha_min.ID_SanPham JOIN hinhanhsanpham ha ON ha_min.Min_ID_HASP = ha.ID_HASP WHERE gh.ID_Account = :ID_Account GROUP BY sp.ID_SanPham ORDER BY gh.ID_GioHang DESC";
                                       $stmt_giohang = $conn->prepare($sql_giohang);
                                       $stmt_giohang->bindParam(':ID_Account', $_SESSION['ID_Account']);
                                       $stmt_giohang->execute();
                                       while($result_giohang = $stmt_giohang->fetch(PDO::FETCH_ASSOC)){
                                          echo '
                                          <div class="cart_items">
                                             <a href="product_detail.php?ID='.$result_giohang['ID_SanPham'].'" class="iq-sub-card">
                                                <div class="media align-items-center">
                                                   <div class="w-25">
                                                      <img class="w-100 rounded" src="'.$result_giohang['link'].'" alt="">
                                                   </div>
                                                   <div class="media-body ml-3">
                                                      <h6 class="mb-0 ">'.$result_giohang['TenSP'].'</h6>
                                                      <div>
                                                         <span class="mb-0">'.number_format($result_giohang['Gia'], 0, ',', '.').'</span>
                                                         <span style="color: red;" class="mb-0">x '.$result_giohang['SoLuong'].'</span>
                                                      </div>
                                                   </div>
                                                </div>
                                             </a>
                                             <div class="font-size-24 text-danger"><a href="delete_on_cart.php?ID_GioHang='.$result_giohang['ID_GioHang'].'" class="ri-close-fill"></a></div>
                                          </div>
                                          ';
                                       }
                                    echo'
                                    </div>
                                    <div class="d-flex align-items-center text-center p-3">
                                       <a class="btn btn-primary iq-sign-btn" href="checkout.php" role="button">Thanh Toán</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li class="line-height pt-3">
                           <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                              ';
                                 $sql_account = "select * from userinfo where ID_Account = :ID_Account";
                                 $stmt_account = $conn->prepare($sql_account);
                                 $stmt_account->bindParam(':ID_Account', $_SESSION['ID_Account']);
                                 $stmt_account->execute();
                                 $row_account = $stmt_account->fetch(PDO::FETCH_ASSOC);
                                 if($row_account['Avatar'] == NULL){
                                    echo '<img src="./asset/image/default_profile.png" class="avatar-navbar img-fluid rounded-circle mr-3">';
                                 }else{
                                    echo '<img src="'.$row_account['Avatar'].'" class="avatar-navbar img-fluid rounded-circle mr-3">';
                                 }
                              echo'
                              <div class="caption">
                                 <h6 class="mb-1 line-height">'.$_SESSION['user'].'</h6>
                                 <p class="mb-0 text-primary">Tài Khoản</p>
                              </div>
                           </a>
                           <div class="iq-sub-dropdown iq-user-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white line-height">Xin Chào '.$_SESSION['user'].'</h5>
                                    </div>
                                    <a href="account-setting.php?ID='.$_SESSION['ID_Account'].'" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-file-user-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Tài khoản của tôi</h6>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="order.php" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-account-box-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Đơn hàng của tôi</h6>
                                          </div>
                                       </div>
                                    </a>
                                    <div class="d-inline-block w-100 text-center p-3">
                                       <a class="bg-primary iq-sign-btn" href="logout.php" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
               ';
            }
         ?>
         <script>
                        const searchInput = document.getElementById('search_input');
                        const searchLink = document.getElementById('search_link');

                        // Add event listener to the search input
                        searchInput.addEventListener('keydown', (e) => {
                        if (e.key === 'Enter') {
                           e.preventDefault(); // Prevent default form submission
                           search(); // Call the search function
                        }
                        });
                        // Add event listener to the search link
                        searchLink.addEventListener('click', (e) => {
                        e.preventDefault(); // Prevent default link behavior
                        search(); // Call the search function
                        });
                        // Define the search function
                        function search() {
                        const searchTerm = searchInput.value; // Get the search term from the input
                        window.location.href = `index.php?TenSP=${searchTerm}`; // Navigate to the search page with the search term
                        }
                     </script>
         <!-- TOP Nav Bar END -->
         
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Thông tin hiển thị</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="acc-edit">
                              <form method="post" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label>Hình ảnh:</label>
                                    <div class="custom-file">
                                       <input type="file" name="avatar" id="imageUpload" class="custom-file-input" accept="image/png, image/jpeg" value="<?php echo $res_get_info['Avatar']?>">
                                       <img id="avatr" src="<?php echo $res_get_info['Avatar']?>" alt="" style="object-fit: contain; width: 350px; height: 400px; margin-top: 20px;">
                                       <label class="custom-file-label">Choose file</label>
                                       <script>
                                          document.getElementById('imageUpload').addEventListener('change', function(e) {
                                             var img = document.getElementById('avatr');
                                             img.src = URL.createObjectURL(e.target.files[0]);
                                             img.onload = function() {
                                                URL.revokeObjectURL(img.src);
                                             }
                                          });
                                       </script>
                                    </div>
                                 </div>
                                 <div class="form-group" style="margin-top: 200px">
                                    <label for="uname">Họ tên:</label>
                                    <input name="hoten" type="text" class="form-control" id="uname" value="<?php echo $res_get_info['HoTen']?>">
                                 </div>
                                 <button type="submit" class="btn btn-primary nutxacnhan" name="submit" value="submit" onclick="validatePhone()">Xác nhận</button>
                              
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Thông tin chi tiết</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="acc-edit">
                                 <div class="form-group">
                                    <label for="facebook">Địa chỉ:</label>
                                    <input name="diachi" type="text" class="form-control" id="facebook" value="<?php echo $res_get_info['DiaChi']?>">
                                 </div>
                                 <div class="form-group">
                                    <label for="twitter">Số điện thoại:</label>
                                    <input name="sdt" type="text" class="form-control" id="sdt" value="<?php echo $res_get_info['SDT']?>">
                                 </div>
                                 <div class="form-group">
                                    <label for="google">Email:</label>
                                    <input name="email" type="email" class="form-control" id="google" value="<?php echo $res_get_info['Email']?>">
                                 </div>
                                 <button type="submit" class="btn btn-primary nutxacnhan" name="submit" value="submit" onclick="validatePhone()">Xác nhận</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <script>
                     document.getElementById('sdt').addEventListener('input', function (e) {
                        if (this.value.length > 10) {
                           this.value = this.value.slice(0, 10);
                        }
                        this.value = this.value.replace(/[^0-9]/g, '');
                        var buttons = document.getElementsByClassName('nutxacnhan');
                        for (var i = 0; i < buttons.length; i++) {
                           if (this.value.length == 10) {
                              buttons[i].disabled = false;
                           } else {
                              buttons[i].disabled = true;
                           }
                        }
                     });
                  </script>
                  <div class="col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Bảo mật</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="acc-edit">
                              <div class="form-group">
                                 <label for="old-pass">Mật khẩu cũ:</label>
                                 <input name="old-pass" type="password" class="form-control" id="old-pass" value="">
                              </div>
                              <div class="form-group">
                                 <label for="new-pass">Mật khẩu mới:</label>
                                 <input name="new-pass" type="password" class="form-control" id="new-pass" value="">
                              </div>
                              <div class="form-group">
                                 <label for="repeat-new-pass">Nhập lại mật khẩu mới:</label>
                                 <input name="repeat-new-pass" type="password" class="form-control" id="repeat-new-pass" value="">
                              </div>
                              <button id="btn-change-password" class="btn btn-primary">Xác nhận</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <script>
                                 document.getElementById('btn-change-password').addEventListener('click', function() {
                                    var oldpass = document.getElementById('old-pass').value;
                                    var newPass = document.getElementById('new-pass').value;
                                    var repeatNewPass = document.getElementById('repeat-new-pass').value;

                                    if (newPass === '' || repeatNewPass === '') {
                                       alert('Mật khẩu mới không được để trống. Vui lòng nhập lại.');
                                    } else if (newPass !== repeatNewPass) {
                                       alert('Mật khẩu mới không khớp. Vui lòng nhập lại.');
                                    } else {
                                       // Chuyển hướng người dùng đến trang change-pass.php
                                       window.location.href = 'change-pass.php?oldpass=' + oldpass + '&newpass=' + newPass;
                                    }
                                 });
                              </script>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
       <!-- Footer -->
       <footer class="iq-footer">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6">
                  <ul class="list-inline mb-0">
                     <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                     <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                  </ul>
               </div>
               <div class="col-lg-6 text-right">
                  Copyright 2024 <a href="#">Half past - Under Social</a> All Rights Reserved.
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer END -->
      <!-- color-customizer -->
       <div class="iq-colorbox color-fix">
           <div class="buy-button"> <a class="color-full" href="#"><i class="fa fa-spinner fa-spin"></i></a> </div>
           <div class="clearfix color-picker">
               <h3 class="iq-font-black">Awesome Color</h3>
               <p>This color combo available inside whole template. You can change on your wish, Even you can create your own with limitless possibilities! </p>
               <ul class="iq-colorselect clearfix">
                   <li class="color-1 iq-colormark" data-style="color-1"></li>
                   <li class="color-2" data-style="iq-color-2"></li>
                   <li class="color-3" data-style="iq-color-3"></li>
                   <li class="color-4" data-style="iq-color-4"></li>
                   <li class="color-5" data-style="iq-color-5"></li>
                   <li class="color-6" data-style="iq-color-6"></li>
                   <li class="color-7" data-style="iq-color-7"></li>
                   <li class="color-8" data-style="iq-color-8"></li>
                   <li class="color-9" data-style="iq-color-9"></li>
                   <li class="color-10" data-style="iq-color-10"></li>
                   <li class="color-11" data-style="iq-color-11"></li>
                   <li class="color-12" data-style="iq-color-12"></li>
                   <li class="color-13" data-style="iq-color-13"></li>
                   <li class="color-14" data-style="iq-color-14"></li>
                   <li class="color-15" data-style="iq-color-15"></li>
                   <li class="color-16" data-style="iq-color-16"></li>
                   <li class="color-17" data-style="iq-color-17"></li>
                   <li class="color-18" data-style="iq-color-18"></li>
                   <li class="color-19" data-style="iq-color-19"></li>
                   <li class="color-20" data-style="iq-color-20"></li>
               </ul>
               <a target="_blank" class="btn btn-primary d-block mt-3" href="">Purchase Now</a>
           </div>
       </div>
       <!-- color-customizer END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="js/waypoints.min.js"></script>
      <script src="js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="js/smooth-scrollbar.js"></script>
      <!-- lottie JavaScript -->
      <script src="js/lottie.js"></script>
      <!-- am core JavaScript -->
      <script src="js/core.js"></script>
      <!-- am charts JavaScript -->
      <script src="js/charts.js"></script>
      <!-- am animated JavaScript -->
      <script src="js/animated.js"></script>
      <!-- am kelly JavaScript -->
      <script src="js/kelly.js"></script>
      <!-- am maps JavaScript -->
      <script src="js/maps.js"></script>
      <!-- am worldLow JavaScript -->
      <script src="js/worldLow.js"></script>
      <!-- Style Customizer -->
      <script src="js/style-customizer.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="js/custom.js"></script>
   </body>
</html>