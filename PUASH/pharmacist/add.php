<?php
session_start();
//error_reporting(0);
include('../../include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
$mname=$_POST['mname'];
$mcat=$_POST['mcat'];
$sts=$_POST['sts'];
$description=$_POST['description'];
$sql=mysqli_query($con,"insert into medicine(name,CompanyName,status,description,p_id) values('$mname','$mcat','$sts','$description','".$_SESSION['id']."')");
if($sql)
{
	$msg="Your Profile updated Successfully";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pharmacist | Add Medicine</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../vendor/fontawesome/css/font-awesome.min.css">
		<link href="../../vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="../../assets/css/styles.css">
		<link rel="stylesheet" href="../../assets/css/plugins.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="include/sidebar-menu.css">

		<style> 
			body{
				padding: 0;
				margin: 0;
				background: #607d8b;
				}
				#red-reset{
				border: 2px solid red !important;
				color: red;
				}
				#red-reset:hover{
					background: #FF5252 !important;
					color: white !important;
				}
				#green-submit{
					border: 2px solid green !important;
					color: green !important;
				}
				#green-submit:hover{
					background: limegreen !important;
					color: white !important;
				}
				.panel-title{
					color: #00BCD4 !important;
					font-size: 20px !important;
				}
		</style>
	</head>
	<body>
		<div id="app">
	<?php include('include/sidebar-menu.php');?>
			<div class="app-content">

				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title" style="border-bottom:2px solid black; background-color:#673AB7;">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle" style="color: floralwhite"><b>Add Medicine</b></h1>
								</div>
								
							</div>
						</section>

							<div class="row">
								<div class="col-md-12">

									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<h5 style="color: green; font-size:18px; ">
											<?php if($msg) { echo htmlentities($msg);}?> </h5>
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Add Medicine</h5>
												</div>
												<div class="panel-body">

	<form role="form" name="addnur" autocomplete="off" method="post" onSubmit="return valid();">

        <div class="form-group">
							<label for="mname" style="color: black; font-size: 15px"> Medicine Name </label><span style="color:red; font-size:18px;">*</span>
					<input type="text" name="mname" class="form-control"  placeholder="Enter Medicine Name" required>
														</div>

<div class="form-group">
			<label for="fess" style="color: black; font-size: 15px"> Company Name </label><span style="color:red; font-size:18px;">*</span>
			<input type="text" name="mcat" class="form-control" placeholder="Company Name" required>
														</div>

<div class="form-group">
				<label for="sts" style="color: black; font-size: 15px"> Status </label><span style="color:red; font-size:18px;">*</span>
				<input type="number" name="sts" class="form-control" placeholder="How Much Quantity?" required>
</div>

<div class="form-group">
					<label for="description" style="color: black; font-size: 15px"> Medicine Description	</label> <br>
					<?php $data = file_get_contents("verbatim.txt");?>
					<textarea id="text" name="description" cols="33" rows="4" placeholder="Describe about the medicine..."><?php echo htmlentities($data); ?></textarea>
	</div>


														<button type="reset"class="btn btn-o btn-primary" id="red-reset"><span>Reset</span> </button>
														<span><button type="submit" name="submit" class="btn btn-o btn-primary" id="green-submit">
															Submit
														</button></span>
													</form>
												</div>
											</div>
										</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br><br><br><br>

			<!-- start: FOOTER -->
	<?php include('../../include/footer.php');?>
			<!-- end: FOOTER -->

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

		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<!-- <script type="text/javascript">
		function noti(){
		 if(document.addnur.mname.value=="" || document.addnur.mcat.value=="" || document.addnur.sts.value=="")
			{
			swal("Sorry!","Please fillup all required fields !!", "error");
			return false;
			}
			else {
				alert("Medicine added Successfully !");
				return true;
			}
		}
		</script> -->
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
		<script type="text/javascript">
		if ( window.history.replaceState ) {
					 window.history.replaceState( null, null, window.location.href );
			 }
		</script>
	</body>
</html>
