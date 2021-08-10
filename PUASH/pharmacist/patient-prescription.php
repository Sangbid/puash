<?php
session_start();
//error_reporting(0);
include('../../include/config.php');
include('include/checklogin.php');
check_login();
date_default_timezone_set('Asia/Dhaka');
$up_date=date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
	$emailph = mysqli_query($con,"SELECT * FROM pharmacist WHERE id='".$_SESSION['id']."'");
	$row=mysqli_fetch_array($emailph);
	$phemail=$row['email'];
	$uniqueid=$_POST['uniqueid'];
	$ucode=substr(rand(),0,4);
	$query=mysqli_query($con,"SELECT * from prescription where pid='$uniqueid' ORDER BY id DESC LIMIT 1");
$row= mysqli_fetch_array($query);
if($row>0){
	$_SESSION['name']=$row['name'];
	$_SESSION['day']=$row['day'];
	$_SESSION['p_id']=$row['pid'];
	$_SESSION['phone']=$row['phone'];
	$_SESSION['birth_date']=$row['birth_date'];
	$_SESSION['age']=$row['age'];
	$_SESSION['gender']=$row['gender'];
	$_SESSION['Weight']=$row['Weight'];
	$_SESSION['Pressure']=$row['Pressure'];
	$_SESSION['Problem']=$row['Problem'];
	$_SESSION['history']=$row['history'];
	$_SESSION['oex']=$row['oex'];
	$_SESSION['pd']=$row['pd'];
	$_SESSION['comments']=$row['prescription_comment'];

	$_SESSION['te_name']= $row['te_name'];
	$_SESSION['adv']=$row['adv'];
	$_SESSION['type']=$row['type'];
	$_SESSION['md_name']=$row['md_name'];
	$_SESSION['mg']=$row['mg'];
	$_SESSION['dose']=$row['dose'];
	$_SESSION['day']=$row['day'];
	$_SESSION['dose']=$row['dose'];
  $_SESSION['date']=$row['current_date'];
  $query12=mysqli_query($con,"select * from doctors where id='".$row['doctorsauthor']."'");
  $row12=mysqli_fetch_array($query12);
  $_SESSION['author']=$row12['doctorname'];
	$_SESSION['did']= $row['doctorsauthor'];
	header("Location:prescriptioncontroler.php");
} else {
	$_SESSION['errmsg']="Unique_Id is not availabe";
}
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pharmacist | Search Prescription</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		<link rel="stylesheet" href="include/sidebar-menu.css">

		<style>
		body{
				padding: 0;
				margin: 0;
				background: #607d8b;
				}

:root{
  /*===== Colores =====*/
  --first-color: #1A73E8;
  --input-color: #80868B;
  --border-color: #DADCE0;

  /*===== Fuente y tipografia =====*/
  --body-font: 'Roboto', sans-serif;
  --normal-font-size: 1rem;
  --small-font-size: .75rem;
}

/*===== BASE =====*/
*,::before,::after{
  box-sizing: border-box;
}
body{
  margin: 0;
  padding: 0;
  font-family: var(--body-font);
  font-size: var(--normal-font-size);
}
h1{
  margin: 0;
}
.box-login{
  box-shadow: 0 10px 25px rgba(92,99,105,.2);
}

.form__title{
  font-weight: 400;
  margin-bottom: 3rem;
}
.form__div{
  position: relative;
  height: 48px;
  margin-bottom: 1.5rem;
}
.form__input{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 120%;
  font-size: var(--normal-font-size);
  border: 1px solid var(--border-color);
  border-radius: .5rem !important;
  background-color: rgba(0,0,0,0)!important;
  outline: none;
  padding: 1rem;
  background: none;
  z-index: 1;
}
.form__label{
  position: absolute;
  left: 1rem;
  top: 0.5rem;
  padding: 0 .25rem;
  background-color: #fff;
  color: var(--input-color);
  font-size: var(--normal-font-size);
  transition: .3s;
}
.form__button{
  display: block;
  margin-left: auto;
  padding: .75rem 2rem;
  outline: none;
  border: none;
  background-color: var(--first-color);
  color: #fff;
  font-size: var(--normal-font-size);
  border-radius: .5rem;
  cursor: pointer;
  transition: .3s;
}
.form__button:hover{
  box-shadow: 0 10px 36px rgba(0,0,0,.15);
  background: floralwhite;
  color: black;
  border: 2px solid darkblue;
}

/*Input focus move up label*/
.form__input:focus + .form__label{
  top: -.7rem;
  left: .8rem;
  color: var(--first-color);
  font-size: var(--small-font-size);
  font-weight: 500;
  z-index: 10;
}

		</style>
	</head>
	<body>
		<div id="app">
<?php include('include/sidebar-menu.php');?>
			<div class="app-content">

				<!-- end: TOP NAVBAR -->
				<div class="main-content" >

						<section id="page-title" style="border-bottom:2px solid black; background-color: #673AB7;">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle" style="color: floralwhite"><i class="fa fa-search-minus" style="font-size: 27px"></i><b>Search Prescription</b></h1>
								</div>
							</div>
						</section>

              <div class="row">

                  <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-2">
                    <div class="box-login">
										   <!-- <div class="l-form"> -->
                            <form autocomplete="off" class="form-login" method="post">
                              <fieldset>
                                <h1 class="form__title">Fill up the form</h1>
                                <p>
                                  <span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
                                </p>
                                <div class="form__div">
                                    <input type="text" class="form__input" name="uniqueid" placeholder=" ">
                                    <label for="" class="form__label">💳 Please enter Patient Unique Id</label>
                                </div>
                                <button type="submit" class="form__button" name="submit">Get Prescription <i class="fa fa-arrow-circle-right"></i></button>
                                <!-- <input type="submit" class="form__button" value="Get Prescription"> -->

                            </form>
                        <!-- </div> -->
										<!-- ggg -->
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
		<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
	</body>
</html>
