<?php
session_start();
include "connection.php";
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $TaiKhoan = $_POST['TaiKhoan'];
    $MatKhau = $_POST['MatKhau'];
    $Repeat_MatKhau = $_POST['Repeat_MatKhau'];
    if($MatKhau != $Repeat_MatKhau){
        $error = 'Hai mật khẩu không trùng khớp.';
    }else{
        $sql = "SELECT * FROM account WHERE TaiKhoan = :TaiKhoan";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':TaiKhoan', $TaiKhoan);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $hashedPassword = password_hash($MatKhau, PASSWORD_BCRYPT);
            $sql = "UPDATE account SET MatKhau = :MatKhau WHERE TaiKhoan = :TaiKhoan";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':MatKhau', $hashedPassword);
            $stmt->bindParam(':TaiKhoan', $TaiKhoan);
            if($stmt->execute()){
                header('Location: sign-in.php');
            }else{
                $error = 'Lỗi bất ngờ, Sorry mà!!!';
            }
        }else{
            $error = 'Không tồn tại tài khoản.';
        }
    }
}
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
      <title>Quên mật khẩu</title>
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
   <body <?php echo ($error == '' ? '' : 'onload="showWarningToast(\''.addslashes($error).'\');"'); ?>>
        <div id="toast"></div>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
        <!-- Sign in Start -->
        <div class="sign-in-page">
            <div class="container p-0">
                <div class="row no-gutters height-self-center">
                  <div class="col-sm-12 align-self-center page-content rounded">
                    <div class="row m-0">
                      <div class="col-sm-12 sign-in-page-data">
                          <div class="sign-in-from bg-primary rounded">
                              <h3 class="mb-0 text-center text-white">Sign in</h3>
                              <p class="text-center text-white">Enter your username and password to access sign-in.</p>
                              <form method="post" class="mt-4 form-text">
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">User name</label>
                                      <input name="TaiKhoan" type="text" required class="form-control mb-0" id="exampleInputEmail1" placeholder="Enter username">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">New password</label>
                                      <input name="MatKhau" type="password" required class="form-control mb-0" id="exampleInputPassword1" placeholder="New password">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword2">Repeat password</label>
                                      <input name="Repeat_MatKhau" type="password" required class="form-control mb-0" id="exampleInputPassword2" placeholder="Repeat password">
                                  </div>
                                  <div class="sign-info text-center">
                                      <button type="submit" class="btn btn-white d-block w-100 mb-2">Reset Password</button>
                                      <span class="text-dark dark-color d-inline-block line-height-2"><a href="sign-in.php" class="text-white">Sign in</a></span>
                                      <div class="sign-in-border"></div>
                                      <span class="text-dark dark-color d-inline-block line-height-2"><a href="sign-up.php" class="text-white">Sign up</a></span>
                                  </div>
                              </form>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- Sign in END -->
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
      <!-- lottie JavaScript -->
      <script src="js/lottie.js"></script>
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
      <!-- Style Customizer -->
      <script src="js/style-customizer.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="js/custom.js"></script>
      <script>
        function toast({
            title = '',
            message ='',
            type = ``,
            execute = ``,
            duration = ``
        }){
            const main = document.getElementById(`toast`);
            if(main){
                const toast = document.createElement(`div`);
                const autoRemove = setTimeout(function() {
                    main.removeChild(toast);
                }, duration + execute);

                toast.onclick = function(event){
                    if(event.target.closest(`.message__close`)){
                        main.removeChild(toast);
                        clearTimeout(autoRemove);
                    }
                }
                const icons = {
                    success: `fa-solid fa-circle-check`,
                    info: `fa-solid fa-circle-info`,
                    warning: `fa-solid fa-circle-exclamation`,
                };
                const icon = icons[type];
                const delay = (duration / 1000).toFixed(2);
                const fade = (execute / 1000).toFixed(2);
                toast.classList.add(`messages`, `message__icon--${type}`);
                toast.style.animation = `fadeIn 0.5s ease, fadeOut linear ${fade}s ${delay}s forwards`;
                toast.innerHTML = `
                <p class="message__icon ${icon}"></p>
                <div class="message__text">
                    <h4 class="message__text__heading">${title}</h4>
                    <p class="message__text__description">${message}</p>
                </div>
                <button class="message__close fa-solid fa-xmark"></button>
                `;
                main.appendChild(toast);
            }
        }
        function showWarningToast(error) {
            toast({
                title: 'Wrong information',
                message: error,
                type: 'warning',
                execute: 1000,
                duration: 3000
            });
        }
    </script>
   </body>
</html>
