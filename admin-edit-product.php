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
   //Truy vấn thông tin sản phẩm cần sửa
   $ID_SanPham = $_GET['ID_SanPham'];
   $sql_get_infoproduct = "select * from sanpham where ID_SanPham = '$ID_SanPham'";
   $stmt_get_infoproduct = $conn->prepare($sql_get_infoproduct);
   $query_get_infoproduct = $stmt_get_infoproduct->execute();
   $res_get_infoproduct = $stmt_get_infoproduct->fetch(PDO::FETCH_ASSOC);
   if (!empty($_POST['submit'])) {
      $hang = strval($_POST['hang']);
      $status = $_POST['status'];
      $status = $status ? true : false;
      $khuyenmai = strval($_POST['khuyenmai']);
      $tensp = $_POST['tensp'];
      $gia = $_POST['gia'];
      $soluong = "";
      if ($status) {
         $soluong = strval($_POST['soluong']);
      } else {
         $soluong = "0";
      }
      $thongtin = $_POST['thongtin'];
      $baohanh = strval($_POST['baohanh']);
      $loaisp = strval($_POST['loaisp']);
      if (isset($_POST['tensp'])  && isset($_POST['gia']) && isset($_POST['thongtin']) && isset($_POST['baohanh'])) {
         //Sửa sản phẩm
         if ($khuyenmai != "NULL") {
            $sql_insert_sp = "update sanpham set TenSP = '$tensp', Gia = '$gia', Hang = '$hang', Status = '$status', SoLuong = '$soluong', ThongTin = '$thongtin', BaoHanh = '$baohanh', ID_KhuyenMai = '$khuyenmai', ID_LoaiSanPham = '$loaisp' where ID_SanPham = '$ID_SanPham'";
         } else {
            $sql_insert_sp = "update sanpham set TenSP = '$tensp', Gia = '$gia', Hang = '$hang', Status = '$status', SoLuong = '$soluong', ThongTin = '$thongtin', BaoHanh = '$baohanh', ID_KhuyenMai = NULL, ID_LoaiSanPham = '$loaisp' where ID_SanPham = '$ID_SanPham'";
         }
         $stmt_insert_sp = $conn->prepare($sql_insert_sp);
         $query_insert_sp = $stmt_insert_sp->execute();
         $id_sp = $ID_SanPham;
         if (isset($_FILES['images'])) {
            if(empty($file_name[0])){ // Kiểm tra xem tên file đầu tiên có rỗng không
            } else {
               $sql_idsp = "delete from hinhanhsanpham where ID_SanPham = '$ID_SanPham'"; 
               $stmt_idsp = $conn->prepare($sql_idsp);
               $query_idsp = $stmt_idsp->execute();
               $count = count($_FILES['images']['name']);
               for ($i = 0; $i < $count; $i++) {
                  $name = $_FILES['images']['name'][$i];
                  $tmp = $_FILES['images']['tmp_name'][$i];
                  $link = "./asset/image/" . strval($name);
                  move_uploaded_file($tmp, $link);
                  $sql_addha = "insert into hinhanhsanpham(ID_SanPham, link) values('$id_sp', '$link')";
                  $stmt_adha = $conn->prepare($sql_addha);
                  $query_adha = $stmt_adha->execute();
               }
            }
         }
         header("location:admin-edit-product.php?ID_SanPham=$ID_SanPham");
      }
   }
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Sửa thông tin sản phẩm</title>
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
                                                <a href="update_notification.php?ID_Noti='.$row_notification['ID_Noti'].'&admin-edit-product='.$ID_SanPham.'" class="iq-sub-card notification-items notification-unseen">
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
                                                <a href="update_notification.php?ID_Noti='.$row_notification['ID_Noti'].'&admin-edit-product='.$ID_SanPham.'" class="iq-sub-card notification-items">
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
                              <h4 class="card-title">Thay đổi thông tin sản phẩm</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form action="" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                 <label>Tên sản phẩm:</label>
                                 <input type="text" class="form-control" name="tensp" value="<?php echo $res_get_infoproduct['TenSP']?>">
                              </div>
                              <div class="form-group">
                                 <label>Danh mục hãng:</label>
                                 <select class="form-control" id="exampleFormControlSelect1" name="hang">
                                    <?php
                                       //Truy vấn add hãng vào combobox
                                       $sql_cbb_hang = "select * from hang";
                                       $stmt_cbb_hang = $conn->prepare($sql_cbb_hang);
                                       $query_cbb_hang = $stmt_cbb_hang->execute();
                                       while ($res_cbb_hang = $stmt_cbb_hang->fetch(PDO::FETCH_ASSOC)) {
                                          if ($res_cbb_hang['ID_Hang'] == $res_get_infoproduct['Hang']) {
                                             echo '<option value="' . $res_cbb_hang['ID_Hang'] . '" selected>' . $res_cbb_hang['TenHang'] . '</option>';
                                          } else {
                                             echo '<option value="' . $res_cbb_hang['ID_Hang'] . '">' . $res_cbb_hang['TenHang'] . '</option>';
                                          }
                                       }
                                     ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Danh mục loại sản phẩm:</label>
                                 <select class="form-control" id="exampleFormControlSelect1" name="loaisp">
                                    <?php
                                       //Truy vấn add loại sản phẩm vào combobox
                                       $sql_cbb_lsp = "select * from loaisanpham";
                                       $stmt_cbb_lsp = $conn->prepare($sql_cbb_lsp);
                                       $query_cbb_lsp = $stmt_cbb_lsp->execute();
                                       while ($res_cbb_lsp = $stmt_cbb_lsp->fetch(PDO::FETCH_ASSOC)) {
                                          if ($res_cbb_lsp['ID_LoaiSanPham'] == $res_get_infoproduct['ID_LoaiSanPham']) {
                                             echo '<option value="' . $res_cbb_lsp['ID_LoaiSanPham'] . '" selected>' . $res_cbb_lsp['TenLoai'] . '</option>';
                                          } else {
                                             echo '<option value="' . $res_cbb_lsp['ID_LoaiSanPham'] . '">' . $res_cbb_lsp['TenLoai'] . '</option>';
                                          }
                                       }
                                     ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Trạng thái</label>
                                 <select id="status" class="form-control" id="exampleFormControlSelect1" name="status" onchange="myFunction()">
                                    <option value="1" <?php if ($res_get_infoproduct['Status'] == 1) { echo 'selected';}?>>Còn hàng</option>
                                    <option value="0" <?php if ($res_get_infoproduct['Status'] == 0) { echo 'selected';}?>>Hết hàng</option>
                                 </select>
                                 <input <?php if ($res_get_infoproduct['Status'] == 0) { echo 'disabled';}?> name="soluong" type="number" id="soluong" min="1" max="100" value="<?php echo $res_get_infoproduct['SoLuong']?>" style="margin-top: 10px; margin-right: 10px">Chiếc / Cái
                                 <script>
                                    function myFunction() {
                                       var x = document.getElementById("status").value;
                                       if (x == "1") {
                                          document.getElementById("soluong").value = 1;
                                          document.getElementById("soluong").disabled = false;
                                       } else {
                                          document.getElementById("soluong").value = 0;
                                          document.getElementById("soluong").disabled = true;
                                       }
                                    }
                                 </script>
                              </div>
                              <div class="form-group">
                                 <label>Hình ảnh:</label>
                                 <div class="custom-file">
                                    <input type="file" name="images[]" id="imageUpload" class="custom-file-input" accept="image/png, image/jpeg" multiple>
                                    <label class="custom-file-label">Choose file</label>
                                    <div id="preview"></div>
                                    <script>
                                       function initDefaultImages() {
                                          var preview1 = document.getElementById('preview');
                                          preview1.innerHTML = '';
                                          <?php 
                                             $sql_get_img = "select * from hinhanhsanpham where ID_SanPham = '$ID_SanPham'";
                                             $stmt_get_img = $conn->prepare($sql_get_img);
                                             $query_get_img = $stmt_get_img->execute();
                                             while ($res_get_img = $stmt_get_img->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                var img = document.createElement('img');
                                                img.src = '<?php echo strval($res_get_img['link'])?>';
                                                img.style.height = '350px';
                                                img.style.width = '500px';
                                                img.style.margin = '5px';
                                                preview1.appendChild(img);
                                                <?php
                                             }
                                          ?>
                                       }
                                       
                                       initDefaultImages();

                                       document.getElementById('imageUpload').addEventListener('change', function(e) {
                                          var preview = document.getElementById('preview');
                                          preview.innerHTML = '';

                                          Array.from(e.target.files).forEach(function(file) {
                                             var img = document.createElement('img');
                                             img.src = URL.createObjectURL(file);
                                             img.style.height = '350px';
                                             img.style.width = '500px';
                                             img.style.margin = '5px';
                                             img.onload = function() {
                                                URL.revokeObjectURL(img.src);
                                             }
                                             preview.appendChild(img);
                                          });
                                       });
                                    </script>
                                 </div>
                              </div>
                              <div class="form-group" style="margin-top: 200px">
                                 <label>Giá sản phẩm: đ</label>
                                 <input type="text" class="form-control" name="gia" id="gia" value="<?php echo $res_get_infoproduct['Gia']?>">
                                 <script>
                                    document.getElementById('gia').addEventListener('input', function (e) {
                                       var start = this.selectionStart,
                                             end = this.selectionEnd;
                                       this.value = this.value.replace(/[^0-9]/g, '').replace(/^0+/, '');
                                       this.setSelectionRange(start, end);
                                    });
                                 </script>
                              </div>
                              <div class="form-group">
                                 <label>Danh mục khuyến mãi:</label>
                                 <select class="form-control" id="exampleFormControlSelect1" name="khuyenmai">
                                    <?php
                                       //Truy vấn add hãng vào combobox
                                       $sql_cbb_khuyenmai = "select * from khuyenmai where KetThuc > CURDATE()";
                                       $stmt_cbb_khuyenmai = $conn->prepare($sql_cbb_khuyenmai);
                                       $query_cbb_khuyenmai = $stmt_cbb_khuyenmai->execute();
                                       if ($res_get_infoproduct['ID_KhuyenMai'] == '' ) {
                                          echo '<option value="NULL" selected>Không khuyến mãi</option>';
                                       } else {
                                          echo '<option value="NULL">Không khuyến mãi</option>';
                                       }
                                       while ($res_cbb_khuyenmai = $stmt_cbb_khuyenmai->fetch(PDO::FETCH_ASSOC)) {
                                          if ($res_cbb_khuyenmai['ID_KhuyenMai'] == $res_get_infoproduct['ID_KhuyenMai']) {
                                             echo '<option value="' . $res_cbb_khuyenmai['ID_KhuyenMai'] . '" selected>' . $res_cbb_khuyenmai['TenKhuyenMai'] . " - " . $res_cbb_khuyenmai['MucGiam'] . "%" . '</option>';
                                          } else {
                                             echo '<option value="' . $res_cbb_khuyenmai['ID_KhuyenMai'] . '">' . $res_cbb_khuyenmai['TenKhuyenMai'] . " - " . $res_cbb_khuyenmai['MucGiam'] . "%" . '</option>';
                                          }
                                       }
                                     ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Thời gian bảo hành: (tháng)</label>
                                 <input type="number" class="form-control" min="1" max="24" name="baohanh" value="<?php echo $res_get_infoproduct['BaoHanh']?>">
                              </div>
                              <div class="form-group">
                                 <label>Thông tin</label>
                                 <textarea class="form-control" rows="4" name="thongtin"><?php echo $res_get_infoproduct['ThongTin']?></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary" name="submit" value="submit">Sửa sản phẩm</button>
                           </form>
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
     
      <!-- color-customizer END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
   </body>
</html>