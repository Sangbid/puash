<?php
error_reporting(0);
session_start();
include('../include/config.php');

if(isset($_POST['submit'])){
  if(isset($_GET['token'])){
    $token = $_GET['token'];

$newpassword=$_POST['password'];
$cpassword=$_POST['cpassword'];

if($newpassword === $cpassword){
  $updatequery = " UPDATE doctors set password='$newpassword' where token='$token' ";
  $query = mysqli_query($con, $updatequery);

  if($query){
      $_SESSION['cmsg'] = "Password Reset Successfully! Now You Can Login.";
      header('location: ../sign-in-up.php');
    }
  else {
    $_SESSION['errmsg'] = "Password is not updated.";
  }
  }else {
    $_SESSION['errmsg'] = "Password are not matching.";
  }
}else {
  $_SESSION['errmsg'] = "No token found.";
}
}
 ?>

 <!DOCTYPE html>
 <html lang="en">
 	<head>
 		<title>Reset Pass</title>
 		<meta charset="utf-8" />
 		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
 		<meta name="apple-mobile-web-app-capable" content="yes">
 		<meta name="apple-mobile-web-app-status-bar-style" content="black">
 		<meta content="" name="description" />
 		<meta content="" name="author" />
 		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
 		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
 		<link rel="stylesheet" href="../vendor/fontawesome/css/font-awesome.min.css">
 		<link rel="stylesheet" href="../vendor/themify-icons/themify-icons.min.css">
 		<link href="../vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
 		<link href="../vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
 		<link href="../vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
 		<link rel="stylesheet" href="../assets/css/styles.css">
 		<link rel="stylesheet" href="../assets/css/plugins.css">
 		<link rel="stylesheet" href="../assets/css/themes/theme-1.css" id="skin_color" />

     <style>
     .margin-top-30{
       background-color: #70db70;
       display: block;
       text-align: center;
        }
     </style>
 	</head>

 	<body class="login" style=" background-color:#e0e0d1;margin-top:2px;">
 		<div class="row">
 			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
 				<div class="logo margin-top-30">
 				<h2 style=" color:white; 	padding: 15px; font-weight: 900;"><a href="../../../sign-in-up.html">PUASH <br></a> Reset password</h2>
 				</div>

 				<div class="box-login" style="outline:#4CAF50 solid 2px;">
 					<form class="form-login" autocomplete="off" method="post">
 						<fieldset>
 							<legend>
 								Fill up the form
 							</legend>
 							<p>
 								Please enter your new Password.<br />
 								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
 							</p>
              <div class="form-group ">
								<span class="input-icon">
									<input type="password" class="form-control password" id="password" value="" name="password" placeholder="Set Password" minlength="6" title="Must contain at least 6 or more characters" required>
									<i class="fa fa-lock"></i> </span> <br>
									<span class="input-icon">
										<input type="password" class="form-control password" id="cpassword" value="" name="cpassword" placeholder="Confirm Password" minlength="6" title="Must contain at least 6 or more characters" required>
										<i class="fa fa-lock"></i> </span> <i style="font-size:12px;">Must contain at least 6 or more characters in password.</i>
									<br><input type="checkbox" onclick="passShow()">Show Password
							</div>
               <a href="../index.php">
                 Cancle
               </a>

 								<button type="submit" class="btn btn-primary pull-right" name="submit">
 									Update password <i class="fa fa-arrow-circle-right"></i>
 								</button>
 							</div>




 						</fieldset>
 					</form>

 					<div class="copyright">
 						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> PUASH</span>. <span>All rights reserved</span>
 					</div>

 				</div>

 			</div>
 		</div>
 		<script src="../vendor/jquery/jquery.min.js"></script>
 		<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
 		<script src="../vendor/modernizr/modernizr.js"></script>
 		<script src="../vendor/jquery-cookie/jquery.cookie.js"></script>
 		<script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
 		<script src="../vendor/switchery/switchery.min.js"></script>
 		<script src="../vendor/jquery-validation/jquery.validate.min.js"></script>

 		<script src="../assets/js/main.js"></script>

 		<script src="../assets/js/login.js"></script>

    <script>
    function passShow() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    	var y = document.getElementById("cpassword");
      if (y.type === "password") {
        y.type = "text";
      } else {
        y.type = "password";
      }
    }
    </script>

 		<script>
     if ( window.history.replaceState ) {
         window.history.replaceState( null, null, window.location.href );
     }
 </script>

 	</body>
 	<!-- end: BODY -->
 </html>
