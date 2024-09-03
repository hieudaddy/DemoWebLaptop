<?php
   include 'connection.php';
   session_start();
   if (!isset($_SESSION['ID_Account']) || $_SESSION['ID_Account'] == NULL || !isset($_SESSION['user']) || $_SESSION['user'] == null || $_SESSION['user'] == 'admin' || $_SESSION['ID_Account'] == 1) {
      header('Location: sign-in.php');
      exit();
   }
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Các đơn hàng</title>
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
      <link  href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
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
                     </li>
                     <?php
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
                     ?>
                     <script>
                        $('.js-elements-tag-a').on('click', function(e) {
                           e.preventDefault(); // Prevent default link behavior
                           $(this).closest('li').find('.collapse').collapse('toggle'); // Toggle collapse
                           window.location.href = $(this).attr('href'); // Navigate to the link
                        });
                     </script>
                     <li class="active-menu"><a href="logout.php"><i class="ri-book-line"></i><span>Logout</span></a></li>
                  </ul>
               </nav>
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
                                          $sql_notification = "SELECT * FROM notification WHERE ID_Account = :ID_Account ORDER BY Status ASC, ID_Noti DESC";
                                          $stmt_notification = $conn->prepare($sql_notification);
                                          $stmt_notification->bindParam(':ID_Account', $_SESSION['ID_Account']);
                                          $stmt_notification->execute();
                                          while($row_notification = $stmt_notification->fetch(PDO::FETCH_ASSOC)){
                                             if($row_notification['Status'] == 0){
                                                echo '
                                                <a href="update_notification.php?ID_Noti='.$row_notification['ID_Noti'].'&order=true" class="iq-sub-card notification-items notification-unseen">
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
                                                <a href="update_notification.php?ID_Noti='.$row_notification['ID_Noti'].'&order=true" class="iq-sub-card notification-items">
                                                   <div class="media align-items-center">
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0 ">'.$row_notification['Mota'].'</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                                ';
                                             }
                                          }
                                    ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                        
                        <li class="nav-item nav-icon dropdown">
                           <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                           <i class="ri-shopping-cart-2-line"></i>
                           <span class="badge badge-danger count-cart rounded-circle">
                              <?php
                                 $sql_giohang = "SELECT IFNULL(SUM(SoLuong), 0) AS SoLuong FROM giohang WHERE ID_Account = :ID_Account";
                                 $stmt_giohang = $conn->prepare($sql_giohang);
                                 $stmt_giohang->bindParam(':ID_Account', $_SESSION['ID_Account']);
                                 $stmt_giohang->execute();
                                 $row_giohang = $stmt_giohang->fetch(PDO::FETCH_ASSOC);
                                 echo $row_giohang['SoLuong'];
                              ?>
                           </span>
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 toggle-cart-info">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">Giỏ Hàng
                                          <small class="badge  badge-light float-right pt-1">
                                             <?php
                                                $SoLuongTrongGioHang = $row_giohang['SoLuong'];
                                                echo $row_giohang['SoLuong'];
                                             ?>
                                          </small>
                                       </h5>
                                    </div>
                                    <div class="scrollable scrollable-navbar">
                                    <?php
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
                                    ?>
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
                              <?php 
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
                              ?>
                              <div class="caption">
                                 <h6 class="mb-1 line-height"><?php echo $_SESSION['user'];?></h6>
                                 <p class="mb-0 text-primary">Tài Khoản</p>
                              </div>
                           </a>
                           <div class="iq-sub-dropdown iq-user-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white line-height">Xin Chào <?php echo $_SESSION['user'];?></h5>
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
         <!-- TOP Nav Bar END -->
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid checkout-content">
               <div class="row">
                  <div id="cart" class="card-block show p-0 col-12">
                     <div class="row align-item-center">
                        <div class="col-lg-12">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between iq-border-bottom mb-0">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Đơn hàng</h4>
                                 </div>
                              </div>
                              <?php
                                 $sql_accept = "SELECT * FROM accept JOIN thanhtoan ON accept.ID_ThanhToan = thanhtoan.ID_ThanhToan WHERE ID_Account = :ID_Account";
                                 $stmt_accept = $conn->prepare($sql_accept);
                                 $stmt_accept->bindParam(':ID_Account', $_SESSION['ID_Account']);
                                 $stmt_accept->execute();
                                 if($stmt_accept->rowCount() > 0){
                                    while($row_accept = $stmt_accept->fetch(PDO::FETCH_ASSOC)){
                                       echo '
                                       <div class="order-container iq-cart-body">
                                          <div class="STT_status">
                                             <h5>#'.$row_accept['ID_DonHang'].'</h5>
                                             <h5 class="text-purple">Chờ xác nhận</h5>
                                          </div>
                                          <hr>
                                          <ul class="list-margin list-inline p-0">
                                       ';
                                       $sql_temp = "SELECT ctac.ID_DonHang, ctac.ID_SanPham, ctac.SoLuong, ctac.TongTien, sp.TenSP, sp.Status, sp.SoLuong AS SoLuongKho, ha.link FROM chitietaccept ctac JOIN accept ac ON ctac.ID_DonHang = ac.ID_DonHang JOIN sanpham sp on ctac.ID_SanPham = sp.ID_SanPham JOIN hinhanhsanpham ha ON ctac.ID_SanPham = ha.ID_SanPham WHERE ctac.ID_DonHang = :ID_DonHang GROUP BY ctac.ID_SanPham";
                                       $stmt_temp = $conn->prepare($sql_temp);
                                       $stmt_temp->bindParam(':ID_DonHang', $row_accept['ID_DonHang']);
                                       $stmt_temp->execute();
                                       $TongTien = 0;
                                       if($stmt_temp->rowCount() > 0){
                                          while($row_temp = $stmt_temp->fetch(PDO::FETCH_ASSOC)){
                                             $statusClass = ($row_temp['SoLuong'] <= $row_temp['SoLuongKho']) ? 'text-green' : 'text-red';
                                             echo '
                                             <li class="mb-1 order-items">
                                                <a class="order-img-link" href="product_detail.php?ID='.$row_temp['ID_SanPham'].'"><img class="img-fluid rounded" src="'.$row_temp['link'].'" alt=""></a>
                                                <div class="ml-3 info-Donhang">
                                                   <h5>'.$row_temp['TenSP'].'</h5>
                                                   <i class="'.$statusClass.' font-weight-bold">Kho: '.$row_temp['SoLuongKho'].'</i>
                                                   <i class="font-weight-bold">Đặt x '.$row_temp['SoLuong'].'</i>
                                                   <h5>'.number_format($row_temp['TongTien'], 0, ',', '.').' đ</h5>
                                                </div>
                                             </li>
                                             <hr class="line">
                                             ';
                                             $TongTien += $row_temp['TongTien'];
                                          }
                                       }
                                       echo '
                                          </ul>
                                          <div class="STT_status status_low">
                                             <h5></h5>
                                             <a href="admin-reject-order.php?ID_DonHang='.$row_accept['ID_DonHang'].'&ID_Account='.$_SESSION['ID_Account'].'&reject=true&user=true" class="text-white btn btn-danger">Hủy đơn</a>
                                          </div>
                                          <div class="STT_status status_low">
                                             <h5>Phương thức thanh toán</h5>
                                             <h5 class="text-blue font-weight-bold">'.$row_accept['HinhThuc'].'</h5>
                                          </div>
                                          <div class="STT_status status_low">
                                             <h5>Tổng</h5>
                                             <h5 class="text-blue font-weight-bold">'.number_format($TongTien, 0, ',', '.').' đ</h5>
                                          </div>
                                       </div>
                                       <div class="order-line"></div>
                                       ';
                                    }
                                 }
                              ?>
                              <?php
                                 $sql_donhang = "SELECT dh.ID_DonHang, dh.NgayCapNhat, sg.ID_Status_Giao, sg.TinhTrang FROM donhang dh JOIN hoadon hd ON dh.ID_HoaDon = hd.ID_HoaDon JOIN statusgiaohang sg on dh.ID_Status_Giao = sg.ID_Status_Giao WHERE hd.ID_Account = :ID_Account ORDER BY FIELD(dh.ID_Status_Giao, 4, 2, 3, 5, 6, 7), ID_DonHang DESC";
                                 $stmt_donhang = $conn->prepare($sql_donhang);
                                 $stmt_donhang->bindParam(':ID_Account', $_SESSION['ID_Account']);
                                 $stmt_donhang->execute();
                                 if($stmt_donhang->rowCount() > 0){
                                    while($row_donhang = $stmt_donhang->fetch(PDO::FETCH_ASSOC)){
                                       echo '
                                       <div class="order-container iq-cart-body">
                                          <div class="STT_status">
                                             <h5>#'.$row_donhang['ID_DonHang'].'</h5>
                                       ';
                                       switch ($row_donhang['ID_Status_Giao']){
                                          case 1:
                                             echo '<h5 class="text-purple"><i>'.$row_donhang['NgayCapNhat'].'</i> - '.$row_donhang['TinhTrang'].'</h5>';
                                             break;
                                          case 2:
                                             echo '<h5 class="text-blue"><i>'.$row_donhang['NgayCapNhat'].'</i> - '.$row_donhang['TinhTrang'].'</h5>';
                                             break;
                                          case 3:
                                             echo '<h5 class="text-blue"><i>'.$row_donhang['NgayCapNhat'].'</i> - '.$row_donhang['TinhTrang'].'</h5>';
                                             break;
                                          case 4:
                                             echo '<h5 class="text-blue"><i>'.$row_donhang['NgayCapNhat'].'</i> - '.$row_donhang['TinhTrang'].'</h5>';
                                             break;
                                          case 5:
                                             echo '<h5 class="text-green"><i>'.$row_donhang['NgayCapNhat'].'</i> - '.$row_donhang['TinhTrang'].'</h5>';
                                             break;
                                          case 6:
                                             echo '<h5 class="text-red"><i>'.$row_donhang['NgayCapNhat'].'</i> - '.$row_donhang['TinhTrang'].'</h5>';
                                             break;
                                          case 7:
                                             echo '<h5 class="text-red"><i>'.$row_donhang['NgayCapNhat'].'</i> - '.$row_donhang['TinhTrang'].'</h5>';
                                             break;
                                       }
                                             
                                       echo '
                                          </div>
                                          <hr>
                                          <ul class="list-inline p-0 m-0">
                                       ';
                                       $sql_temp = "SELECT ctdh.ID_DonHang, ctdh.ID_SanPham, ctdh.SoLuong, ctdh.TongTien, sp.TenSP, ha.link FROM chitietdonhang ctdh join sanpham sp on ctdh.ID_SanPham = sp.ID_SanPham JOIN hinhanhsanpham ha on ctdh.ID_SanPham = ha.ID_SanPham WHERE ctdh.ID_DonHang = :ID_DonHang GROUP BY ctdh.ID_SanPham";
                                       $stmt_temp = $conn->prepare($sql_temp);
                                       $stmt_temp->bindParam(':ID_DonHang', $row_donhang['ID_DonHang']);
                                       $stmt_temp->execute();
                                       $TongTien = 0;
                                       if($stmt_temp->rowCount() > 0){
                                          while($row_temp = $stmt_temp->fetch(PDO::FETCH_ASSOC)){
                                             echo '
                                             <li class="mb-1 order-items">
                                                <a class="order-img-link" href="product_detail.php?ID='.$row_temp['ID_SanPham'].'"><img class="img-fluid rounded" src="'.$row_temp['link'].'" alt=""></a>
                                                <div class="ml-3 info-Donhang">
                                                   <h5>'.$row_temp['TenSP'].'</h5>
                                                   <i class="font-weight-bold">x '.$row_temp['SoLuong'].'</i>
                                                   <h5>'.number_format($row_temp['TongTien'], 0, ',', '.').' đ</h5>
                                                </div>
                                             </li>
                                             <hr class="line">
                                             ';
                                             $TongTien += $row_temp['TongTien'];
                                          }
                                       }
                                       echo '
                                          </ul>';
                                       if($row_donhang['ID_Status_Giao'] == 2){
                                          echo '
                                          <div class="STT_status status_low">
                                             <h5></h5>
                                             <a href="change-status-giao.php?ID_DonHang='.$row_donhang['ID_DonHang'].'&ID_Status_Giao=6&ID_Account='.$_SESSION['ID_Account'].'&user=true" class="text-white btn btn-danger">Hủy đơn</a>
                                          </div>
                                          ';
                                       }
                                       if($row_donhang['ID_Status_Giao'] == 4){
                                          echo '
                                          <div class="STT_status status_low">
                                             <h5></h5>
                                             <div>
                                                <a href="change-status-giao.php?ID_DonHang='.$row_donhang['ID_DonHang'].'&ID_Status_Giao=7&ID_Account='.$_SESSION['ID_Account'].'&user=true" class="text-white btn btn-danger">Trả hàng</a>
                                                <a href="change-status-giao.php?ID_DonHang='.$row_donhang['ID_DonHang'].'&ID_Status_Giao=5&ID_Account='.$_SESSION['ID_Account'].'&user=true" class="text-white btn btn-primary">Xác nhận</a>
                                             </div>
                                          </div>
                                          ';
                                       }
                                       echo'
                                          <div class="STT_status status_low">
                                             <h5>Tổng</h5>
                                             <h5 class="text-blue font-weight-bold">'.number_format($TongTien, 0, ',', '.').' đ</h5>
                                          </div>
                                       </div>
                                       <div class="order-line"></div>
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
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   </body>
</html>