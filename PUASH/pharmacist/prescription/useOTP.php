<?php
session_start();
//error_reporting(0);
include('../../../include/config.php');
include("../include/if-session-set.php");
include('../include/checklogin.php');
check_login();
date_default_timezone_set('Asia/Dhaka');
$up_date=date( 'd-m-Y h:i:s A', time () );

$val=0;
$up=mysqli_query($con,"UPDATE patientcode set value='$val' WHERE ph_id= '".$_SESSION['id']."'");

$uniqueid= $_GET['uniqueid'];

$emailph = mysqli_query($con,"SELECT * FROM pharmacist WHERE id='".$_SESSION['id']."'");
$row1=mysqli_fetch_array($emailph);
$phemail=$row1['email'];

if(isset($_POST['submit']))
{
  $otp=$_POST['otp'];
$codeTable = mysqli_query($con,"SELECT * FROM patientcode WHERE pat_uid='$uniqueid'");
$row=mysqli_fetch_array($codeTable);
$ucode=$row['ucode'];
if($row>0){

		if($ucode == $otp){
			// $query=mysqli_query($con,"UPDATE patientcode set (ph_id,ph_email,ucode) values('".$_SESSION['id']."','$phemail','$ucode') WHERE pat_uid='$uniqueid'");
      $value=1;
    	$up=mysqli_query($con,"UPDATE patientcode set ph_id='".$_SESSION['id']."', ph_email='$phemail', value='$value' WHERE pat_uid= '$uniqueid' ");
    if($up){
		header("location:pat_files.php?uniqueid=$uniqueid");}
  }
				else{$_SESSION['errmsg']="OTP is wrong!";}

	}else{$_SESSION['errmsg']="Not exist! Entry first!";}
}

//header("location:../patient-prescription.php");}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pharmacist  | Dashboard</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../../vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../../vendor/themify-icons/themify-icons.min.css">
		<link href="../../../vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="../../../vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="../../../vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="../../../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="../../../vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="../../../vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="../../../vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="../../../assets/css/styles.css">
		<link rel="stylesheet" href="../../../assets/css/plugins.css">
		<link rel="stylesheet" href="../../../assets/css/themes/theme-1.css" id="skin_color" />


	</head>
	<body>
		<div id="app">
<?php include('sidebar.php');?>
			<div class="app-content">

						<?php include('header.php');?>

				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title" style="border-bottom:1px solid #4d79ff; background-color:#d6f5d6;">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Pharmacist| Dashboard</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Pharmacist</span>
									</li>
									<li class="active">
										<span>Patient side</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
							<div class="container-fluid container-fullw bg-white">
							<div class="row">

                <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-2">


                <div class="box-login" style="outline:#4CAF50 solid 2px;">
        					<form class="form-login" autocomplete="off" method="post">
        						<fieldset>
        							<legend>
        								Fill up the form
        							</legend>
        							<p>
        								Please enter OTP here.<br />
        								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
        							</p>
        							<div class="form-group">
                        <span class="input-icon">
        									<input type="text" class="form-control" name="otp" placeholder=" Enter Patient's OTP" minlength="4" required>
        									<i class="" style="font-size:18px;color:green"></i> </span>
        							</div>
        								<button type="submit" class="btn btn-primary pull-right" name="submit">
        									Submit OTP <i class=""></i>
        								</button>
        							</div>
                    </div>



							</div>
						</div>
						<!-- end: SELECT BOXES -->

					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('../../include/footer.php');?>
			<!-- end: FOOTER -->


		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="../../../vendor/jquery/jquery.min.js"></script>
		<script src="../../../vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../../../vendor/modernizr/modernizr.js"></script>
		<script src="../../../vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="../../../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="../../../vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="../../../vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="../../../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="../../../vendor/autosize/autosize.min.js"></script>
		<script src="../../../vendor/selectFx/classie.js"></script>
		<script src="../../../vendor/selectFx/selectFx.js"></script>
		<script src="../../../vendor/select2/select2.min.js"></script>
		<script src="../../../vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="../../../vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="../../../assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="../../../assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
		<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
	</body>
</html>
