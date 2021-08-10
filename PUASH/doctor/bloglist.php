<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_GET['cancel']))
		  {
		          mysqli_query($con,"delete from posts where id = '".$_GET['id']."'");
                  $_SESSION['msg']="Post Deleted !!";
		  }
?>


<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Doctor | Blog List </title>
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
				background: #607D8B;
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
						<section id="page-title" style="border-bottom:2px solid black; background-color:#673ab7;">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle" style="color: floralwhite"><b>Blog List</b></h1>
								</div>
								
							</div>
                        </section>





<section class="content">
            
        <div class="row margin-top-30">
        <!--  table area -->
        <div class="col-sm-12">
            <div class="panel panel-default">

                 <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Post List</h4>
                    </div>
                </div>

                
                <div class="panel-body">

                    <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="background: white">
                                <th>Picture</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        
                        <tbody>

						<?php
$sql=mysqli_query($con,"select title ,image ,upload_date,id from posts where author='".$_SESSION['username']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

											<tr>
											<td style="display:none;"><?php echo $row['id'];?></td>
												<td class="" ><img style="height:100px;width:120px; "src="<?php echo $row['image'];?>" alt=""></td>
												<td><?php echo $row['title'];?></td>
										
												
												<td><?php echo $row['upload_date'];?></td>
												
												<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							



	<a href="bloglist.php?id=<?php echo $row['id']?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this blog ?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Post" tooltip-placement="top" tooltip="Remove">Delete</a>
	

												</div>
												</td>
											</tr>

											<?php
$cnt=$cnt+1;
											 }?>

                                                   </tbody>
                    </table> 
                </div>
                </div>
            </div>
											</div>
											</div>
											</div>
								    
	</section>
	
	</div>
	</div>
	
	<br><br><br><br>
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
