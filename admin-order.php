<?php
   include 'connection.php';
   session_start();
   if (!isset($_SESSION['ID_Account']) || $_SESSION['ID_Account'] == NULL || !isset($_SESSION['user']) || $_SESSION['user'] == null || $_SESSION['user'] != 'admin' || $_SESSION['ID_Account'] != 1) {
      header('Location: sign-in.php');
      exit();
   }
   $ID_Account = $_SESSION['ID_Account'];
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
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.dataTables.min.js"></script>
      <script src="js/dataTables.bootstrap4.min.js"></script>
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
      <title>Các đơn hàng - Shop 23h</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
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
                                                <a href="update_notification.php?ID_Noti='.$row_notification['ID_Noti'].'&admin-order=true" class="iq-sub-card notification-items notification-unseen">
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
                                                <a href="update_notification.php?ID_Noti='.$row_notification['ID_Noti'].'&admin-order=true" class="iq-sub-card notification-items">
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
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Danh sách đơn hàng hiện có</h4>
                           </div>
                        </div>
                        <?php
                           $selectedID = isset($_GET['ID_Account']) ? $_GET['ID_Account'] : null;

                           $sql_account_donhang = "SELECT acc.ID_Account, us.HoTen FROM account acc JOIN userinfo us ON acc.ID_Account = us.ID_Account JOIN hoadon hd ON acc.ID_Account = hd.ID_Account JOIN donhang dh ON hd.ID_HoaDon = dh.ID_HoaDon GROUP BY hd.ID_Account";
                           $stmt_account_donhang = $conn->prepare($sql_account_donhang);
                           $stmt_account_donhang->execute();

                           if($stmt_account_donhang->rowCount() > 0){
                              echo '
                              <div class="custom-select">
                                 <button class="select-button" role="combobox" aria-labelledby="select button" aria-haspopup="listbox" aria-expanded="false" aria-controls="select-dropdown">
                                       <span class="selected-value">Chọn tài khoản</span>
                                       <span class="arrow"></span>
                                 </button>
                                 <ul class="select-dropdown" role="listbox" id="select-dropdown">
                              ';
                              while($row_account_donhang = $stmt_account_donhang->fetch(PDO::FETCH_ASSOC)){
                                 $selected = ($row_account_donhang['ID_Account'] == $selectedID) ? ' checked' : '';
                                 echo '
                                       <li role="option">
                                          <input type="radio" id="account_'.$row_account_donhang['ID_Account'].'" name="account" value="'.$row_account_donhang['ID_Account'].'"'.$selected.' />
                                          <label for="account_'.$row_account_donhang['ID_Account'].'"><i class="bx bxl-account_'.$row_account_donhang['ID_Account'].'"></i>'.$row_account_donhang['HoTen'].'</label>
                                       </li>
                                 ';
                              }
                              echo '
                                 </ul>
                              </div>
                              ';
                           }
                           ?>
                        <script>
                           document.addEventListener('DOMContentLoaded', function() {
                              const customSelect = document.querySelector(".custom-select");
                              const selectBtn = document.querySelector(".select-button");
                              const selectedValue = document.querySelector(".selected-value");
                              const optionsList = document.querySelectorAll(".select-dropdown li");

                              // Add click event to select button
                              selectBtn.addEventListener("click", () => {
                                 // Toggle active class on the container element
                                 customSelect.classList.toggle("active");
                                 // Update the aria-expanded attribute based on the current state
                                 selectBtn.setAttribute(
                                       "aria-expanded",
                                       selectBtn.getAttribute("aria-expanded") === "true" ? "false" : "true"
                                 );
                              });

                              // Set selected account if ID_Account is present in GET
                              const urlParams = new URLSearchParams(window.location.search);
                              const selectedID = urlParams.get('ID_Account');
                              if (selectedID) {
                                 const selectedOption = document.querySelector(`#account_${selectedID}`);
                                 if (selectedOption) {
                                       selectedOption.checked = true;
                                       selectedValue.textContent = selectedOption.nextElementSibling.textContent;
                                 }
                              }

                              optionsList.forEach((option) => {
                                 function handler(e) {
                                       // Click Events
                                       if (e.type === "click" && e.clientX !== 0 && e.clientY !== 0) {
                                          selectedValue.textContent = this.children[1].textContent;
                                          customSelect.classList.remove("active");
                                          // Redirect to admin-donhang.php with ID_Account
                                          const accountID = this.querySelector('input[type="radio"]').value;
                                          window.location.href = 'admin-order.php?ID_Account=' + accountID;
                                       }
                                       // Key Events (Enter)
                                       if (e.key === "Enter") {
                                          selectedValue.textContent = this.textContent;
                                          customSelect.classList.remove("active");
                                          // Redirect to admin-donhang.php with ID_Account
                                          const accountID = this.querySelector('input[type="radio"]').value;
                                          window.location.href = 'admin-donhang.php?ID_Account=' + accountID;
                                       }
                                 }
                                 option.addEventListener("keyup", handler);
                                 option.addEventListener("click", handler);
                              });
                           });
                        </script>
                        <?php
                        if($selectedID != NULL){
                           $sql_donhang = "SELECT * FROM donhang JOIN thanhtoan ON donhang.ID_ThanhToan = thanhtoan.ID_ThanhToan JOIN hoadon ON donhang.ID_HoaDon = hoadon.ID_HoaDon JOIN statusgiaohang ON donhang.ID_Status_Giao = statusgiaohang.ID_Status_Giao WHERE ID_Account = :ID_Account ORDER BY donhang.ID_Status_Giao";
                           $stmt_donhang = $conn->prepare($sql_donhang);
                           $stmt_donhang->bindParam(':ID_Account', $selectedID);
                           $stmt_donhang->execute();
                           if($stmt_donhang->rowCount() > 0){
                              while($row_donhang = $stmt_donhang->fetch(PDO::FETCH_ASSOC)){
                                 echo '
                                 <div class="order-container iq-cart-body" data-account-id="'.$selectedID.'" data-donhang-id="'.$row_donhang['ID_DonHang'].'">
                                     <div class="STT_status">
                                         <h5>#'.$row_donhang['ID_DonHang'].'</h5>
                                 ';
                                 if($row_donhang['ID_Status_Giao'] < 4){
                                    echo '<select class="admin-order" name="" id="">';
                                    $sql_Status_Giao = "SELECT * FROM statusgiaohang WHERE ID_Status_Giao >= :ID_Status_Giao LIMIT 2";
                                    $stmt_Status_Giao = $conn->prepare($sql_Status_Giao);
                                    $stmt_Status_Giao->bindParam(':ID_Status_Giao', $row_donhang['ID_Status_Giao']);
                                    $stmt_Status_Giao->execute();
                                    while($row_Status_Giao = $stmt_Status_Giao->fetch(PDO::FETCH_ASSOC)){
                                       if($row_Status_Giao['ID_Status_Giao'] == $row_donhang['ID_Status_Giao']){
                                          echo '<option value="'.$row_Status_Giao['ID_Status_Giao'].'" selected>'.$row_Status_Giao['TinhTrang'].'</option>';
                                       }else{
                                          echo '<option value="'.$row_Status_Giao['ID_Status_Giao'].'">'.$row_Status_Giao['TinhTrang'].'</option>';
                                       }
                                    }
                                    echo '</select>';
                                 }else{
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
                                 }
                                 echo '
                                    </div>
                                    <hr>
                                    <ul class="list-margin list-inline p-0">
                             ';                             
                                    $sql_temp = "SELECT ctac.ID_DonHang, ctac.ID_SanPham, ctac.SoLuong, ctac.TongTien, sp.TenSP, sp.Status, sp.SoLuong AS SoLuongKho, ha.link FROM chitietdonhang ctac JOIN donhang ac ON ctac.ID_DonHang = ac.ID_DonHang JOIN sanpham sp on ctac.ID_SanPham = sp.ID_SanPham JOIN hinhanhsanpham ha ON ctac.ID_SanPham = ha.ID_SanPham WHERE ctac.ID_DonHang = :ID_DonHang GROUP BY ctac.ID_SanPham";
                                    $stmt_temp = $conn->prepare($sql_temp);
                                    $stmt_temp->bindParam(':ID_DonHang', $row_donhang['ID_DonHang']);
                                    $stmt_temp->execute();
                                    $TongTien = 0;
                                    if($stmt_temp->rowCount() > 0){
                                       while($row_temp = $stmt_temp->fetch(PDO::FETCH_ASSOC)){
                                          $statusClass = ($row_temp['SoLuong'] <= $row_temp['SoLuongKho']) ? 'text-green' : 'text-red';
                                          echo '
                                          <li class="mb-1 order-items" data-status="'.$row_temp['Status'].'" data-soluong="'.$row_temp['SoLuong'].'" data-soluongkho="'.$row_temp['SoLuongKho'].'">
                                                <a class="order-img-link" href="admin-edit-product.php?ID_SanPham='.$row_temp['ID_SanPham'].'"><img class="img-fluid rounded" src="'.$row_temp['link'].'" alt=""></a>
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
                                          <h5>Phương thức thanh toán</h5>
                                          <h5 class="text-blue font-weight-bold">'.$row_donhang['HinhThuc'].'</h5>
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
                        }
                        ?>
                        <script>
                           function checkOrder(ID_DonHang, ID_Account, ID_ThanhToan){
                              let orderItems = document.querySelectorAll('.order-container[data-donhang-id="' + ID_DonHang + '"] .order-items');
                              console.log(orderItems);
                              let invalidProducts = Array.from(orderItems).filter(item => {
                                 let status = parseInt(item.getAttribute('data-status'));
                                 let soluong = parseInt(item.getAttribute('data-soluong'));
                                 let soluongkho = parseInt(item.getAttribute('data-soluongkho'));
                                 return status === 0 || soluong > soluongkho;
                              });
                              if (invalidProducts.length > 0) {
                                 alert('Đơn hàng #' + ID_DonHang + ' không đủ số lượng.');
                              } else {
                                 window.location.href = 'admin-confirm-order.php?ID_DonHang=' + ID_DonHang + '&ID_Account=' + ID_Account + '&ID_ThanhToan= ' + ID_ThanhToan;
                              }
                           }
                           $(document).ready(function() {
                              $('.admin-order').change(function() {
                                 var donhangId = $(this).closest('.order-container').data('donhang-id');
                                 var accountId = $(this).closest('.order-container').data('account-id');
                                 var statusGiaoId = $(this).val();

                                 window.location.href = 'change-status-giao.php?ID_DonHang=' + donhangId + '&ID_Status_Giao=' + statusGiaoId + '&ID_Account=' + accountId + '&user=false';
                              });
                           });
                        </script>
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
   </body>
</html>