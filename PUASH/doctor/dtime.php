<?php
session_start();
error_reporting(0);
include('../../include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['sat'])){
$st=$_POST['sats'];
$et=$_POST['sate'];
$sql=mysqli_query($con,"Update doctors set sat='1.$st 2.$et' where id='".$_SESSION['id']."'");
if($sql){
$_SESSION['upmsg']="Your Time updated Successfully";
header("location:dtime.php");}}

if(isset($_POST['sun'])){
$st=$_POST['suns'];
$et=$_POST['sune'];
$sql=mysqli_query($con,"Update doctors set sun='1.$st 2.$et' where id='".$_SESSION['id']."'");
if($sql){
$_SESSION['upmsg']="Your Time updated Successfully";
header("location:dtime.php");}}

if(isset($_POST['mon'])){
$st=$_POST['mons'];
$et=$_POST['mone'];
$sql=mysqli_query($con,"Update doctors set mon='1.$st 2.$et' where id='".$_SESSION['id']."'");
if($sql){
$_SESSION['upmsg']="Your Time updated Successfully";
header("location:dtime.php");}}

if(isset($_POST['tue'])){
$st=$_POST['tues'];
$et=$_POST['tuee'];
$sql=mysqli_query($con,"Update doctors set tue='1.$st 2.$et' where id='".$_SESSION['id']."'");
if($sql){
$_SESSION['upmsg']="Your Time updated Successfully";
header("location:dtime.php");}}

if(isset($_POST['wed'])){
$st=$_POST['weds'];
$et=$_POST['wede'];
$sql=mysqli_query($con,"Update doctors set wed='1.$st 2.$et' where id='".$_SESSION['id']."'");
if($sql){
$_SESSION['upmsg']="Your Time updated Successfully";
header("location:dtime.php");}}

if(isset($_POST['thu'])){
$st=$_POST['thus'];
$et=$_POST['thue'];
$sql=mysqli_query($con,"Update doctors set thu='1.$st 2.$et' where id='".$_SESSION['id']."'");
if($sql){
$_SESSION['upmsg']="Your Time updated Successfully";
header("location:dtime.php");}}

if(isset($_POST['fri'])){
$st=$_POST['fris'];
$et=$_POST['frie'];
$sql=mysqli_query($con,"Update doctors set fri='1.$st 2.$et' where id='".$_SESSION['id']."'");
if($sql){
$_SESSION['upmsg']="Your Time updated Successfully";
header("location:dtime.php");}}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor Profile</title>
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
    	<link rel="stylesheet" href="doc.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="include/sidebar-menu.css">

	</head>
  <style media="screen">
    .day{
      font-size: 18px;
      color: Red;
      font-weight: bold;
      margin-top: 5px;
      margin-left: -25%
    }
  </style>
	<body>
		<div id="app">
<?php include('include/sidebar-menu.php');?>
			<div class="app-content">



				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title" style="border-bottom:1px solid #4d79ff; background-color:#d6f5d6;margin-top:-8px;">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle"> My Time</h1>
																	</div>
								<a class="breadcrumb" href="my-profile.php"><button type="button" name="button" class="mypro"><i class="fa fa-user-circle-o"></i></button> <br><br> <br><span class="mypro1">My Profile</span> </a>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">

									<div class="row margin-top-30">

<div class="center">
<label class="pro-label">Time:</label>

<div class="">
	<h1 class="day">Sat</h1>
		<div class="sat tabShow">
      <form  method="post">
			Start:&nbsp;<label class="pro-label2"> <input type="time" name="sats" value=""> </label>&nbsp;&nbsp; End:&nbsp;<label class="pro-label2"> <input type="time" name="sate" value=""> </label>
			<button type="submit" class="btn" name="sat">Update</button> <br>
      </form>
		</div>

    <h1 class="day">Sun</h1>
		<div class="sun tabShow">
      <form  method="post">
			Start:&nbsp;<label class="pro-label2"> <input type="time" name="suns" value=""> </label>&nbsp;&nbsp; End:&nbsp;<label class="pro-label2"> <input type="time" name="sune" value=""> </label>
			<button type="submit" class="btn" name="sun">Update</button> <br>
      </form>
		</div>

    <h1 class="day">Mon</h1>
		<div class="mon tabShow">
      <form  method="post">
      Start:&nbsp;<label class="pro-label2"> <input type="time" name="mons" value=""> </label>&nbsp;&nbsp; End:&nbsp;<label class="pro-label2"> <input type="time" name="mone" value=""> </label>
      <button type="submit" class="btn" name="mon">Update</button> <br>
      </form>
		</div>

    <h1 class="day">Tue</h1>
		<div class="tue tabShow">
      <form  method="post">
      Start:&nbsp;<label class="pro-label2"> <input type="time" name="tues" value=""> </label>&nbsp;&nbsp; End:&nbsp;<label class="pro-label2"> <input type="time" name="tuee" value=""> </label>
      <button type="submit" class="btn" name="tue">Update</button> <br>
      </form>
		</div>

    <h1 class="day">Wed</h1>
		<div class="wed tabShow">
      <form  method="post">
      Start:&nbsp;<label class="pro-label2"> <input type="time" name="weds" value=""> </label>&nbsp;&nbsp; End:&nbsp;<label class="pro-label2"> <input type="time" name="wede" value=""> </label>
      <button type="submit" class="btn" name="wed">Update</button> <br>
      </form>
		</div>

    <h1 class="day">Thu</h1>
		<div class="thu tabShow">
      <form  method="post">
			Start:&nbsp;<label class="pro-label2"> <input type="time" name="thus" value="<?php ?>"> </label>&nbsp;&nbsp; End:&nbsp;<label class="pro-label2"> <input type="time" name="thue" value=""> </label>
			<button type="submit" class="btn" name="thu">Update</button> <br>
      </form>
		</div>

    <h1 class="day">Fri</h1>
		<div class="fri tabShow">
      <form  method="post">
			Start:&nbsp;<label class="pro-label2"> <input type="time" name="fris" value=""> </label>&nbsp;&nbsp; End:&nbsp;<label class="pro-label2"> <input type="time" name="frie" value=""> </label>
			<button type="submit" class="btn" name="fri">Update</button> <br>
      </form>
		</div>

</div>
</div>


												</div>
											</div>
										</div>

											</div>
										</div>
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">


											</div>



						<!-- end: BASIC EXAMPLE -->






						<!-- end: SELECT BOXES -->

					</div>
				</div>
			</div>
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
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->


	</body>
</html>
