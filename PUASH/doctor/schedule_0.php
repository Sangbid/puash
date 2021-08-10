<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$VALUE="";
if(isset($_POST['submit'])){
	$vanue=$_POST['venue'];
	$start=$_POST['s_time'];

	$end=$_POST['e_time'];

	$time=$_POST['p_time'];
	$visiblity=$_POST['visible'];
	$sql= mysqli_query($con,"insert into scheduled values('','$vanue','$start','$end','$time','$visiblity')");


	
	if(!empty($_POST['day'])) {
		foreach($_POST['day'] as $check) {
			if($VALUE==""){
				$VALUE= $check; 
			}
			else{
				$VALUE= $VALUE .",". $check; 
			}

				
		}
	}
}

?>



<!DOCTYPE html>
<html lang="en">
<html lang="en">
	<head>
	<title>Doctor </title>
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


		<style media="screen">
		 div#table_filter label::before{
				 content:"🔍 ";
				 font-size: 18px;
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
						<section id="page-title" style="border-bottom:1px solid #4d79ff; background-color:#eaeaec;">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Doctor | Schedule</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Doctor</span>
									</li>
									<li class="active">
										<span>Schedule</span>
									</li>
								</ol>
							</div>
                        </section>


												<div class="panel panel-default panel-form">
						<div class="panel-heading">
							<div class="panel-title">
								<h4>Add Schedule</h4>
							</div>
						</div>
						<div class="panel-body">
						<div class="portlet-body form">
						<form action="" class="form-horizontal" role="form" method="post" accept-charset="utf-8">
						<div class="form-body">
						<div class="form-group">
						<label class="col-md-3 control-label">Venue :</label>
						<div class="col-md-5">
						<select class="form-control v_name" name="venue" id="v_id">
						<option value="">--Select Venue--</option>
						<option value="Dhaka Medical College">Dhaka Medical College
						</option>
						<option value="Khanpur Medical">Khanpur Medical</option>
						<option value="Mirpur Medical">Mirpur Medical</option> </select>
						</div>
						</div>
						<div class="form-group">
						<label class="col-md-3 control-label"> <span class="text-danger">*</span>Day :</label>
						<div class="col-md-5">
						<div class="md-checkbox-inline">
						<input id="checkbox7" name="day[]" value="Monday" class="md-check" type="checkbox">
						<label for="checkbox7"> Monday </label>
						<input id="checkbox8" name="day[]" value="Tuesday" class="md-check" type="checkbox">
						<label for="checkbox8">Tuesday </label>
						<input id="checkbox9" name="day[]" value="Wednesday" class="md-check" type="checkbox">
						<label for="checkbox9"> Wednesday </label>
						<input id="checkbox10" name="day[]" value="Thursday" class="md-check" type="checkbox">
						<label for="checkbox10"> Thursday </label>
						<input id="checkbox11" name="day[]" value="Friday" class="md-check" type="checkbox">
						<label for="checkbox11">Friday </label>
						<input id="checkbox5" name="day[]" value="Saturday" class="md-check" type="checkbox">
						<label for="checkbox5">Saturday </label>
						<input id="checkbox6" name="day[]" value="Sunday" class="md-check" type="checkbox">
						<label for="checkbox6"> Sunday </label>
						</div>
						</div>
						</div>
						<div class="form-group erromsg">
						</div>
						<div class="form-group">
						<label class="col-md-3 control-label"><span class="text-danger">*</span>Set Time :</label>
						<div class="col-md-5">
						<div class="input-group  input-daterange">
						<div class="input-group ">
						<input type="time" class="form-control hasDatepicker" id="basic_example_1" autocomplete="off" placeholder="Start Time" name="s_time">
						<span class="input-group-addon">
						<span class="glyphicon glyphicon-time"></span>
						</span>
						</div>
						<span class="input-group-addon"> to </span>
						<div class="input-group ">
						<input type="time" class="form-control hasDatepicker" id="basic_example_2" autocomplete="off" placeholder="End Time" name="e_time">
						<span class="input-group-addon">
						<span class="glyphicon glyphicon-time"></span>
						</span>
						</div>
						</div>

						</div>
						</div>
						<div class="form-group">
						<label class="col-md-3 control-label"><span class="text-danger">*</span> Per Patient Time :</label>
						<div class="col-md-5">
						<div class=" input-daterange">
						<input type="number" name="p_time" class="form-control" autocomplete="off" placeholder="Set per patient time">
						<span class="help-block"> You can set only minute </span>
						</div>
						</div>
						</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Visibility :</label>
						<div class="col-md-5">
						<input type="radio" id="checkbox2_5" value="Yes" name="visible" class="md-radiobtn">
						<label for="checkbox2_5"> Yes </label>
						<input type="radio" id="checkbox2_10" value="No" name="visible" class="md-radiobtn">
						<label for="checkbox2_10"> No </label>
						</div>
						</div>
						</div>
						<div class="form-group row">
						<div class="col-sm-offset-3 col-sm-6">
							<button type="reset" class="btn btn-danger">Reset</button>
							<input type="Submit" class="btn btn-success" value="Submit" name="submit">
							
						</div>
						</div>
						</form>
						</div>
						
 </div>
</div>
</div>
</div>
</div>


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
