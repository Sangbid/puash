<?php
session_start();
//error_reporting(0);
include('../../include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM pharmacist WHERE id='".$_SESSION['id']."' AND password='".$_POST['password']."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
  "SELECT * FROM pharmacist";
  mysqli_query($con," DELETE FROM pharmacist WHERE  id='".$_SESSION['id']."'");

  $ldate=date( 'd-m-Y h:i:s A', time () );
  mysqli_query($con,"UPDATE plog  SET logout = '$ldate' WHERE uid = '".$_SESSION['id']."' ORDER BY id DESC LIMIT 1");
  session_unset();
    $_SESSION['cmsg']="Your Account Successfully Deleted";
    header("location:phlogin.php");
      // echo "<script>alert('Your account Successfully Deleted');window.location='../../Index.html';</script>";
}
else {
  $_SESSION['errmsg']="Your entered password is incorrect! Check your password..!";
   // echo "<script>alert('error delete record! check your password..!');window.location='setting.php';</script>";
  }
  // echo "<script>}else{window.location='setting.php';}</script>";
}
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pharmacist | Account Settings</title>
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
        .view{
          background-color:#d3d7de;
          text-align: center;
          width: 40%;
          height: 100px;
        }

    #popUpMain,#popUpMain1{
      position: fixed;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.6);
      z-index: 1001;
    }
    #popup,#popup1{
      width: 380px;
      height: 270px;
      padding: 5px;
      margin-top: 10px;
      background-color: white;
      background-size: cover;
      position: absolute;
      top: 60%;
      left: 60%;
      transform: translate(-60%,-80%);
      box-shadow: 2px 2px 5px 3px;
      text-align: center;
    }
    #paid{
    width: 60%;
      margin-left: 80px;
    }
    .close-button{
      color: black;
    }
    .close-button:hover{
      background-color: red;
      color:white;
    }
    .btn1{
      height: 50px;
      width: 150px;
    }
    /*  */

				body{
				padding: 0;
				margin: 0;
				background: #607D8B;
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

				.pharmacist-dash{
					background-image: url("pharmacist-dash.png");
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
  					/* background:rgb(156, 255, 89); */
					background: #FFC107;
        }
		</style>


	</head>
	<body>

    <div class="delete" id="popUpMain" style="display:none;">
      <div class=""id="popup">
        <button data-close-button class="close-button pull-right" id="cross">&times;</button>
    <br> <br> <h3>If you delete your account it can not be recover again. Are you sure to delete this account?</h3> <br><br>
         <button type="ok" class="btn btn-primary pull-center" name="ok" id="ok" >
         Delete <i class="fa fa-trash"></i>
       </button>
      </div>
    </div>

    <div class="delete" id="popUpMain1" style="display:none;">
      <div class=""id="popup1">
        <button data-close-button class="close-button pull-right" id="cross1">&times;</button>
    <br><br><br> <h3>Enter your password to continue delete your account:</h3> <br>
    <form role="form" name="delete" method="post" onSubmit="return valid();" >
      <span class="input-icon" id="paid">
            <input type="password" class="form-control password" minlength="6" name="password" placeholder="Password" required>
            <i class="fa fa-lock"></i>
          </span> <br>
      <button type="submit" class="btn1 btn-primary pull-center" name="submit" id="submit">
      Delete Permanently <i class="fa fa-trash"></i>
    </button> <span> 	&nbsp; 	&nbsp;</span>
           <button type="reject" class="btn1 btn-primary pull-center" name="no" id="no">
           Cancel
         </button>
         </form>
      </div>
    </div>

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
                  <h1 class="mainTitle" style="color: floralwhite"><b>Account Settings</b></h1>
                                  </div>
              </div>
            </section>
            
            <!-- end: PAGE TITLE -->
            <!-- start: BASIC EXAMPLE -->

              <p style="color:red;"><?php echo htmlentities($_SESSION['errmsg']);?><?php echo htmlentities($_SESSION['errmsg']="");?></p>
              <p style="color:green;"><?php echo htmlentities($_SESSION['msg1']);?><?php echo htmlentities($_SESSION['msg1']="");?></p>
              <div class="col-xs-12 col-lg-4 hidden-sm" style="margin: 50px 0">
              </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3" style="margin: 50px 0">
                            <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body" id="view">
                                        <div class="statistic-box">
                                            <a class="btn-01">
                                              <i class="fa fa-trash"></i>
                                            </a>
                                            <h3 class="naame">Delete account?</h3></a>
                                            <div class="sparkline1 text-center"></div>
                                        </div>
                                    </div>
                                </a>    
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
			});
		</script>

    <script type="text/javascript">
    document.getElementById('cross').addEventListener("click",function(){
      var box1= document.getElementById('popUpMain');
      box1.style.display="none";
    });

    document.getElementById('view').addEventListener("click",function(){
      var box2= document.getElementById('popUpMain');
      box2.style.display="block";
    });

    document.getElementById('ok').addEventListener("click",function(){
      var box3= document.getElementById('popUpMain');
      var box4= document.getElementById('popUpMain1');
      box3.style.display="none";
      box4.style.display="block";
    });
    document.getElementById('cross1').addEventListener("click",function(){
      var box5= document.getElementById('popUpMain1');
      box5.style.display="none";
    });
    document.getElementById('no').addEventListener("click",function(){
      var box5= document.getElementById('popUpMain1');
      box5.style.display="none";
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
