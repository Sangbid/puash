<?php
session_start();
//error_reporting(0);
include('../../include/config.php');
include("include/if-session-set.php");
include('include/checklogin.php');
check_login();




?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Prescription </title>
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
			.submit{
				font-size: 15px !important;
			}
			.submit:hover{
				background: #00BCD4 !important;
				color: white !important;
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
						<section id="page-title" style="border-bottom:1px solid #4d79ff; background-color:#673AB7;margin-top:-8px;">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle" style="color: white"><b>Prescription List</b></h1>
								</div>
							</div>
						</section>
	
							<div class="row">
								<div class="col-md-12">
									<div class="row margin-top-30 margin-left-30">
										<div class="col-lg-11 col-md-12" style="padding-bottom: 110px;">
											<div class="panel panel-white">

												<table id="table" class ="table table bordered" style="padding: 20px 0; font-size: 15px">
													<tr>
														<th>Prescription Serial</th>
															<th>Patient Name</th>
															<!-- <th>Medication</th> -->
															<th>Date</th>
															<th>By</th>
															<th>See Prescription</th>
													</tr>
														<?php
															$query=mysqli_query($con,"select id,name,md_name,current_date,doctorsauthor from prescription where pid='".$_SESSION['u_id']."'");
															while($row1=mysqli_fetch_array($query))
															{
														?>
																	<tr>
																		<td><?php echo $row1['id']?></td>
																		<td><?php echo $row1['name']?></td>
																		<!-- <td><?php //echo $row1['md_name']?></td> -->
																		<td><?php echo $row1['current_date']?></td>
																		<td><?php echo $row1['doctorsauthor']?></td>
																		
																		<td class="sorting_1" tabindex="0">  
																			<a href="patient_prescription.php">
																				<Button type ="submit" name='submit' class="submit">
																					<i class="fa fa-eye">Prescription</i>
																				</Button>
																			</a>
																		</td>
																	</tr>
																	<?php
																	} ?>
												</table >
															
										</div>
									</div>
								</div>
							</div>
						</div>
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
					$("#table").on('click','.submit',function(){
						// get the current row
						var currentRow=$(this).closest("tr"); 
						
						var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
						
						$.ajax({
							url:"patient_ind_history.php",
							method:"POST",
							data:{phis:col1}
						}).done(function(data){
							$('#result').html(data);
						});
						
					});
			});
		</script>
	
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
