<?php
session_start();
//error_reporting(0);
include('../../include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
<head>
		<title>Patient | Dashboard</title>
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

				.patient-image{
					/* transform: translate(10%, 10%); */
					height: 100%;
					width: 100%;
					position: fixed;
				}

				.btn-01{
					display: inline-block;
					width: 90px;
					height: 90px;
					background: #f1f1f1;
					margin: 10px;
					border-radius: 30%;
					box-shadow: 0 5px 15px -5px #00000070;
					color: #3498db;
					overflow: hidden;
					position: relative;
				}

				.btn-01 i{
					line-height: 90px;
					font-size: 26px;
					transition: 0.2s linear;
				}

				.btn-01:hover i{
					transform: scale(1.3);
					color: #f1f1f1;
				}

				.statistic-box:hover{
					transform: translateY(-5px);
					transition: 0.6s;
				}

				.btn-01::before{
					content: "";
					position: absolute;
					width: 120%;
					height: 120%;
					background: #3498db;
					transform: rotate(45deg);
					left: -110%;
					top: 90%;
				}

				.btn-01:hover::before{
					animation: aaa 0.7s 1;
					top: -10%;
					left: -10%;
				}

				.naame:hover{
					color: black;
					transition: 0.6s;
					transform: translateY(-5px);
				}
				.patient-dash{
					background-image: url("patient-dash.png");
				}

				@keyframes aaa {
					0%{
						left: -110%;
						top: 90%;
					}50%{
						left: 10%;
						top: -30%;
					}100%{
						top: -10%;
						left: -10%;
					}
				}

				.panel{
					border-radius: 10% !important;
				}

				.panel.panel-white.no-radius.text-center:hover{
  					/* background:rgb(231, 245, 35); */
					background: #FFC107
				}
			</style>

	</head>
	<body>
		<div id="app">
<?php include('include/sidebar-menu.php');?>
			<div class="app-content">
				<!-- end: TOP NAVBAR -->
	
				<div class="main-content">
				<!-- <img src="patient.png" alt="" class="patient-image"> -->

					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title" class="patient-dash" style="border-bottom: 3px solid #212121;">
						<!-- background: #81F7F3 -->
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle"><b>Dashboard</b></h1>
								</div>
							</div>
                        </section> 
						<!-- end: PAGE TITLE -->
                        <!-- start: BASIC EXAMPLE -->
                        <br><br><br>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-white no-radius text-center">
                                <a href="my-profile.php">
                                    <div class="panel-body">
                                        <div class="statistic-box">
                                        <p class="links cl-effect-1">	
										</p>
                                            
												<a class="btn-01" href="my-profile.php">
													<i class="fa fa-user"></i>
												</a>
												<a href="my-profile.php"><h3 class="naame">Profile</h3></a>
                                            <div class="sparkline1 text-center"></div>
                                        </div>
                                    </div>
                                </a>    
                            </div>
                        </div>
                      
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-white no-radius text-center">
                                <a href="appointment-history.php">
                                    <div class="panel-body">
                                        <div class="statistic-box">
                                            <h2><span class="count-number"></span></h2>
												<!-- <div class="small"> Total Prescription  </div> -->
												<a class="btn-01" href="appointment-history.php">
													<i class="fa fa-calendar"></i>
												</a>
												<a href="appointment-history.php"><h3 class="naame">Appointments</h3></a>
                                            <div class="sparkline1 text-center"></div>
                                        </div>
                                    </div>
                                </a>    
                            </div>
                        </div>

						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-white no-radius text-center">
                                <a href="doctorlist.php">
                                    <div class="panel-body">
                                        <div class="statistic-box">
                                            <h2><span class="count-number"></span> </h2>
                                                <!-- <div class="small"> Total Doctor </div> -->
												<a class="btn-01" href="doctorlist.php">
													<i class="fa fa-user-md"></i>
												</a>
												<a href="doctorlist.php">
												<h3 class="naame">Doctor List</h3></a>
                                            <div class="sparkline1 text-center"></div>
                                        </div>
                                    </div>
                                </a>    
                            </div>
                        </div>

						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-white no-radius text-center">
                                <a href="pharmacistlist.php">
                                    <div class="panel-body">
                                        <div class="statistic-box">
                                            <h2><span class="count-number"></span> </h2>
                                                <!-- <div class="small"> Total Pharamasist </div> -->
												<a class="btn-01" href="pharmacistlist.php">
													<i class="fa fa-group"></i>
												</a>
												<a href="pharmacistlist.php"><h3 class="naame">Pharmacist List</h3></a>
                                            <div class="sparkline1 text-center"></div>
                                        </div>
                                    </div>
                                </a>    
                            </div>
						</div>
						
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-white no-radius text-center">
                                <a href="prescription.php">
                                    <div class="panel-body">
                                        <div class="statistic-box">
                                            <h2><span class="count-number"></span> </h2>
                                                <!-- <div class="small"> Total Pharamasist </div> -->
												<a class="btn-01" href="prescription.php">
													<i class="fa fa-heartbeat"></i>
												</a>
												<a href="prescription.php"><h3 class="naame">Prescriptions</h3></a>
                                            <div class="sparkline1 text-center"></div>
                                        </div>
                                    </div>
                                </a>    
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
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
