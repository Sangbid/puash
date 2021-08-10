<?php
session_start();
error_reporting(0);
include("../../include/config.php");

if(isset($_POST['submit']))
{
$search=mysqli_query($con,"SELECT * FROM users WHERE uniqueid='".$_POST['uniqueid']."'");
$count=mysqli_fetch_array($search);
if ($count>0) {
mysqli_query($con,"UPDATE users SET activation='on' WHERE uniqueid='".$_POST['uniqueid']."'");
$ret=mysqli_query($con,"SELECT * FROM users WHERE uniqueid='".$_POST['uniqueid']."' and password='".$_POST['password']."'");
$num=mysqli_fetch_array($ret);
if($num>0){
$extra="dashboard.php";//
$_SESSION['login']=$num['fullname'];
$_SESSION['patid']=$num['id'];
$_SESSION['id']=$num['id'];
$_SESSION['u_id']=$num['uniqueid'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
// For stroing log if user login successfull
$log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
	// For stroing log if user login unsuccessfull
$_SESSION['login']=$num['fullname'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$_SESSION['errmsg']="Invalid password";
$extra="user-login.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}else {
	$_SESSION['errmsg']="Invalid Unique Id";
}
}
//}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User-Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../vendor/themify-icons/themify-icons.min.css">
		<link href="../../vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="../../assets/css/styles.css">
		<link rel="stylesheet" href="../../assets/css/plugins.css">
		<link rel="stylesheet" href="../../assets/css/themes/theme-1.css" id="skin_color" />

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
			<h2 style="color:white; 	padding: 15px; font-weight: 900;"><a href="../../index.html">PUASH <br></a> Patient Login</h2>
				</div>

				<div class="box-login" style="outline: #4CAF50 solid 2px;">
					<form class="form-login" method="post">
						<fieldset>
							<legend>
								Sign in to your account
							</legend>
							<p style="color:white; background-color:green; text-align:center; width:60%;"> <span><?php echo $_SESSION['cmsg']; ?><?php echo $_SESSION['cmsg']="";?></span></p>
							<p>
								Please enter your Unique Id and password to log in.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="uniqueid" placeholder="Unique Id">
									<i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control password" name="password" placeholder="Password">
									<i class="fa fa-lock"></i>
									 </span>
							</div>
							<div class="form-actions">
									<a href="forget-pass.php">Forget password?</a>

								<button type="submit" class="btn btn-primary pull-right" name="submit">
									Login <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
							<div class="new-account">
								Don't have an account yet?
								<a href="registration.php">
									Create an account
								</a>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> PUASH</span>. <span>All rights reserved</span>
					</div>

				</div>

			</div>
		</div>
		<script src="../../vendor/jquery/jquery.min.js"></script>
		<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../../vendor/modernizr/modernizr.js"></script>
		<script src="../../vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="../../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="../../vendor/switchery/switchery.min.js"></script>
		<script src="../../vendor/jquery-validation/jquery.validate.min.js"></script>

		<script src="../../assets/js/main.js"></script>

		<script src="../../assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		<script>
		if ( window.history.replaceState ) {
				window.history.replaceState( null, null, window.location.href );
		}
		</script>

	</body>
	<!-- end: BODY -->
</html>
