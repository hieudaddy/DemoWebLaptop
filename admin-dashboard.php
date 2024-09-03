<?php
   include 'connection.php';
   //truy vấn sản phẩm
   session_start();
   if (!isset($_SESSION['ID_Account']) || $_SESSION['ID_Account'] == NULL || !isset($_SESSION['user']) || $_SESSION['user'] == null || $_SESSION['user'] != 'admin' || $_SESSION['ID_Account'] != 1) {
      header('Location: sign-in.php');
      exit();
   }
   $ID_Account = $_SESSION['ID_Account'];
   $sql_sp = "select * from sanpham";
   $stmt_sp = $conn->prepare($sql_sp);
   $query_sp = $stmt_sp->execute();

   $sql_getinfo_user = "select * from userinfo where ID_Account = '$ID_Account'";
   $stmt_getinfo_user = $conn->prepare($sql_getinfo_user);
   $query_getinfo_user = $stmt_getinfo_user->execute();
   $res_getinfo_user = $stmt_getinfo_user->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Admin Dashboard - Laptop 23h</title>
      <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
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
       <!-- Raphael-min JavaScript -->
       <script src="js/raphael-min.js"></script>
       <!-- Morris JavaScript -->
       <script src="js/morris.js"></script>
       <!-- Morris min JavaScript -->
       <script src="js/morris.min.js"></script>
       <!-- Flatpicker Js -->
       <script src="js/flatpickr.js"></script>
       <!-- Style Customizer -->
       <script src="js/style-customizer.js"></script>
       <!-- Chart Custom JavaScript -->
       <script src="js/chart-custom.js"></script>
       <!-- Custom JavaScript -->
       <script src="js/custom.js"></script>
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
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="admin-dashboard.php" class="header-logo">
                  <img src="./asset/avatar/logo.png" class="img-fluid rounded-normal" alt="">
                  <div class="logo-title">
                     <span class="text-primary text-uppercase">Shop 23h</span>
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
         </div>
         <!-- TOP Nav Bar -->
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
                           <?php
                              $sql_notification = "SELECT COUNT(*) AS SoLuong FROM notification WHERE ID_Account = :ID_Account AND Status = 0";
                              $stmt_notification = $conn->prepare($sql_notification);
                              $stmt_notification->bindParam(':ID_Account', $_SESSION['ID_Account']);
                              $stmt_notification->execute();
                              $row_notification = $stmt_notification->fetch(PDO::FETCH_ASSOC);
                           ?>
                           <a href="#" class="search-toggle iq-waves-effect text-gray rounded ">
                              <i class="ri-notification-2-line"></i>
                              <?php
                                 if($row_notification['SoLuong'] > 0){
                                    echo '
                                    <span class="bg-primary dots"></span>
                                    ';
                                 }
                              ?>
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">Thông Báo<small class="badge  badge-light float-right pt-1"><?php echo $row_notification['SoLuong']; ?></small></h5>
                                    </div>
                                    <div class="scrollable scrollable-navbar">
                                    <?php
                                       if($row_notification['SoLuong'] >= 0){
                                          $sql_notification = "SELECT * FROM notification WHERE ID_Account = :ID_Account ORDER BY Status ASC, ID_Noti DESC";
                                          $stmt_notification = $conn->prepare($sql_notification);
                                          $stmt_notification->bindParam(':ID_Account', $_SESSION['ID_Account']);
                                          $stmt_notification->execute();
                                          while($row_notification = $stmt_notification->fetch(PDO::FETCH_ASSOC)){
                                             if($row_notification['Status'] == 0){
                                                echo '
                                                <a href="update_notification.php?ID_Noti='.$row_notification['ID_Noti'].'&admin-dashboard=true" class="iq-sub-card notification-items notification-unseen">
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
                                                <a href="update_notification.php?ID_Noti='.$row_notification['ID_Noti'].'&admin-dashboard=true" class="iq-sub-card notification-items">
                                                   <div class="media align-items-center">
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0 ">'.$row_notification['Mota'].'</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                                ';
                                             }
                                          }
                                       }
                                    ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li class="nav-item nav-icon">
                           <a href="admin-accept.php" class="iq-waves-effect text-gray rounded">
                           <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M5.28 2.22a.75.75 0 0 1 0 1.06l-2 2a.75.75 0 0 1-1.06 0l-1-1a.75.75 0 0 1 1.06-1.06l.47.47l1.47-1.47a.75.75 0 0 1 1.06 0M6.5 3.75c0 .414.336.75.75.75h7a.75.75 0 0 0 0-1.5h-7a.75.75 0 0 0-.75.75m.75 3.5a.75.75 0 0 0 0 1.5h7a.75.75 0 0 0 0-1.5zm-1.97.03a.75.75 0 0 0-1.06-1.06L2.75 7.69l-.47-.47a.75.75 0 0 0-1.06 1.06l1 1a.75.75 0 0 0 1.06 0zm0 3.19a.75.75 0 0 1 0 1.06l-2 2a.75.75 0 0 1-1.06 0l-1-1a.75.75 0 1 1 1.06-1.06l.47.47l1.47-1.47a.75.75 0 0 1 1.06 0m1.97 1.03a.75.75 0 0 0 0 1.5h7a.75.75 0 0 0 0-1.5z" clip-rule="evenodd"/></svg>
                              <?php
                              $sql_CoDonAcceptKhong = "SELECT * FROM accept";
                              $stmt_CoDonAcceptKhong = $conn->prepare($sql_CoDonAcceptKhong);
                              $stmt_CoDonAcceptKhong->execute();
                              if($stmt_CoDonAcceptKhong->rowCount() > 0){
                                 echo '<span class="bg-primary dots"></span>';
                              }
                              ?>
                           </a>
                        </li>
                        <li class="nav-item nav-icon">
                           <a href="admin-order.php" class="iq-waves-effect text-gray rounded">
                              <i class="ri-shopping-cart-2-line"></i>
                           </a>
                        </li>
                        <li class="line-height pt-3">
                           <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                              <?php 
                              if($res_getinfo_user['Avatar'] == NULL){
                                 echo '<img src="./asset/image/default_profile.png" class="avatar-navbar img-fluid rounded-circle mr-3">';
                              }else{
                                 echo '<img src="'.$res_getinfo_user['Avatar'].'" class="avatar-navbar img-fluid rounded-circle mr-3">';
                              }
                              ?>
                              <div class="caption">
                                 <h6 class="mb-1 line-height"><?php echo $res_getinfo_user['HoTen']?></h6>
                                 <p class="mb-0 text-primary">Tài Khoản</p>
                              </div>
                           </a>
                           <div class="iq-sub-dropdown iq-user-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white line-height">Xin Chào <?php echo $res_getinfo_user['HoTen']?></h5>
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
         <!-- TOP Nav Bar END -->
         <!-- Page Content  -->
         <?php
            $sql_NguoiDung = "SELECT COUNT(*) AS SoLuong FROM account";
            $stmt_NguoiDung = $conn->prepare($sql_NguoiDung);
            $stmt_NguoiDung->execute();
            $row_NguoiDung = $stmt_NguoiDung->fetch(PDO::FETCH_ASSOC);

            $sql_SoLuongSanPham = "SELECT COUNT(*) AS SoLuong FROM sanpham";
            $stmt_SoLuongSanPham = $conn->prepare($sql_SoLuongSanPham);
            $stmt_SoLuongSanPham->execute();
            $row_SoLuongSanPham = $stmt_SoLuongSanPham->fetch(PDO::FETCH_ASSOC);

            $sql_SoLuongDonHang = "SELECT COUNT(*) AS SoLuong FROM donhang";
            $stmt_SoLuongDonHang = $conn->prepare($sql_SoLuongDonHang);
            $stmt_SoLuongDonHang->execute();
            $row_SoLuongDonHang = $stmt_SoLuongDonHang->fetch(PDO::FETCH_ASSOC);

            $sql_SoLuongAccept = "SELECT COUNT(*) AS SoLuong FROM accept";
            $stmt_SoLuongAccept = $conn->prepare($sql_SoLuongAccept);
            $stmt_SoLuongAccept->execute();
            $row_SoLuongAccept = $stmt_SoLuongAccept->fetch(PDO::FETCH_ASSOC);
         ?>
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center">
                              <div class="rounded-circle iq-card-icon bg-primary"><i class="ri-user-line"></i></div>
                              <div class="text-left ml-3">                                 
                                 <h2 class="mb-0"><span class="counter"><?php echo $row_NguoiDung['SoLuong']-1 ?></span></h2>
                                 <h5 class="">Người dùng</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a href="admin-products.php" class="d-block col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center">
                              <div class="rounded-circle iq-card-icon bg-danger"><i class="ri-book-line"></i></div>
                              <div class="text-left ml-3">                                 
                                 <h2 class="mb-0"><span class="counter"><?php echo $row_SoLuongSanPham['SoLuong'] ?></span></h2>
                                 <h5 class="">Sản phẩm</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </a>
                  <a href="admin-order.php" class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center">
                              <div class="rounded-circle iq-card-icon bg-warning"><i class="ri-shopping-cart-2-line"></i></div>
                              <div class="text-left ml-3">                                 
                                 <h2 class="mb-0"><span class="counter"><?php echo $row_SoLuongDonHang['SoLuong'] ?></span></h2>
                                 <h5 class="">Đơn Hàng</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </a>
                  <a href="admin-accept.php" class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center">
                              <div class="rounded-circle iq-card-icon bg-info"><i class="ri-radar-line"></i></div>
                              <div class="text-left ml-3">                                 
                                 <h2 class="mb-0"><span class="counter"><?php echo $row_SoLuongAccept['SoLuong'] ?></span></h2>
                                 <h5 class="">Chờ Duyệt</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </a>
                  <div class="tab col-md-12 p-0">
                     <button class="tablinks" onclick="openSatistical(event, 'Ngay', 'summary-day')" id="defaultOpen">Ngày</button>
                     <button class="tablinks" onclick="openSatistical(event, 'Thang', 'summary-month')">Tháng</button>
                     <button class="tablinks" onclick="openSatistical(event, 'Nam', 'summary-year')">Năm</button>
                  </div>
                  <div id="Ngay" class="col-md-6 tabcontent">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center">
                           <div class="iq-header-title dashboard-frame">
                              <h4 class="card-title mb-0">Doanh số hàng ngày</h4>
                              <?php 
                                 if(isset($_GET['NgayCapNhat']) && $_GET['NgayCapNhat'] != ''){
                                    echo '<input value="'.$_GET['NgayCapNhat'].'" type="date" name="" id="date_statistical">';
                                 }else{
                                    echo '<input type="date" name="" id="date_statistical">';
                                 }
                              ?>
                              <script>
                                 var date_statistical = document.getElementById('date_statistical');
                                 date_statistical.addEventListener('change', function() {
                                    var selectedDate = this.value;
                                    window.location.href = 'admin-dashboard.php?NgayCapNhat=' + selectedDate;
                                 });
                              </script>
                           </div>
                        </div>
                        <?php
                           $dataNgay = array();
                           for ($i = 0; $i < 7; $i++) {
                              $date_check = new DateTime();
                              if(isset($_GET['NgayCapNhat']) && $_GET['NgayCapNhat'] != ''){
                                 $date_check = DateTime::createFromFormat('Y-m-d', $_GET['NgayCapNhat']);
                              }
                              $date_check->modify('-' . $i . ' day');
                              $date_check_str = $date_check->format('Y-m-d');
                              $sql_TongDoanhThuNgay = "SELECT COALESCE(SUM(chitietdonhang.TongTien), 0) AS Total FROM donhang JOIN chitietdonhang ON donhang.ID_DonHang = chitietdonhang.ID_DonHang WHERE donhang.ID_Status_Giao = 5 AND donhang.NgayCapNhat = '$date_check_str'";
                              $stmt_TongDoanhThuNgay = $conn->prepare($sql_TongDoanhThuNgay);
                              $stmt_TongDoanhThuNgay->execute();
                              $TongDoanhThuNgay = $stmt_TongDoanhThuNgay->fetch(PDO::FETCH_ASSOC);
                              array_unshift($dataNgay, $TongDoanhThuNgay['Total']);
                           }
                           $jsonDataNgay = json_encode($dataNgay);
                        ?>
                        <div class="iq-card-body">
                           <div id="iq-sale-chart"></div>
                        </div>
                     </div>
                  </div>
                  <div id="Thang" class="col-md-6 tabcontent">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center">
                           <div class="iq-header-title dashboard-frame">
                              <h4 class="card-title mb-0">Doanh số hàng tháng</h4>
                           </div>
                        </div>
                        <?php
                           $dataThang = array();
                           for ($month_check = 12; $month_check >= 1; $month_check--) {
                              $sql_TongDoanhThuThang = "SELECT COALESCE(SUM(chitietdonhang.TongTien), 0) AS Total FROM donhang JOIN chitietdonhang ON donhang.ID_DonHang = chitietdonhang.ID_DonHang WHERE donhang.ID_Status_Giao = 5 AND MONTH(donhang.NgayCapNhat) = '$month_check'";
                              $stmt_TongDoanhThuThang = $conn->prepare($sql_TongDoanhThuThang);
                              $stmt_TongDoanhThuThang->execute();
                              $TongDoanhThuThang = $stmt_TongDoanhThuThang->fetch(PDO::FETCH_ASSOC); 
                              array_unshift($dataThang, $TongDoanhThuThang['Total']);
                           }
                           $jsonDataThang = json_encode($dataThang);
                        ?>
                        <div class="iq-card-body">
                           <div id="iq-sale-chart-month"></div>
                        </div>
                     </div>
                  </div>
                  <div id="Nam" class="col-md-6 tabcontent">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center">
                           <div class="iq-header-title dashboard-frame">
                              <h4 class="card-title mb-0">Doanh số 5 năm gần nhất</h4>
                           </div>
                        </div>
                        <?php
                           $dataNam = array();
                           $currentYear = date("Y");
                           $currentMonth = date("m-Y");
                           $get_date_check = new DateTime();
                           if(isset($_GET['NgayCapNhat']) && $_GET['NgayCapNhat'] != ''){
                              $get_date_check = DateTime::createFromFormat('Y-m-d', $_GET['NgayCapNhat']);
                           }
                           $get_date_check = $get_date_check->format('Y-m-d');
                           for ($year_check = $currentYear; $year_check > $currentYear - 5; $year_check--) {
                              $sql_TongDoanhThuNam = "SELECT COALESCE(SUM(chitietdonhang.TongTien), 0) AS Total FROM donhang JOIN chitietdonhang ON donhang.ID_DonHang = chitietdonhang.ID_DonHang WHERE donhang.ID_Status_Giao = 5 AND YEAR(donhang.NgayCapNhat) = '$year_check'";
                              $stmt_TongDoanhThuNam = $conn->prepare($sql_TongDoanhThuNam);
                              $stmt_TongDoanhThuNam->execute();
                              $TongDoanhThuNam = $stmt_TongDoanhThuNam->fetch(PDO::FETCH_ASSOC); 
                              array_unshift($dataNam, $TongDoanhThuNam['Total']);
                           }
                           $jsonDataNam = json_encode($dataNam);
                        ?>
                        <div class="iq-card-body">
                           <div id="iq-sale-chart-year"></div>
                        </div>
                     </div>
                  </div>
                  <div id="summary-year" class="col-md-6 tabcontent">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header">
                           <div class="iq-header-title d-flex justify-content-between align-items-center">
                              <h4 class="card-title mb-0">Tóm lược <?php echo $currentYear; ?></h4>
                              <div class="iq-card-header-toolbar d-flex align-items-center">
                                 <div class="dropdown">
                                    <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                    <i class="ri-more-fill"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
                                       <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>In</a>
                                       <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Tải xuống</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <ul class="list-inline p-0 mb-0">
                              <li>
                              <?php
                                 $sql_TongSanPhamBanDuocTrongNam = "SELECT COALESCE(SUM(chitietdonhang.SoLuong), 0) AS Total FROM donhang JOIN chitietdonhang ON donhang.ID_DonHang = chitietdonhang.ID_DonHang WHERE donhang.ID_Status_Giao = 5 AND YEAR(donhang.NgayCapNhat) = '$currentYear'";
                                 $stmt_TongSanPhamBanDuocTrongNam = $conn->prepare($sql_TongSanPhamBanDuocTrongNam);
                                 $stmt_TongSanPhamBanDuocTrongNam->execute();
                                 $TongSanPhamBanDuocTrongNam = $stmt_TongSanPhamBanDuocTrongNam->fetch(PDO::FETCH_ASSOC); 

                                 $sql_TongSanPham = "SELECT COALESCE(SUM(SoLuong), 0) AS SoLuongKho FROM sanpham";
                                 $stmt_TongSanPham = $conn->prepare($sql_TongSanPham);
                                 $stmt_TongSanPham->execute();
                                 $row_TongSanPham = $stmt_TongSanPham->fetch(PDO::FETCH_ASSOC);
                                 $SoLuongKho = $row_TongSanPham['SoLuongKho'];
                                 $percent_SanPhamBanDuocNam_Kho = number_format(($TongSanPhamBanDuocTrongNam['Total']/$SoLuongKho)*100,2);
                                 // pickup-shipping-confirm-success-recall-cancel-order
                                 $sql_SoLuongDonHangClearTheoNam = "SELECT COUNT(CASE WHEN ID_Status_Giao = 2 THEN 1 ELSE NULL END) AS Pickup, COUNT(CASE WHEN ID_Status_Giao = 3 THEN 1 ELSE NULL END) AS Shipping, COUNT(CASE WHEN ID_Status_Giao = 4 THEN 1 ELSE NULL END) AS Confirm, COUNT(CASE WHEN ID_Status_Giao = 5 THEN 1 ELSE NULL END) AS Success, COUNT(CASE WHEN ID_Status_Giao = 6 THEN 1 ELSE NULL END) AS Cancel, COUNT(CASE WHEN ID_Status_Giao = 7 THEN 1 ELSE NULL END) AS Recall, COUNT(*) AS Total FROM donhang WHERE YEAR(NgayCapNhat) = '$currentYear'";
                                 $stmt_SoLuongDonHangClearTheoNam = $conn->prepare($sql_SoLuongDonHangClearTheoNam);
                                 $stmt_SoLuongDonHangClearTheoNam->execute();
                                 $row_SoLuongDonHangClearTheoNam = $stmt_SoLuongDonHangClearTheoNam->fetch(PDO::FETCH_ASSOC);
                                 $dataPointsNam = array();
                                 if($row_SoLuongDonHangClearTheoNam['Total'] == 0){
                                    $dataPointsNam = array(
                                       array("label" => "Chờ lấy hàng", "y" => 0),
                                       array("label" => "Đang giao hàng", "y" => 0),
                                       array("label" => "Đã giao", "y" => 0),
                                       array("label" => "Thành công", "y" => 0),
                                       array("label" => "Đã hủy", "y" => 0),
                                       array("label" => "Trả hàng", "y" => 0),
                                    );
                                 }else{
                                    $dataPointsNam = array(
                                       array("label" => "Chờ lấy hàng", "y" => ($row_SoLuongDonHangClearTheoNam['Pickup']/$row_SoLuongDonHangClearTheoNam['Total'])*100),
                                       array("label" => "Đang giao hàng", "y" => ($row_SoLuongDonHangClearTheoNam['Shipping']/$row_SoLuongDonHangClearTheoNam['Total'])*100),
                                       array("label" => "Đã giao", "y" => ($row_SoLuongDonHangClearTheoNam['Confirm']/$row_SoLuongDonHangClearTheoNam['Total'])*100),
                                       array("label" => "Thành công", "y" => ($row_SoLuongDonHangClearTheoNam['Success']/$row_SoLuongDonHangClearTheoNam['Total'])*100),
                                       array("label" => "Đã hủy", "y" => ($row_SoLuongDonHangClearTheoNam['Cancel']/$row_SoLuongDonHangClearTheoNam['Total'])*100),
                                       array("label" => "Trả hàng", "y" => ($row_SoLuongDonHangClearTheoNam['Recall']/$row_SoLuongDonHangClearTheoNam['Total'])*100),
                                    );
                                 }
                                // Chuyển đổi mảng dataPointsNam thành JSON
                                $jsonDataPieYear = json_encode($dataPointsNam);
                                 echo '
                                 <div class="iq-details mb-2">
                                    <span class="title text-primary">Tổng sản phẩm bán được '.$currentYear.'</span>
                                    <div class="percentage float-right text-primary">'.$TongSanPhamBanDuocTrongNam['Total'].'</div>
                                    <div class="iq-progress-bar-linear d-inline-block w-100">
                                       <div class="bar_percent_max iq-progress-bar iq-bg-primary">
                                          <span class="bg-green" data-percent="'.$percent_SanPhamBanDuocNam_Kho.'"></span>
                                       </div>
                                    </div>
                                 </div>  
                                 ';
                              ?>
                              <div class="w-100 mb-2" id="iq-pickup-shipping-confirm-success-recall-cancel-order-year"></div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div id="summary-month" class="col-md-6 tabcontent">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header">
                           <div class="iq-header-title d-flex justify-content-between align-items-center">
                              <h4 class="card-title mb-0">Tóm lược <?php echo $currentMonth?></h4>
                              <div class="iq-card-header-toolbar d-flex align-items-center">
                                 <div class="dropdown">
                                    <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                    <i class="ri-more-fill"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
                                       <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>In</a>
                                       <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Tải xuống</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <ul class="list-inline p-0 mb-0">
                              <li>
                              <?php
                                 $sql_TongSanPhamBanDuocTrongThang = "SELECT COALESCE(SUM(chitietdonhang.SoLuong), 0) AS Total FROM donhang JOIN chitietdonhang ON donhang.ID_DonHang = chitietdonhang.ID_DonHang WHERE donhang.ID_Status_Giao = 5 AND MONTH(NgayCapNhat) = '$currentMonth' AND YEAR(NgayCapNhat) = '$currentYear'";
                                 $stmt_TongSanPhamBanDuocTrongThang = $conn->prepare($sql_TongSanPhamBanDuocTrongThang);
                                 $stmt_TongSanPhamBanDuocTrongThang->execute();
                                 $TongSanPhamBanDuocTrongThang = $stmt_TongSanPhamBanDuocTrongThang->fetch(PDO::FETCH_ASSOC); 

                                 $percent_SanPhamBanDuocThang_Kho = number_format(($TongSanPhamBanDuocTrongThang['Total']/$SoLuongKho)*100,2);
                                 // pickup-shipping-confirm-success-recall-cancel-order
                                 $sql_SoLuongDonHangClearTheoThang = "SELECT COUNT(CASE WHEN ID_Status_Giao = 2 THEN 1 ELSE NULL END) AS Pickup, COUNT(CASE WHEN ID_Status_Giao = 3 THEN 1 ELSE NULL END) AS Shipping, COUNT(CASE WHEN ID_Status_Giao = 4 THEN 1 ELSE NULL END) AS Confirm, COUNT(CASE WHEN ID_Status_Giao = 5 THEN 1 ELSE NULL END) AS Success, COUNT(CASE WHEN ID_Status_Giao = 6 THEN 1 ELSE NULL END) AS Cancel, COUNT(CASE WHEN ID_Status_Giao = 7 THEN 1 ELSE NULL END) AS Recall, COUNT(*) AS Total FROM donhang WHERE MONTH(NgayCapNhat) = '$currentMonth' AND YEAR(NgayCapNhat) = '$currentYear'";
                                 $stmt_SoLuongDonHangClearTheoThang = $conn->prepare($sql_SoLuongDonHangClearTheoThang);
                                 $stmt_SoLuongDonHangClearTheoThang->execute();
                                 $row_SoLuongDonHangClearTheoThang = $stmt_SoLuongDonHangClearTheoThang->fetch(PDO::FETCH_ASSOC);
                                 $dataPointsThang = array();
                                 if($row_SoLuongDonHangClearTheoThang['Total'] == 0){
                                    $dataPointsThang = array(
                                       array("label" => "Chờ lấy hàng", "y" => 0),
                                       array("label" => "Đang giao hàng", "y" => 0),
                                       array("label" => "Đã giao", "y" => 0),
                                       array("label" => "Thành công", "y" => 0),
                                       array("label" => "Đã hủy", "y" => 0),
                                       array("label" => "Trả hàng", "y" => 0),
                                    );
                                 }else{
                                    $dataPointsThang = array(
                                       array("label" => "Chờ lấy hàng", "y" => ($row_SoLuongDonHangClearTheoThang['Pickup']/$row_SoLuongDonHangClearTheoThang['Total'])*100),
                                       array("label" => "Đang giao hàng", "y" => ($row_SoLuongDonHangClearTheoThang['Shipping']/$row_SoLuongDonHangClearTheoThang['Total'])*100),
                                       array("label" => "Đã giao", "y" => ($row_SoLuongDonHangClearTheoThang['Confirm']/$row_SoLuongDonHangClearTheoThang['Total'])*100),
                                       array("label" => "Thành công", "y" => ($row_SoLuongDonHangClearTheoThang['Success']/$row_SoLuongDonHangClearTheoThang['Total'])*100),
                                       array("label" => "Đã hủy", "y" => ($row_SoLuongDonHangClearTheoThang['Cancel']/$row_SoLuongDonHangClearTheoThang['Total'])*100),
                                       array("label" => "Trả hàng", "y" => ($row_SoLuongDonHangClearTheoThang['Recall']/$row_SoLuongDonHangClearTheoThang['Total'])*100),
                                    );
                                 }
                                // Chuyển đổi mảng dataPoints thành JSON
                                $jsonDataPieMonth = json_encode($dataPointsThang);
                                 echo '
                                 <div class="iq-details mb-2">
                                    <span class="title text-primary">Tổng sản phẩm bán được '.$currentMonth.'</span>
                                    <div class="percentage float-right text-primary">'.$TongSanPhamBanDuocTrongThang['Total'].'</div>
                                    <div class="iq-progress-bar-linear d-inline-block w-100">
                                       <div class="bar_percent_max iq-progress-bar iq-bg-primary">
                                          <span class="bg-green" data-percent="'.$percent_SanPhamBanDuocThang_Kho.'"></span>
                                       </div>
                                    </div>
                                 </div>  
                                 ';
                              ?>
                              <div class="w-100 mb-2" id="iq-pickup-shipping-confirm-success-recall-cancel-order-month"></div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div id="summary-day" class="col-md-6 tabcontent">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header">
                           <div class="iq-header-title d-flex justify-content-between align-items-center">
                              <h4 class="card-title mb-0">Tóm lược <?php echo $get_date_check ?></h4>
                              <div class="iq-card-header-toolbar d-flex align-items-center">
                                 <div class="dropdown">
                                    <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                    <i class="ri-more-fill"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
                                       <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>In</a>
                                       <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Tải xuống</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <ul class="list-inline p-0 mb-0">
                              <li>
                              <?php
                                 $sql_TongSanPhamBanDuocTrongNgay = "SELECT COALESCE(SUM(chitietdonhang.SoLuong), 0) AS Total FROM donhang JOIN chitietdonhang ON donhang.ID_DonHang = chitietdonhang.ID_DonHang WHERE donhang.ID_Status_Giao = 5 AND donhang.NgayCapNhat = '$get_date_check'";
                                 $stmt_TongSanPhamBanDuocTrongNgay = $conn->prepare($sql_TongSanPhamBanDuocTrongNgay);
                                 $stmt_TongSanPhamBanDuocTrongNgay->execute();
                                 $TongSanPhamBanDuocTrongNgay = $stmt_TongSanPhamBanDuocTrongNgay->fetch(PDO::FETCH_ASSOC); 

                                 $percent_SanPhamBanDuocNgay_Kho = number_format(($TongSanPhamBanDuocTrongNgay['Total']/$SoLuongKho)*100,2);
                                 // pickup-shipping-confirm-success-recall-cancel-order
                                 $sql_SoLuongDonHangClearTheoNgay = "SELECT COUNT(CASE WHEN ID_Status_Giao = 2 THEN 1 ELSE NULL END) AS Pickup, COUNT(CASE WHEN ID_Status_Giao = 3 THEN 1 ELSE NULL END) AS Shipping, COUNT(CASE WHEN ID_Status_Giao = 4 THEN 1 ELSE NULL END) AS Confirm, COUNT(CASE WHEN ID_Status_Giao = 5 THEN 1 ELSE NULL END) AS Success, COUNT(CASE WHEN ID_Status_Giao = 6 THEN 1 ELSE NULL END) AS Cancel, COUNT(CASE WHEN ID_Status_Giao = 7 THEN 1 ELSE NULL END) AS Recall, COUNT(*) AS Total FROM donhang WHERE NgayCapNhat = '$get_date_check'";
                                 $stmt_SoLuongDonHangClearTheoNgay = $conn->prepare($sql_SoLuongDonHangClearTheoNgay);
                                 $stmt_SoLuongDonHangClearTheoNgay->execute();
                                 $row_SoLuongDonHangClearTheoNgay = $stmt_SoLuongDonHangClearTheoNgay->fetch(PDO::FETCH_ASSOC);
                                 $dataPointsNgay = array();
                                 if($row_SoLuongDonHangClearTheoNgay['Total'] == 0){
                                    $dataPointsNgay = array(
                                       array("label" => "Chờ lấy hàng", "y" => 0),
                                       array("label" => "Đang giao hàng", "y" => 0),
                                       array("label" => "Đã giao", "y" => 0),
                                       array("label" => "Thành công", "y" => 0),
                                       array("label" => "Đã hủy", "y" => 0),
                                       array("label" => "Trả hàng", "y" => 0),
                                    );
                                 }else{
                                    $dataPointsNgay = array(
                                       array("label" => "Chờ lấy hàng", "y" => ($row_SoLuongDonHangClearTheoNgay['Pickup']/$row_SoLuongDonHangClearTheoNgay['Total'])*100),
                                       array("label" => "Đang giao hàng", "y" => ($row_SoLuongDonHangClearTheoNgay['Shipping']/$row_SoLuongDonHangClearTheoNgay['Total'])*100),
                                       array("label" => "Đã giao", "y" => ($row_SoLuongDonHangClearTheoNgay['Confirm']/$row_SoLuongDonHangClearTheoNgay['Total'])*100),
                                       array("label" => "Thành công", "y" => ($row_SoLuongDonHangClearTheoNgay['Success']/$row_SoLuongDonHangClearTheoNgay['Total'])*100),
                                       array("label" => "Đã hủy", "y" => ($row_SoLuongDonHangClearTheoNgay['Cancel']/$row_SoLuongDonHangClearTheoNgay['Total'])*100),
                                       array("label" => "Trả hàng", "y" => ($row_SoLuongDonHangClearTheoNgay['Recall']/$row_SoLuongDonHangClearTheoNgay['Total'])*100),
                                    );
                                 }
                                // Chuyển đổi mảng dataPoints thành JSON
                                $jsonDataPieDay = json_encode($dataPointsNgay);
                                 echo '
                                 <div class="iq-details mb-2">
                                    <span class="title text-primary">Tổng sản phẩm bán được '.$get_date_check.'</span>
                                    <div class="percentage float-right text-primary">'.$TongSanPhamBanDuocTrongNgay['Total'].'</div>
                                    <div class="iq-progress-bar-linear d-inline-block w-100">
                                       <div class="bar_percent_max iq-progress-bar iq-bg-primary">
                                          <span class="bg-green" data-percent="'.$percent_SanPhamBanDuocNgay_Kho.'"></span>
                                       </div>
                                    </div>
                                 </div>  
                                 ';
                              ?>
                              <div class="w-100 mb-2" id="iq-pickup-shipping-confirm-success-recall-cancel-order-day"></div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <script>
                     function openSatistical(evt, satisticalName, satisticalProduct) {
                     var i, tabcontent, tablinks;
                     tabcontent = document.getElementsByClassName("tabcontent");
                     for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                     }
                     tablinks = document.getElementsByClassName("tablinks");
                     for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                     }
                     document.getElementById(satisticalName).style.display = "block";
                     document.getElementById(satisticalProduct).style.display = "block";
                     evt.currentTarget.className += " active";
                     }
                     document.getElementById("defaultOpen").click();
                  </script>
                  <div id="product-missing" class="mt-5 col-sm-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Các sản phẩm còn <b class="text-primary fw-bolder">thiếu</b> chờ xác nhận</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <div class="dropdown">
                                 <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                 <i class="ri-more-fill"></i>
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
                                    <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>In</a>
                                    <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Tải xuống</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="iq-card-body container-fluid scrollable scrollable-product-limit">
                           <a class="row-custom">
                              <div class="col-custom">Hình ảnh</div>
                              <div class="col-custom-n">Tên sản phẩm</div>
                              <div class="col-custom-h">Hãng</div>
                              <div class="col-custom-sl">Số lượng thiếu</div>
                           </a>
                           <?php
                              $sql_SanPhamThieu = "SELECT sp.ID_SanPham, sp.TenSP, sp.SoLuong AS SoLuongKho, cta.SoLuong, (cta.SoLuong - sp.SoLuong) AS Need, h.TenHang, ha.link FROM sanpham AS sp INNER JOIN chitietaccept AS cta ON sp.ID_SanPham = cta.ID_SanPham JOIN hang h ON sp.Hang = h.ID_Hang JOIN hinhanhsanpham ha ON cta.ID_SanPham = ha.ID_SanPham WHERE sp.SoLuong < cta.SoLuong GROUP BY cta.ID_SanPham";
                              $stmt_SanPhamThieu = $conn->prepare($sql_SanPhamThieu);
                              $stmt_SanPhamThieu->execute();
                              if($stmt_SanPhamThieu->rowCount() > 0){
                                 while($row_SanPhamThieu = $stmt_SanPhamThieu->fetch(PDO::FETCH_ASSOC)){
                                    echo '
                           <a href="admin-edit-product.php?ID_SanPham='.$row_SanPhamThieu['ID_SanPham'].'" class="row-custom elm-a-custom">
                              <div class="col-custom p-1"><img src="'.$row_SanPhamThieu['link'].'" class="rounded w-75"></img></div>
                              <div class="col-custom-n">'.$row_SanPhamThieu['TenSP'].'</div>
                              <div class="col-custom-h">'.$row_SanPhamThieu['TenHang'].'</div>
                              <div class="col-custom-sl text-red">'.$row_SanPhamThieu['SoLuongKho'].'/'.$row_SanPhamThieu['SoLuong'].'</div>
                           </a>
                                    ';
                                 }
                              }
                           ?>
                        </div>
                     </div>
                  </div>
                  <div id="top-account" class="mt-5 col-sm-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Top 3 tài khoản mua nhiều nhất tháng</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <div class="dropdown">
                                 <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                 <i class="ri-more-fill"></i>
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
                                    <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>In</a>
                                    <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Tải xuống</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- scrollable scrollable-navbar
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hãng</th>
                        <th scope="col">Số lượng thiếu</th> -->
                        <div class="iq-card-body container-fluid scrollable scrollable-top-account">
                           <a class="row-custom">
                              <div class="col-custom-tk">Tài khoản</div>
                              <div class="col-custom-tk-name">Họ và tên</div>
                              <div class="col-custom-tk">Số điện thoại</div>
                              <div class="col-custom-tk-name">Gmail</div>
                              <div class="col-custom-tk-sl">Số lượng đơn</div>
                           </a>
                           <?php
                              $sql_TopAccountMuaNhieu = "SELECT ac.TaiKhoan, COUNT(dh.ID_HoaDon) AS SoLuongHoaDon, us.HoTen, us.SDT, us.Email FROM hoadon hd JOIN userinfo us ON hd.ID_Account = us.ID_Account JOIN account ac ON hd.ID_Account = ac.ID_Account JOIN donhang dh ON hd.ID_HoaDon = dh.ID_HoaDon WHERE dh.ID_Status_Giao = 5 AND MONTH(dh.NgayCapNhat) = '$currentMonth' AND YEAR(dh.NgayCapNhat) = '$currentYear' GROUP BY hd.ID_Account ORDER BY SoLuongHoaDon DESC LIMIT 3";
                              $stmt_TopAccountMuaNhieu = $conn->prepare($sql_TopAccountMuaNhieu);
                              $stmt_TopAccountMuaNhieu->execute();
                              if($stmt_TopAccountMuaNhieu->rowCount() > 0){
                                 while($row_TopAccountMuaNhieu = $stmt_TopAccountMuaNhieu->fetch(PDO::FETCH_ASSOC)){
                                    echo '
                           <div class="row-custom elm-a-custom">
                              <div class="col-custom-tk">'.$row_TopAccountMuaNhieu['TaiKhoan'].'</div>
                              <div class="col-custom-tk-name">'.$row_TopAccountMuaNhieu['HoTen'].'</div>
                              <div class="col-custom-tk">'.$row_TopAccountMuaNhieu['SDT'].'</div>
                              <div class="col-custom-tk-name">'.$row_TopAccountMuaNhieu['Email'].'</div>
                              <div class="col-custom-tk-sl text-primary">'.$row_TopAccountMuaNhieu['SoLuongHoaDon'].'</div>
                           </div>
                                    ';
                                 }
                              }
                           ?>
                        </div>
                     </div>
                  </div>
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
               <h3 class="iq-font-black">Laptop 23H Awesome Color</h3>
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
       
      <?php
         if(isset($_GET['NgayCapNhat']) && $_GET['NgayCapNhat'] != ''){
            $date_js = $_GET['NgayCapNhat'];
            echo '
            <script>
            function getLast7Days() {
               var result = [];
               for (var i=6; i>=0; i--) {
                  var d = new Date("'.$date_js.'");
                  d.setDate(d.getDate() - i);
                  result.push(d.toLocaleDateString());
               }
               return result;
            }
            </script>';
         }else{
            echo '
            <script>
            function getLast7Days() {
               var result = [];
               for (var i=6; i>=0; i--) {
                  var d = new Date();
                  d.setDate(d.getDate() - i);
                  result.push(d.toLocaleDateString());
               }
               return result;
            }
            </script>
            ';
         }
      ?>
      <script>
      function getMonthsThisYear() {
         var result = [];
         var now = new Date();
         for (var i=0; i<=11; i++) {
            result.push(i + 1);
         }
         return result;
      }
      function getLast5Years() {
         var result = [];
         var now = new Date();
         for (var i=4; i>=0; i--) {
            var d = new Date();
            d.setFullYear(now.getFullYear() - i);
            result.push(d.getFullYear());
         }
         return result;
      } 
      var DoanhThuNgay = JSON.parse('<?php echo $jsonDataNgay; ?>');
      var DoanhThuThang = JSON.parse('<?php echo $jsonDataThang; ?>');
      var DoanhThuNam = JSON.parse('<?php echo $jsonDataNam; ?>');
      if(jQuery('#iq-sale-chart').length){
         var options = {
            series: [{
                  name: 'Net Profit',
                  data: DoanhThuNgay
            }],
            chart: {
                  type: 'bar'
            },
            colors:['#0dd6b8'],
            plotOptions: {
                  bar: {
                     horizontal: false,
                     columnWidth: '45%',
                     endingShape: 'rounded'
                  },
            },
            dataLabels: {
                  enabled: false
            },
            stroke: {
                  show: true,
                  width: 2,
                  colors: ['transparent']
            },
            xaxis: {
                  categories: getLast7Days(),
            },
            yaxis: {
                  title: {
                     text: ''
                  },
                  labels: {
                     offsetX: -20,
                     offsetY: 0,
                     formatter: function (val) {
                        return val.toLocaleString('it-IT');
                     }
                  },
            },
            grid: {
                  padding: {
                     left: -5,
                     right: 0
                  }
            },
            fill: {
                  opacity: 1
            },
            tooltip: {
                  y: {
                     formatter: function (val) {
                        return val.toLocaleString('it-IT');
                     }
                  }
            }
         };
         var chart = new ApexCharts(document.querySelector("#iq-sale-chart"), options);
         chart.render();
      }
      if(jQuery('#iq-sale-chart-month').length){
         var options = {
            series: [{
                  name: 'Net Profit',
                  data: DoanhThuThang
            }],
            chart: {
                  type: 'bar'
            },
            colors:['#0dd6b8'],
            plotOptions: {
                  bar: {
                     horizontal: false,
                     columnWidth: '45%',
                     endingShape: 'rounded'
                  },
            },
            dataLabels: {
                  enabled: false
            },
            stroke: {
                  show: true,
                  width: 2,
                  colors: ['transparent']
            },
            xaxis: {
                  categories: getMonthsThisYear(),
            },
            yaxis: {
                  title: {
                     text: ''
                  },
                  labels: {
                     offsetX: -20,
                     offsetY: 0,
                     formatter: function (val) {
                        return val.toLocaleString('it-IT');
                     }
                  },
            },
            grid: {
                  padding: {
                     left: -5,
                     right: 0
                  }
            },
            fill: {
                  opacity: 1
            },
            tooltip: {
                  y: {
                     formatter: function (val) {
                        return val.toLocaleString('it-IT');
                     }
                  }
            }
         };
         var chart = new ApexCharts(document.querySelector("#iq-sale-chart-month"), options);
         chart.render();
      }
      if(jQuery('#iq-sale-chart-year').length){
         var options = {
            series: [{
                  name: 'Net Profit',
                  data: DoanhThuNam
            }],
            chart: {
                  type: 'bar'
            },
            colors:['#0dd6b8'],
            plotOptions: {
                  bar: {
                     horizontal: false,
                     columnWidth: '45%',
                     endingShape: 'rounded'
                  },
            },
            dataLabels: {
                  enabled: false
            },
            stroke: {
                  show: true,
                  width: 2,
                  colors: ['transparent']
            },
            xaxis: {
                  categories: getLast5Years(),
            },
            yaxis: {
                  title: {
                     text: ''
                  },
                  labels: {
                     offsetX: -20,
                     offsetY: 0,
                     formatter: function (val) {
                        return val.toLocaleString('it-IT');
                     }
                  },
            },
            grid: {
                  padding: {
                     left: -5,
                     right: 0
                  }
            },
            fill: {
                  opacity: 1
            },
            tooltip: {
                  y: {
                     formatter: function (val) {
                        return val.toLocaleString('it-IT');
                     }
                  }
            }
         };
         var chart = new ApexCharts(document.querySelector("#iq-sale-chart-year"), options);
         chart.render();
      }
      window.onload = function() {
         var DataPieYear = JSON.parse('<?php echo $jsonDataPieYear; ?>');
         var chartYear = new CanvasJS.Chart("iq-pickup-shipping-confirm-success-recall-cancel-order-year", {
            animationEnabled: true,
            data: [{
               type: "pie",
               startAngle: 240,
               yValueFormatString: "##0.00\"%\"",
               indexLabel: "{label} {y}",
               dataPoints: DataPieYear // Sử dụng dữ liệu từ máy chủ
            }]
         });
         chartYear.render();
         
         var DataPieMonth = JSON.parse('<?php echo $jsonDataPieMonth; ?>');
         var chartMonth = new CanvasJS.Chart("iq-pickup-shipping-confirm-success-recall-cancel-order-month", {
            animationEnabled: true,
            data: [{
               type: "pie",
               startAngle: 240,
               yValueFormatString: "##0.00\"%\"",
               indexLabel: "{label} {y}",
               dataPoints: DataPieMonth // Sử dụng dữ liệu từ máy chủ
            }]
         });
         chartMonth.render();

         var DataPieDay = JSON.parse('<?php echo $jsonDataPieDay; ?>');
         var chartDay = new CanvasJS.Chart("iq-pickup-shipping-confirm-success-recall-cancel-order-day", {
            animationEnabled: true,
            data: [{
               type: "pie",
               startAngle: 240,
               yValueFormatString: "##0.00\"%\"",
               indexLabel: "{label} {y}",
               dataPoints: DataPieDay // Sử dụng dữ liệu từ máy chủ
            }]
         });
         chartDay.render();
      }
      $(document).ready(function(){
         // Handle click event for 'In' link
         $("#product-missing .dropdown-item:contains('In')").click(function(e){
            e.preventDefault();
            printDiv('product-missing');
         });
         // Handle click event for 'Tải xuống' link
         $("#product-missing .dropdown-item:contains('Tải xuống')").click(function(e){
            e.preventDefault();
            downloadAsPNG('product-missing');
         });
         $("#top-account .dropdown-item:contains('In')").click(function(e){
            e.preventDefault();
            printDiv('top-account');
         });
         // Handle click event for 'Tải xuống' link
         $("#top-account .dropdown-item:contains('Tải xuống')").click(function(e){
            e.preventDefault();
            downloadAsPNG('top-account');
         });
         $("#summary-year .dropdown-item:contains('In')").click(function(e){
            e.preventDefault();
            printDiv('summary-year');
         });
         // Handle click event for 'Tải xuống' link
         $("#summary-year .dropdown-item:contains('Tải xuống')").click(function(e){
            e.preventDefault();
            downloadAsPNG('summary-year');
         });
         $("#summary-month .dropdown-item:contains('In')").click(function(e){
            e.preventDefault();
            printDiv('summary-month');
         });
         // Handle click event for 'Tải xuống' link
         $("#summary-month .dropdown-item:contains('Tải xuống')").click(function(e){
            e.preventDefault();
            downloadAsPNG('summary-month');
         });
         $("#summary-day .dropdown-item:contains('In')").click(function(e){
            e.preventDefault();
            printDiv('summary-day');
         });
         // Handle click event for 'Tải xuống' link
         $("#summary-day .dropdown-item:contains('Tải xuống')").click(function(e){
            e.preventDefault();
            downloadAsPNG('summary-day');
         });
      });

      function printDiv(id) {
         var div = document.getElementById(id);

         html2canvas(div).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');
            var windowContent = '<!DOCTYPE html>';
            windowContent += '<html>'
            windowContent += '<head><title>In</title></head>';
            windowContent += '<body>'
            windowContent += '<img src="' + imgData + '">';
            windowContent += '</body>';
            windowContent += '</html>';
            var printWin = window.open('', '_blank');
            printWin.document.open();
            printWin.document.write(windowContent);
            printWin.document.close();
            printWin.print();
         });
      }
      function downloadAsPNG(id) {
         var div = document.getElementById(id);

         html2canvas(div).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');
            var link = document.createElement('a');
            link.href = imgData;
            link.download = 'output.png';
            link.click();
         });
      }
      </script>
   </body>
</html>