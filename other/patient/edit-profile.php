<?php
session_start();
//error_reporting(0);
include('../../include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$address=$_POST['address'];
$city=$_POST['city'];
$blood_group=$_POST['blood_group'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$sql=mysqli_query($con,"Update users set fullName='$fname',address='$address',city='$city',gender='$gender',email ='$email',blood_group='$blood_group',phone='$phone' where id='".$_SESSION['id']."'");
if($sql)
{
$_SESSION['upmsg']="Your Profile updated Successfully";
header("location:my-profile.php");
}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User | Edit Profile</title>
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
		<link href="../../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="../../assets/css/styles.css">
		<link rel="stylesheet" href="../../assets/css/plugins.css">
		<link rel="stylesheet" href="../../assets/css/themes/theme-1.css" id="skin_color" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<style media="screen">
			.mypro{
				color:black; width:50px; font-size: 30px; float:right;margin-right:25px; border-radius: 50%;
			}
			.mypro1{
				color:black; font-size: 14px; float:right; margin-right:8px;
			}
		</style>
	</head>
	<body>
		<div id="app">
<?php include('include/sidebar.php');?>
			<div class="app-content">

						<?php include('include/header.php');?>

				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title" style="border-bottom:1px solid #4d79ff; background-color:#d6f5d6;margin-top:-8px;">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">User | Edit Profile</h1>
																	</div>
								<a class="breadcrumb" href="my-profile.php"><button type="button" name="button" class="mypro"><i class="fa fa-user-circle-o"></i></button> <br><br> <br><span class="mypro1">Go to My Profile</span> </a>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
<h5 style="color: green; font-size:18px; ">
<?php if($msg) { echo htmlentities($msg);}?> </h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Edit Profile</h5>
												</div>
												<div class="panel-body">
									<?php
$sql=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($data=mysqli_fetch_array($sql))
{
?>

			<form role="form" name="edit" method="post">


									<div class="form-group">
												<label for="fname">
													 User Name
													</label>
										<input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['fullname']);?>" readonly>
											</div>

						    	<div class="form-group">
											<label for="mail">
														Email
												</label>
								<input type="email" name="email" class="form-control" value="<?php echo htmlentities($data['email']);?>" readonly>
							   			</div>

											<div class="form-group">
													<label for="phone">
																Mobile_Number
														</label>
										<input type="number" name="phone" class="form-control" value="<?php echo htmlentities($data['phone']);?>">
									   			</div>
						 	<div class="form-group">
									<label for="blood">
						   			Blood Group
									</label>
										<input type="text" name="blood_group" class="form-control" value="<?php echo htmlentities($data['blood_group']);?>" >
						  	</div>

														<div class="form-group">
															<label class="block">
																Gender
														</label>
														<div class="clip-radio radio-primary" >
														<input type="radio" id="rg-female" name="gender" value="female" <?php if($data['gender'] == "female") echo "checked";?>>
														<label for="rg-female">
																Female
															</label>
														<input type="radio" id="rg-male" name="gender" value="male" <?php if($data['gender'] == "male") echo "checked";?>>
														<label for="rg-male">
																Male
															</label>
														<input type="radio" id="rg-other" name="gender" value="other" <?php if($data['gender'] =="other") echo "checked";?>>
															<label for="rg-other">
															Other
														</label>
														</div>
														</div>

														<div class="form-group">
																		<label for="city">
																			City
																		</label>
																		<input type="text" name="city" class="form-control" required="required"  value="<?php echo htmlentities($data['city']);?>" >
																</div>

													<div class="form-group">
																	<label for="address">
																		 Address
																</label>
														<textarea name="address" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
													</div>


														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
														</button>
													</form>
													<?php } ?>
												</div>
											</div>
										</div>

											</div>
										</div>
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">


											</div>
										</div>
									</div>
								</div>

						<!-- end: BASIC EXAMPLE -->






						<!-- end: SELECT BOXES -->

					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('../../include/footer.php');?>
			<!-- end: FOOTER -->

			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>

			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="../../vendor/jquery/jquery.min.js"></script>
		<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../../vendor/modernizr/modernizr.js"></script>
		<script src="../../vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="../../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="../../vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="../../vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="../../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="../../vendor/autosize/autosize.min.js"></script>
		<script src="../../vendor/selectFx/classie.js"></script>
		<script src="../../vendor/selectFx/selectFx.js"></script>
		<script src="../../vendor/select2/select2.min.js"></script>
		<script src="../../vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="../../vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="../../assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="../../assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>

		<script>
		if ( window.history.replaceState ) {
				window.history.replaceState( null, null, window.location.href );
		}
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
