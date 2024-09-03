<?php
   include 'connection.php';
   session_start();
   if (!isset($_SESSION['ID_Account']) || $_SESSION['ID_Account'] == NULL || !isset($_SESSION['user']) || $_SESSION['user'] == null || $_SESSION['user'] == 'admin' || $_SESSION['ID_Account'] == 1) {
      header('Location: sign-in.php');
      exit();
   }
   $ID_LoaiSanPham = '';
   if(isset($_GET['ID_LoaiSanPham'])){
      $ID_LoaiSanPham = $_GET['ID_LoaiSanPham'];
   }
   $TenSP = '';
   if(isset($_GET['TenSP'])){
      $TenSP = $_GET['TenSP'];
   }
   $ID_Hang = '';
   if(isset($_GET['ID_Hang'])){
      $ID_Hang = $_GET['ID_Hang'];
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
      <title>Shop 23h - Shop bán hàng uy tín</title>
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
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
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
                                                <a href="update_notification.php?ID_Noti='.$row_notification['ID_Noti'].'" class="iq-sub-card notification-items notification-unseen">
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
                                                <a href="update_notification.php?ID_Noti='.$row_notification['ID_Noti'].'" class="iq-sub-card notification-items">
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
            <div class="container-fluid">
               <div class="row">
                  <?php
                     $sql_sanpham = "SELECT sp.ID_SanPham, sp.TenSP, sp.DaBan, ha.link FROM sanpham sp JOIN hinhanhsanpham ha ON sp.ID_SanPham = ha.ID_SanPham WHERE sp.Status <> 0 GROUP BY sp.ID_SanPham ORDER BY sp.DaBan DESC LIMIT 8";
                     $stmt_sanpham = $conn->prepare($sql_sanpham);
                     $stmt_sanpham->execute();
                     if($stmt_sanpham->rowCount() == 8){
                        echo '
                        <div class="col-lg-12">
                           <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height rounded">
                              <div class="newrealease-contens">
                                 <ul id="newrealease-slider" class="list-inline p-0 m-0 d-flex align-items-center">
                        ';
                        while ($result = $stmt_sanpham->fetch(PDO::FETCH_ASSOC)) {
                           echo '
                                    <li class="item">
                                       <a title="'.$result['TenSP'].'" href="javascript:void(0);">
                                          <img src="'.$result['link'].'" class="img-fluid w-100 rounded" alt="">
                                       </a>
                                       <div class="view-book">
                                          <a href="product_detail.php?ID='.$result['ID_SanPham'].'" class="btn btn-sm btn-white">Mua Ngay</a>
                                       </div>
                                    </li>
                           ';
                        }
                        echo '
                                 </ul>
                              </div>
                           </div>
                        </div>
                        ';
                     }
                  ?>
                  <div class="col-lg-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                           <div class="iq-header-title">
                              <h4 class="card-title mb-0">Các sản phẩm khuyến mãi</h4>
                           </div>
                        </div> 
                        <div class="iq-card-body">  
                           <div class="row">
                              <?php
                                 $sql_sanpham = '';
                                 if($ID_LoaiSanPham == '' && $TenSP == '' && $ID_Hang == ''){
                                    $sql_sanpham = "SELECT sp.ID_SanPham, sp.TenSP, sp.Status, sp.SoLuong, sp.Gia, ha.link, h.TenHang, COALESCE(km.MucGiam, 0) AS MucGiam FROM sanpham sp JOIN hinhanhsanpham ha ON sp.ID_SanPham = ha.ID_SanPham JOIN hang h ON sp.Hang = h.ID_Hang LEFT JOIN khuyenmai km ON sp.ID_KhuyenMai = km.ID_KhuyenMai WHERE km.MucGiam != 0 GROUP BY sp.ID_SanPham";
                                 }else if($ID_LoaiSanPham != ''){
                                    $sql_sanpham = "SELECT sp.ID_SanPham, sp.TenSP, sp.Status, sp.SoLuong, sp.Gia, ha.link, h.TenHang, COALESCE(km.MucGiam, 0) AS MucGiam, sp.ID_LoaiSanPham FROM sanpham sp JOIN hinhanhsanpham ha ON sp.ID_SanPham = ha.ID_SanPham JOIN hang h ON sp.Hang = h.ID_Hang LEFT JOIN khuyenmai km ON sp.ID_KhuyenMai = km.ID_KhuyenMai GROUP BY sp.ID_SanPham HAVING sp.ID_LoaiSanPham = '$ID_LoaiSanPham'";
                                 }else if($ID_Hang != ''){
                                    $sql_sanpham = "SELECT sp.ID_SanPham, sp.TenSP, sp.Status, sp.SoLuong, sp.Gia, ha.link, sp.Hang, h.TenHang, COALESCE(km.MucGiam, 0) AS MucGiam, sp.ID_LoaiSanPham FROM sanpham sp JOIN hinhanhsanpham ha ON sp.ID_SanPham = ha.ID_SanPham JOIN hang h ON sp.Hang = h.ID_Hang LEFT JOIN khuyenmai km ON sp.ID_KhuyenMai = km.ID_KhuyenMai GROUP BY sp.ID_SanPham HAVING sp.Hang = '$ID_Hang'";
                                 }else{
                                    $sql_sanpham = "SELECT sp.ID_SanPham, sp.TenSP, sp.Status, sp.SoLuong, sp.Gia, ha.link, h.TenHang, COALESCE(km.MucGiam, 0) AS MucGiam, sp.ID_LoaiSanPham FROM sanpham sp JOIN hinhanhsanpham ha ON sp.ID_SanPham = ha.ID_SanPham JOIN hang h ON sp.Hang = h.ID_Hang LEFT JOIN khuyenmai km ON sp.ID_KhuyenMai = km.ID_KhuyenMai GROUP BY sp.ID_SanPham HAVING sp.TenSP LIKE '%$TenSP%'";
                                 }
                                 $stmt_sanpham = $conn->prepare($sql_sanpham);
                                 $query_sanpham = $stmt_sanpham->execute();
                                 while ($result = $stmt_sanpham->fetch(PDO::FETCH_ASSOC)) {
                                    echo'   
                                    <div class="col-sm-6 col-md-4 col-lg-3 sold-out-parent">
                                       <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                          <div class="iq-card-body p-0">
                                             <div class="d-flex align-items-center">
                                                <div class="col-6 p-0 position-relative image-overlap-shadow">
                                                   <a href="product_detail.php?ID='.$result['ID_SanPham'].'">
                                                      <img class="img-fluid rounded w-100" src="'.$result['link'].'" alt="">
                                                   </a>
                                                   <div class="view-book">
                                                      <a href="product_detail.php?ID='.$result['ID_SanPham'].'" class="btn btn-sm btn-white">Mua ngay</a>
                                                   </div>
                                                </div>
                                                <div class="col-6">
                                                   <div class="mb-2">
                                                      <h6 class="mb-1">'.$result['TenSP'].'</h6>
                                                      <p class="font-size-13 line-height mb-1">';
                                                         if($result['MucGiam'] != 0){
                                                            echo $result['TenHang'] . ' <i class="discount-number">-' . $result['MucGiam'] . '%</i>';
                                                         }else{
                                                            echo $result['TenHang'];
                                                         }
                                    echo '
                                                      </p>
                                                      <p class="font-size-13 line-height mb-1">Kho: '.$result['SoLuong'].'</p>
                                                   </div>
                                                   <div style="flex-direction: column; align-items: flex-start;" class="price d-flex">';
                                    if($result['MucGiam'] != 0){
                                       echo '         <h6><b class="discount-label-parent">'.number_format($result['Gia'], 0, ',', '.').'<div class="discount-label"></div></b></h6>';
                                    }
                                    echo'
                                                      <h6><b>'.number_format($result['Gia']*(100 - $result['MucGiam'])/100, 0, ',', '.').'</b></h6>
                                                   </div>  
                                                   <div class="iq-product-action">
                                                      <input style="max-width: 70px !important;" type="number" name="number_add_to_cart_'.$result['ID_SanPham'].'" id="number_add_to_cart_'.$result['ID_SanPham'].'" value="1" min="1">
                                                      <a href="#" onclick="addToCart('.$result['ID_SanPham'].', '.$result['SoLuong'].')"><i class="ri-shopping-cart-2-fill text-primary cart-hover"></i></a>
                                                   </div>                                 
                                                </div>
                                             </div>
                                          </div>
                                       </div>';
                                    if($result['Status'] == 0){
                                       echo '
                                       <div style="background: url(./asset/image/out_of_stock.png) center/contain no-repeat;" class="sold-out"></div>';
                                    }
                                    echo '</div>';
                                 }
                              ?>
                              <script>
                              function addToCart(productId, SoLuongKho) {
                                 // Lấy giá trị từ input
                                 const inputId = 'number_add_to_cart_' + productId;
                                 const SoLuong = document.getElementById(inputId).value;
                                 
                                 // Kiểm tra giá trị âm (nếu cần)
                                 if (SoLuong < 1) {
                                    alert("Số lượng phải lớn hơn hoặc bằng 1");
                                    return;
                                 }
            
                                 // Chuyển hướng đến URL với giá trị số lượng
                                 window.location.href = `add_to_cart.php?ID_SanPham=${productId}&SoLuong=${SoLuong}&SoLuongKho=${SoLuongKho}`;
                              }
                              </script>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php
                     $sql_sp_banchay = "SELECT sp.ID_SanPham, sp.TenSP, sp.Gia, sp.Hang, sp.Status, sp.SoLuong, sp.ThongTin, sp.DaBan, sp.BaoHanh, sp.ID_KhuyenMai, ha.link, h.TenHang, ctdh.SoLuong AS SoLuong FROM sanpham sp JOIN hinhanhsanpham ha ON sp.ID_SanPham = ha.ID_SanPham JOIN hang h ON sp.Hang = h.ID_Hang JOIN chitietdonhang ctdh ON sp.ID_SanPham = ctdh.ID_SanPham JOIN donhang dh ON ctdh.ID_DonHang = dh.ID_DonHang WHERE dh.ID_Status_Giao = 5 AND YEAR(dh.NgayTao) = YEAR(CURRENT_DATE()) AND MONTH(dh.NgayTao) = MONTH(CURRENT_DATE()) ORDER BY ctdh.SoLuong DESC LIMIT 1";
                     $stmt_sp_banchay = $conn->prepare($sql_sp_banchay);
                     $stmt_sp_banchay->execute();
                     if($stmt_sp_banchay->rowCount() > 0){
                        $result_banchay = $stmt_sp_banchay->fetch(PDO::FETCH_ASSOC);
                        $month = date('m');
                        $year = date('Y');
                        echo '
                           <div class="col-lg-6">
                              <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                 <div class="iq-card-header d-flex justify-content-between mb-0">
                                    <div class="iq-header-title">
                                       <h4 class="card-title">Bán chạy nhất tháng '.$month.'-'.$year.'</h4>
                                    </div>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                    </div>
                                 </div>
                                 <div class="iq-card-body">
                                    <div class="row align-items-center">
                                       <div class="col-sm-5 pr-0">
                                          <a href="javascript:void();"><img class="img-fluid rounded w-100" src="'.$result_banchay['link'].'" alt=""></a>
                                       </div>
                                       <div class="col-sm-7 mt-3 mt-sm-0">
                                          <h4 class="mb-2">'.$result_banchay['TenSP'].'</h4>
                                          <p class="mb-2">'.$result_banchay['TenHang'].'</p>
                                          <p class="mb-2">Đã bán '.$result_banchay['SoLuong'].'</p>
                                          ';
                                          
                        $array_infor = explode("/", $result_banchay['ThongTin']);
                        echo '
                        <span class="text-dark mb-3 d-block">'.$array_infor[0].'</span>';
                        if($result_banchay['Status'] == 0){
                           echo '
                                       <div id="hoverDiv" class="btn btn-primary learn-more best-seller-out-stock">Mua ngay</div>
                           ';
                        }else{
                           echo '
                                       <a href="product_detail.php?ID='.$result_banchay['ID_SanPham'].'" class="btn btn-primary learn-more">Mua ngay</a>
                           ';
                        }
                        echo'
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        ';
                     }
                  ?>
                  <script>
                     document.addEventListener("DOMContentLoaded", function() {
                           var hoverDiv = document.getElementById("hoverDiv");
                           var originalText = hoverDiv.textContent;

                           hoverDiv.addEventListener("mouseover", function() {
                              hoverDiv.textContent = "";
                           });

                           hoverDiv.addEventListener("mouseout", function() {
                              hoverDiv.textContent = originalText;
                           });
                     });
                  </script>
                  <?php
                     $sql_hang_banchay = "SELECT * FROM (SELECT h.ID_Hang, h.TenHang, h.link_hang, SUM(sp.DaBan) AS SoLuong FROM hang h JOIN sanpham sp ON h.ID_Hang = sp.Hang GROUP BY h.ID_Hang, h.TenHang) as temp ORDER BY SoLuong DESC LIMIT 6";
                     $stmt_hang_banchay = $conn->prepare($sql_hang_banchay);
                     $stmt_hang_banchay->execute();
                     if($stmt_hang_banchay->rowCount() > 0){
                        echo '
                        <div class="col-lg-6">
                           <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                              <div class="iq-card-header d-flex justify-content-between mb-0">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Top 6 hãng bán chạy nhất</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <ul class="list-inline row mb-0 align-items-center iq-scrollable-block">
                        ';
                        while($row = $stmt_hang_banchay->fetch(PDO::FETCH_ASSOC)){
                           echo '
                                    <li class="col-sm-6 d-flex mb-3 align-items-center">
                                       <div class="icon iq-icon-box mr-3">
                                          <a href="index.php?ID_Hang='.$row['ID_Hang'].'"><img class="img-hang-hover img-fluid avatar-60 rounded-circle" src="'.$row['link_hang'].'" alt=""></a>
                                       </div>
                                       <div class="mt-1">
                                          <h6>'.$row['TenHang'].'</h6>
                                          <p class="mb-0 text-primary">Số lượng đã bán: <span class="text-body">'.$row['SoLuong'].'</span></p>
                                       </div>
                                    </li>
                           ';
                        }
                        echo '
                                 </ul>
                              </div>
                           </div>
                        </div>
                        ';
                     }
                  ?>
                  <?php
                     $sql_top_sp_banchay = "SELECT sp.ID_SanPham, sp.TenSP, sp.Gia, sp.Hang, sp.Status, sp.SoLuong, sp.ThongTin, sp.DaBan, sp.BaoHanh, sp.ID_KhuyenMai, ha.link, h.TenHang, ctdh.SoLuong AS SoLuong FROM sanpham sp JOIN hinhanhsanpham ha ON sp.ID_SanPham = ha.ID_SanPham JOIN hang h ON sp.Hang = h.ID_Hang JOIN chitietdonhang ctdh ON sp.ID_SanPham = ctdh.ID_SanPham JOIN donhang dh ON ctdh.ID_DonHang = dh.ID_DonHang WHERE dh.ID_Status_Giao = 5 GROUP BY sp.ID_SanPham ORDER BY ctdh.SoLuong DESC LIMIT 4";
                     $stmt_top_sp_banchay = $conn->prepare($sql_top_sp_banchay);
                     $stmt_top_sp_banchay->execute();
                     if($stmt_top_sp_banchay->rowCount() > 1){
                        echo '
                        <div class="col-lg-12">
                           <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                              <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                                 <div class="iq-header-title">
                                    <h4 class="card-title mb-0">Sản phẩm yêu thích</h4>
                                 </div>
                              </div>                         
                              <div class="iq-card-body favorites-contens">
                                 <ul id="favorites-slider" class="list-inline p-0 mb-0 row">
                        ';
                        while($row = $stmt_top_sp_banchay->fetch(PDO::FETCH_ASSOC)){
                           echo '
                                    <li class="col-md-4">
                                       <div class="d-flex align-items-center">
                                          <div class="sanpham_yeuthich col-5 p-0 position-relative">
                                             <a href="javascript:void();">
                                                <img src="'.$row['link'].'" class="img-fluid rounded w-100" alt="">
                                             </a>
                                             <div class="view-book">
                                                <a href="product_detail.php?ID='.$row['ID_SanPham'].'" class="btn btn-sm btn-white">Mua Ngay</a>
                                             </div>                        
                                          </div>
                                          <div class="col-7">
                                             <h5 title="'.$row['TenSP'].'" class="TenSP mb-2">'.$row['TenSP'].'</h5>
                                             <p class="mb-2">'.$row['TenHang'].'</p>                                          
                                             <div class="d-flex justify-content-between align-items-center text-dark font-size-13">
                                                <span>Đã bán</span>
                                                <span class="mr-4">'.$row['SoLuong'].'</span>
                                             </div>
                                             <div class="iq-progress-bar-linear d-inline-block w-100">
                                                <div class="iq-progress-bar iq-bg-primary">
                                                   <span class="bg-primary" data-percent="'.$row['SoLuong'].'"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                           ';
                           if($row['Status'] == 0){
                              echo '<div style="background: url(./asset/image/out_of_stock.png) center/contain no-repeat;" class="sold-out"></div>';
                           }
                           echo'
                                    </li>
                           ';
                        }
                        echo '
                                 </ul>
                              </div>
                           </div>
                        </div>
                        ';
                     }
                  ?>
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
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   </body>
</html>