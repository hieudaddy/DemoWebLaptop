<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['ID_Account']) || $_SESSION['ID_Account'] == NULL || !isset($_SESSION['user']) || $_SESSION['user'] == null || $_SESSION['user'] == 'admin' || $_SESSION['ID_Account'] == 1) {
   header('Location: sign-in.php');
   exit();
}
$ID_SanPham = '';
if(isset($_GET['ID'])){
   $ID_SanPham = $_GET['ID'];
}else{
   header('Location: index.php');
}
$sql_sanpham = "SELECT sp.ID_SanPham, sp.TenSP, sp.Status, sp.SoLuong, sp.Gia, ha.link, h.TenHang, COALESCE(km.MucGiam, 0) AS MucGiam, lsp.TenLoai FROM sanpham sp JOIN hinhanhsanpham ha ON sp.ID_SanPham = ha.ID_SanPham JOIN hang h ON sp.Hang = h.ID_Hang LEFT JOIN khuyenmai km ON sp.ID_KhuyenMai = km.ID_KhuyenMai JOIN loaisanpham lsp ON sp.ID_LoaiSanPham = lsp.ID_LoaiSanPham WHERE sp.ID_SanPham = :ID_SanPham";
$stmt_sanpham = $conn->prepare($sql_sanpham);
$stmt_sanpham->bindParam(':ID_SanPham', $ID_SanPham);
$stmt_sanpham->execute();
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
      <?php
         if($stmt_sanpham->rowCount() > 0){
            echo '<title>Shop 23h - '.$stmt_sanpham->fetch(PDO::FETCH_ASSOC)['TenSP'].'</title>';
         }
      ?>
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
                                                <a href="update_notification.php?ID_Noti='.$row_notification['ID_Noti'].'&product_detail='.$ID_SanPham.'" class="iq-sub-card notification-items notification-unseen">
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
                                                <a href="update_notification.php?ID_Noti='.$row_notification['ID_Noti'].'&product_detail='.$ID_SanPham.'" class="iq-sub-card notification-items">
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
                  <div class="col-sm-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center">
                           <h4 class="card-title mb-0">Thông tin</h4>
                        </div>
                        <div class="iq-card-body pb-0">
                           <div class="description-contens align-items-top row">  
                              <div class="col-md-6">
                                 <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body p-0">
                                       <div class="row align-items-center">
                                          <div class="col-3">
                                             <ul id="description-slider-nav" class="list-inline p-0 m-0  d-flex align-items-center">
                                                <?php
                                                $stmt_sanpham->execute();
                                                if($stmt_sanpham->rowCount() > 0){
                                                   while($row_sanpham = $stmt_sanpham->fetch(PDO::FETCH_ASSOC)){
                                                      $TenSP = $row_sanpham['TenSP'];
                                                      echo '
                                                         <li>
                                                            <a href="javascript:void(0);">
                                                               <img src="'.$row_sanpham['link'].'" class="img-fluid rounded w-100" alt="">
                                                            </a>
                                                         </li>
                                                      ';
                                                   }
                                                }
                                                ?>
                                             </ul>
                                          </div>
                                          <div class="col-9">
                                             <ul id="description-slider" class="list-inline p-0 m-0  d-flex align-items-center">
                                                <?php
                                                $stmt_sanpham->execute();
                                                if($stmt_sanpham->rowCount() > 0){
                                                   while($row_sanpham = $stmt_sanpham->fetch(PDO::FETCH_ASSOC)){
                                                      echo '
                                                         <li>
                                                            <a href="javascript:void(0);">
                                                               <img src="'.$row_sanpham['link'].'" class="img-fluid rounded w-100" alt="">
                                                            </a>
                                                         </li>
                                                      ';
                                                   }
                                                }
                                                ?>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body p-0">
                                    <?php
                                    $sql_sanpham = "SELECT sp.ID_SanPham, sp.TenSP,sp.ThongTin, sp.Status, sp.DaBan, sp.SoLuong, sp.Gia, ha.link, h.TenHang, COALESCE(km.MucGiam, 0) AS MucGiam, lsp.TenLoai FROM sanpham sp JOIN hinhanhsanpham ha ON sp.ID_SanPham = ha.ID_SanPham JOIN hang h ON sp.Hang = h.ID_Hang LEFT JOIN khuyenmai km ON sp.ID_KhuyenMai = km.ID_KhuyenMai JOIN loaisanpham lsp ON sp.ID_LoaiSanPham = lsp.ID_LoaiSanPham WHERE sp.ID_SanPham = :ID_SanPham LIMIT 1";
                                    $stmt_sanpham = $conn->prepare($sql_sanpham);
                                    $stmt_sanpham->bindParam(':ID_SanPham', $ID_SanPham);
                                    $stmt_sanpham->execute();
                                    if ($stmt_sanpham->rowCount() > 0) {
                                       $row_sanpham = $stmt_sanpham->fetch(PDO::FETCH_ASSOC);
                                       echo '
                                       <h3 class="mb-3">' . $row_sanpham['TenSP'] . '</h3>
                                       <div class="price font-weight-500 mb-2">';
                                       if ($row_sanpham['MucGiam'] != 0) {
                                          echo '<span class="font-size-20 pr-2 old-price">' . number_format($row_sanpham['Gia'], 0, ',', '.') . ' ₫</span>
                                                <i class="discount-number">-' . $row_sanpham['MucGiam'] . '%</i> <br>
                                          ';
                                       }
                                       $finalPrice = ($row_sanpham['Gia'] * (100 - $row_sanpham['MucGiam'])) / 100;
                                       $array_infor = explode("/", $row_sanpham['ThongTin']);
                                       echo '<span class="font-size-24 text-dark">' . number_format($finalPrice, 0, ',', '.') . ' ₫</span>
                                       </div>';
                                       foreach ($array_infor as $key => $value) {
                                          echo '<span class="text-dark mb-4 pb-4 iq-border-bottom d-block">' . $value . '</span>';
                                       }
                                       echo'
                                       <div class="text-primary mb-4">Hãng: <span class="text-body">' . $row_sanpham['TenHang'] . '</span></div>
                                       <div class="text-primary mb-4">Kho: <span class="text-body">' . $row_sanpham['SoLuong'] . '</span></div>
                                       <div class="text-primary mb-4">Đã bán: <span class="text-body">' . $row_sanpham['DaBan'] . '</span></div>
                                       <div class="text-primary mb-4">Phân loại: <span class="text-body">' . $row_sanpham['TenLoai'] . '</span></div>
                                       <div class="mb-4 d-flex align-items-center">
                                          <a href="add_to_cart.php?ID_SanPham='.$row_sanpham['ID_SanPham'].'&SoLuong=1&SoLuongKho='.$row_sanpham['SoLuong'].'&detail=true" class="btn btn-primary view-more mr-2">Thêm vào giỏ hàng</a>
                                          <button class="btn btn-primary view-more mr-2" onclick="postToPayment(' . $row_sanpham['ID_SanPham'] . ', ' . $finalPrice . ')">Mua ngay</button>
                                       </div>
                                       <div class="iq-social d-flex align-items-center">
                                          <h5 class="mr-2">Chia sẻ:</h5>
                                          <ul class="list-inline d-flex p-0 mb-0 align-items-center">
                                                <li>
                                                   <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                </li>
                                                <li>
                                                   <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                </li>
                                                <li>
                                                   <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                                </li>
                                                <li>
                                                   <a href="#" class="avatar-40 rounded-circle bg-primary pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                                </li>
                                          </ul>
                                       </div>
                                       ';
                                       if($row_sanpham['Status'] == 0){
                                          echo '
                                          <div style="background: url(./asset/image/out_of_stock.png) center/contain no-repeat;" class="sold-out"></div>';
                                       }
                                    }
                                    ?>
                                       <form id="paymentForm" action="payment.php" method="POST" style="display: none;">
                                          <input type="hidden" name="ID_SanPham" id="ID_SanPham">
                                          <input type="hidden" name="TongTien" id="TongTien">
                                       </form>
                                    <script>
                                       function postToPayment(ID_SanPham, TongTien) {
                                          // Đặt giá trị cho các trường ẩn
                                          document.getElementById('ID_SanPham').value = ID_SanPham;
                                          document.getElementById('TongTien').value = TongTien;
                                          // Gửi biểu mẫu
                                          document.getElementById('paymentForm').submit();
                                       }
                                    </script>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php
                     $sql_sanpham_tuongtu = "SELECT sp.ID_SanPham, sp.TenSP, sp.Status, h.TenHang, hasp.link FROM sanpham sp JOIN sanpham sp1 ON sp.Hang = sp1.Hang AND sp.ID_LoaiSanPham = sp1.ID_LoaiSanPham LEFT JOIN hinhanhsanpham hasp ON sp.ID_SanPham = hasp.ID_SanPham JOIN hang h ON sp.Hang = h.ID_Hang WHERE sp1.ID_SanPham = :ID_SanPham GROUP BY sp.ID_SanPham HAVING sp.ID_SanPham <> :ID_SanPham";
                     $stmt_sanpham_tuongtu = $conn->prepare($sql_sanpham_tuongtu);
                     $stmt_sanpham_tuongtu->bindParam(':ID_SanPham', $ID_SanPham);
                     $stmt_sanpham_tuongtu->execute();
                     if($stmt_sanpham_tuongtu->rowCount() >= 4){
                        echo '
                        <div class="col-lg-12">
                           <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                              <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                                 <div class="iq-header-title">
                                    <h4 class="card-title mb-0">Sản phẩm tương tự</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body single-similar-contens">
                                 <ul id="single-similar-slider" class="list-inline p-0 mb-0 row">
                        ';
                        while($row_sanpham_tuongtu = $stmt_sanpham_tuongtu->fetch(PDO::FETCH_ASSOC)){
                           echo '
                                    <li class="col-md-3">
                                       <div class="row align-items-center">
                                          <div class="col-5">
                                             <div class="position-relative image-overlap-shadow">
                                                <a href="javascript:void();"><img class="img-fluid rounded w-100" src="'.$row_sanpham_tuongtu['link'].'" alt=""></a>
                                                <div class="view-book">
                                                   <a href="product_detail.php?ID='.$row_sanpham_tuongtu['ID_SanPham'].'" class="btn btn-sm btn-white">Xem thêm</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-7 pl-0">
                                             <h6  title="'.$row_sanpham_tuongtu['TenSP'].'" class="mb-2">'.$row_sanpham_tuongtu['TenSP'].'</h6>
                                             <p class="text-body">Hãng : '.$row_sanpham_tuongtu['TenHang'].'</p>
                                          </div>
                                       </div>';
                           if($row_sanpham_tuongtu['Status'] == 0){
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
      <!-- Footer END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   </body>
</html>