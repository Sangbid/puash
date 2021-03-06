<?php
include_once('../../include/config.php');

if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$licence=$_POST['licence_number'];
$email=$_POST['email'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$gender=$_POST['gender'];
$shop_address=$_POST['shop_address'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];

$token = bin2hex(random_bytes(15));

if($password === $cpassword){
$query=mysqli_query($con,"insert into pharmacist(name,licence_number,email,address,shop_address,contact,gender,password,token,status) values('$fname','$licence','$email','$address','$shop_address','$contact','$gender','$password','$token','inactive')");
if($query)
{
	$subject = "Email Activation";
	$body = "Hi, $fname. Click here to activate your account
	http://localhost/puash/PUASH/pharmacist/include/activate.php?token=$token";
	$sender_email = "From: puash.bd@gmail.com";

	if (mail($email, $subject, $body, $sender_email)) {
		echo "<script>alert('Successfull..! Check your mail $email to active your account.');window.location='phlogin.php'</script>";
	} else {
	    echo "Email sending failed...";
	}
		//header('location:user-login.php');
}
}else {
	echo "<script>alert('Password are not matching');</script>";
}
}
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Pharmacist Registration</title>
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
		}
		</style>
	</head>

	<body class="login" style="background-color:#e0e0d1; margin-top:2px;">
		<!-- start: REGISTRATION -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<h2 style="color:white; 	padding: 15px; font-weight: 900;"><a href="../../index.html">PUASH <br></a> Pharmacist Registration</h2>
				</div>
				<!-- start: REGISTER BOX -->
				<div class="box-register" style="outline: #4CAF50 solid 2px;">
					<form name="registration" autocomplete="off" id="registration" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  method="post">
						<fieldset>
							<legend>
								Sign Up
							</legend>
							<p>
								Enter your personal details below:
							</p>
							<div class="form-group">
								<input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="licence_number" placeholder="Licence Number" required>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" id="email"  placeholder="Enter Your Email" onBlur="userAvailability()" required>
									<i class="fa fa-envelope"></i> </span>
									<span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							<div class="form-group">
								<span class="input-icon">
								<input type="text" class="form-control" name="address" placeholder="Address" required>
								<i class="fa fa-home"></i> </span>
								 <span id="" style="font-size:12px;"></span>
						</div>
						<div class="form-group">
							<span class="input-icon">
							<input type="text" class="form-control" name="shop_address" placeholder="Shop Address" required>
							<i class="fa fa-home"></i> </span>
							 <span id="" style="font-size:12px;"></span>
					</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="number" class="form-control" name="contact" id="phone" placeholder="Mobile_Number" required>
									<i class="fa fa-phone"></i> </span>
							</div>

							<div class="form-group">
								<label class="block">
									Gender
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-female" name="gender" value="female" >
									<label for="rg-female">
										Female
									</label>
									<input type="radio" id="rg-male" name="gender" value="male">
									<label for="rg-male">
										Male
									</label>
									<input type="radio" id="rg-other" name="gender" value="Other">
									<label for="rg-other">
										Other
									</label>
								</div>
							</div>

							<div class="form-group ">
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
		   					<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button> <br>

								<p>
									Already have an account?
									<a href="phlogin.php">
										Log-in
									</a>
								</p>
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
if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
}
</script>

	</body>
	<!-- end: BODY -->
</html>
