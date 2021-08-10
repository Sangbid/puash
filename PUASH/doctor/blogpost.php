<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
include('User.php');
include('Post.php');
check_login();

	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM doctors WHERE doctorname='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);


if(isset($_POST['post'])){

			$uploadOk = 1;
			$imageName = $_FILES['fileToUpload']['name'];
			$errorMessage = "";
		
			if($imageName != "") {
				$targetDir = "assets/";
				$imageName = $targetDir . uniqid() . basename($imageName);
				$imageFileType = pathinfo($imageName, PATHINFO_EXTENSION);
		
				if($_FILES['fileToUpload']['size'] > 10000000) {
					$errorMessage = "Sorry your file is too large";
					$uploadOk = 0;
				}
		
				if(strtolower($imageFileType) != "jpeg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpg") {
					$errorMessage = "Sorry, only jpeg, jpg and png files are allowed";
					$uploadOk = 0;
				}
		
				if($uploadOk) {
					if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $imageName)) {
						//image uploaded okay
					}
					else {
						//image did not upload
						$uploadOk = 0;
					}
				}
		
			}
		
			if($uploadOk) {
				$post = new Post($con, $userLoggedIn);
				$post->submitPost($_POST['title'],$_POST['post_text'],$imageName);
			}
			else {
				echo "<div style='text-align:center;' class='alert alert-danger'>
						$errorMessage
					</div>";
			}
		
		}


?>


<!DOCTYPE html>
<html lang="en">
<html lang="en">
	<head>
	<title>Doctor | Add Blog </title>
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
			
			.panel-heading{
				background: #00BCD4 !important;
			}
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
						<section id="page-title" style="border-bottom:2px solid black; background-color:#673ab7;">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle" style="color: floralwhite"><b>Add New Blog</b></h1>
								</div>
								
							</div>
                        </section>




<section class="content">
	<br>
        <div class="row">
    <!--  form area -->
        <div class="col-sm-12">
            <div class="panel panel-default panel-form">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4 style="color: black">Add New Post</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="portlet-body form">
                        <form action="" class="form-horizontal" role="form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        
                            <div class="form-body" style="background: white; padding-top: 8px; padding-right: 10px; padding-bottom: 10px">

                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label"><span class="text-danger">*</span>Title : </label>
                                    <div class="col-md-10">
                                        <input type="text" name="title" class="form-control" value="" placeholder="Title" required=""> 
                                        <span class="error-msg"> </span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-2 control-label"><span class="text-danger">*</span>Details: </label>
                                        <div class="col-md-10">
                                            <textarea name="post_text" value="" class="form-control" rows="6" required=""></textarea>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Picture : </label>
                                    <div class="col-md-10">
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                         <span>[ jpg,png,jpeg,gif and max size is 1MB]</span>       
                                    </div>
								</div> <br>
								<div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <input type="submit" id="post_button" name="post" class="btn btn-success"></input>
                                </div>
                            </div>
                            </div>

                            

                        </form>                    </div>
                </div>
            </div>
        </div>
    </div>            
    </section>
	</div>
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
