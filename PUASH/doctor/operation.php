<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{	$id=$_POST['id'];
$issue=$_POST['issue'];

$pp=$_POST['appdate'];
$user=$_POST['user'];
$dd=$_POST["dd"];

$sql=mysqli_query($con,"insert into operation(p_id,issue,date,cost,d_id) values('$id','$issue','$pp','$dd','$user')");
if($sql)
{
echo "<script>alert('Operation Booked Successfully');</script>";


}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor | Operation Report</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="../../assets/css/styles.css">
		<link rel="stylesheet" href="../../assets/css/plugins.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="include/sidebar-menu.css">

		<style>
			body{
				padding: 0;
				margin: 0;
				background: #607D8B;
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
		<script>
			function getid(val) {
				$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data:'pp='+val,
				success: function(data){
					$("#user").html(data);
				}
				});
			}
		</script>
	</head>
	<body>
		<div id="app">

			<?php include('include/sidebar-menu.php');?>
			<div class="app-content">

				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title" style="border-bottom:2px solid black; background-color: #673ab7">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle" style="color: floralwhite"><b>Operation Report</b></h1>
								</div>
								
							</div>
						</section>

							<div class="row">
								<div class="col-md-12">

									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Create Operation</h5>
												</div>
												<div class="panel-body">
									<?php $sql=mysqli_query($con,"select * from doctors where docEmail='".$_SESSION['dlogin']."'");
while($data=mysqli_fetch_array($sql))
{
?>
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="doctorname"  style="color: black; font-size: 15px">
																Patient ID
															</label>
							<select name="id" class="form-control" required="required">
																<label for="doctorname">
																Patient ID
															</label>
<?php $ret=mysqli_query($con,"select * from users");
while($row=mysqli_fetch_array($ret))
{
?>
																<option value="<?php echo htmlentities($row['id']);?>">
																	<?php echo htmlentities($row['id']);?>
																</option>
																<?php } ?>

															</select>
														</div>
														<div class="form-group">
															<label for="pp" style="color: black; font-size: 15px">
																Report Name
															</label>
							<input name="issue" class="form-control" id="issue"  required="required">




														</div>
														<div class="form-group">
															<label for="AppointmentDate"  style="color: black; font-size: 15px">
																Date
															</label>
<input class="form-control datepicker" name="appdate"  required="required" data-date-format="yyyy-mm-dd">

														</div>





<div class="form-group">
															<label for="dd"  style="color: black; font-size: 15px">
																 Medicines
															</label>
					<input name="dd" class="form-control"  placeholder="Enter Medicine">
														</div>

<div class="form-group">
									<label for="fess"  style="color: black; font-size: 15px">
																 Doctor Email
															</label>
					<input type="id" name="user" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['id']);?>">
														</div>

<?php } ?>


														<button type="submit" name="submit" class="btn btn-o btn-primary" id="green-submit">
															Submit
														</button>
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
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
