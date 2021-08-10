<?php
error_reporting(0);
include_once('../../include/config.php');

if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$blood_group=$_POST['blood_group'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$dob=$_POST['birthdate'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];

if($password === $cpassword){
	$uniqueid = explode(" ",$fname)[0]."_".substr(rand(),0,4);

$query=mysqli_query($con,"insert into users(fullname,address,city,gender,email,blood_group,phone,password,birthdate,uniqueid) values('$fname','$address','$city','$gender','$email','$blood_group','$phone','$password','$dob','$uniqueid')");
if($query)
{
	// $last_id= mysqli_insert_id($con);
//	$up=mysqli_query($con,"UPDATE users Set uniqueid='".$uniqueid."' where id = '".$last_id."'");

	$subject = "Unique Id";
	$body = "Hi, $fname. Your Unique Id is $uniqueid
	Now you can login whith this unique Id.
	http://localhost/puash/PUASH/user-login.php";
	$sender_email = "From: puash.bd@gmail.com";

	if (mail($email, $subject, $body, $sender_email)) {
		//	$_SESSION['errsmsg'] = "Successfully Registered. You can login now with your unique id of $uniqueid";
		//	header("location:user-login.php");
		echo "<script>alert('Successfully Registered. Please check your email: $email to get Unique Id.');window.location='user-login.php'</script>";
	} else {
		$_SESSION['errmsg'] = "Email sending failed.";
	}
}else {
	$_SESSION['errmsg'] = "faild to registration.";
	}
} else {
	$_SESSION['errpmsg'] = "Password and Confirm password are not matched";
}
}
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>User Registration</title>
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
		<link href="../../vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="../../assets/css/plugins.css">
		<link rel="stylesheet" href="../../assets/css/themes/theme-1.css" id="skin_color" />
		<link rel="stylesheet" href="../../assets/css/styles.css">


		<style>
		.margin-top-30{
			background-color: #70db70;
			display: block;
			text-align: center;
       }
		}
		</style>

	</head>

	<body class="login" style="background-color:#e0e0d1; margin-top:2px;">
		<!-- start: REGISTRATION -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<h2 style="color:white; 	padding: 15px; font-weight: 900;"><a href="../../index.html">PUASH <br></a> Patient Registration</h2>
				</div>
				<!-- start: REGISTER BOX -->
				<div class="box-register" style="outline: #4CAF50 solid 2px;">
					<form name="registration" id="registration"  method="post">
						<fieldset>
							<legend>
								Sign Up
							</legend>
							<p>
								Enter your personal details below:
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>
							<div class="form-group">
								<input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="address" placeholder="Address" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="city" placeholder="City" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="blood_group" placeholder="Blood group">
							</div>

							<div class="form-group">
								<label class="block">
									Gender
								</label>
								<div class="clip-radio radio-primary" required>
									<input type="radio" id="rg-female" name="gender" value="female" >
									<label for="rg-female">
										Female
									</label>
									<input type="radio" id="rg-male" name="gender" value="male">
									<label for="rg-male">
										Male
									</label>
									<input type="radio" id="rg-other" name="gender" value="other">
									<label for="rg-other">
										Other
									</label>
								</div>
							</div>

							<div class="form-group">
								<i style="font-size:12px;">Date of birth</i>
								<span class="input-icon">
								<input type="text" id="datepicker" class="form-control datepicker" name="birthdate"  required="required" placeholder="dd/mm/yyyy">
									</span>
							</div>


							<p>
								Enter your account details below:
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" id="email"  placeholder="Email" required>
									<i class="fa fa-envelope"></i> </span>
									 <span id="" style="font-size:12px;"></span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="number" class="form-control" name="phone" id="phone" onBlur="userAvailability()" placeholder="Mobile_Number" required>
									<i class="fa fa-phone"></i> </span>
							</div>

							<div class="form-group ">
								<span style="color:red;"><?php echo $_SESSION['errpmsg']; ?><?php echo $_SESSION['errpmsg']="";?></span>
								<span class="input-icon">
									<input type="password" class="form-control password" id="password" value="" name="password" placeholder="Set Password" minlength="6" title="Must contain at least 6 or more characters" required>
									<i class="fa fa-lock"></i> </span> <br>
									<span class="input-icon">
										<input type="password" class="form-control password" id="cpassword" value="" name="cpassword" placeholder="Confirm Password" minlength="6" title="Must contain at least 6 or more characters" required>
										<i class="fa fa-lock"></i> </span> <i style="font-size:12px;">Must contain at least 6 or more characters in password.</i>
									 <br><input type="checkbox" onclick="passShow()">Show Password
							</div>
							<div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree">
									<label for="agree">
										I agree
									</label>
								</div>
							</div>
							<div class="form-actions">
								<p>
									Already have an account?
									<a href="user-login.php">
										Log-in
									</a>
								</p>

									<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
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
		<script src="../../vendor/jquery/jquery.min.js"></script>
		<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../../vendor/modernizr/modernizr.js"></script>
		<script src="../../vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="../../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="../../vendor/switchery/switchery.min.js"></script>

	  <script src="../../vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="../../vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

		<script src="../../assets/js/main.js"></script>
		<script src="../../assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>

<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
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
	jQuery(document).ready(function() {
		$('#datepicker').datepicker({
	format: 'dd-mm-yyyy',
	changeMonth: true,
	changeYear:true
	});
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
