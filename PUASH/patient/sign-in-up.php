<?php
session_start();
error_reporting(0);
include("../../include/if-session-set.php");
include("../../include/config.php");


if(isset($_POST['submitlog']))
{
$search=mysqli_query($con,"SELECT * FROM users WHERE uniqueid='".$_POST['uniqueid']."'");
$count=mysqli_fetch_array($search);
if ($count>0) {
$password=md5($_POST['password']); //for password encript
mysqli_query($con,"UPDATE users SET activation='on' WHERE uniqueid='".$_POST['uniqueid']."'");
$ret=mysqli_query($con,"SELECT * FROM users WHERE uniqueid='".$_POST['uniqueid']."' and password='$password'"); //".$_POST['password']."
$num=mysqli_fetch_array($ret);
if($num>0){
$extra="dashboard.php";//
$_SESSION['login']=$num['fullname'];
$_SESSION['patid']=$num['id'];
$_SESSION['role']='patient';
$_SESSION['id']=$num['id'];
$_SESSION['u_id']=$num['uniqueid'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
// For stroing log if user login successfull
$log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
	// For stroing log if user login unsuccessfull
$_SESSION['login']=$num['fullname'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$_SESSION['errmsg']="Invalid password";
$extra="sign-in-up.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}else {
	$_SESSION['errmsg']="Invalid Unique Id";
}
}
//}

if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$address=$_POST['address'];
$blood_group=$_POST['blood_group'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$dob=$_POST['birthdate'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];

if($password === $cpassword){
  $password = md5($password); // for password encript
	$uniqueid = explode(" ",$fname)[0]."_".substr(rand(),0,4);

$query=mysqli_query($con,"insert into users(fullname,address,gender,email,blood_group,phone,password,birthdate,uniqueid) values('$fname','$address','$gender','$email','$blood_group','$phone','$password','$dob','$uniqueid')");
if($query)
{
	// $last_id= mysqli_insert_id($con);
//	$up=mysqli_query($con,"UPDATE users Set uniqueid='".$uniqueid."' where id = '".$last_id."'");

	$subject = "Unique Id";
	$body = "Hi, $fname. Your Unique Id is $uniqueid
	Now you can login whith this unique Id.
	http://localhost/puash/PUASH/sign-in-up.php";
	$sender_email = "From: puash.bd@gmail.com";

	if (mail($email, $subject, $body, $sender_email)) {
		//	$_SESSION['errsmsg'] = "Successfully Registered. You can login now with your unique id of $uniqueid";
		//	header("location:user-login.php");
		echo "<script>alert('Successfully Registered. Please check your email: $email to get Unique Id.');window.location='sign-in-up.php'</script>";
	} else {
		$_SESSION['errmsg'] = "Email sending failed.";
	}
}else {
	$_SESSION['errmsg'] = "faild to registration.";
	}
} else {
	$_SESSION['errpmsg'] = "Password and Confirm password are not matched";
}
}

//
if(isset($_POST['get-password'])) {
	$uniqueid=mysqli_real_escape_string($con, $_POST['uniqueid']);
	$uniqueidquery = mysqli_query($con,"SELECT * FROM users WHERE uniqueid='$uniqueid'");
	$count=mysqli_num_rows($uniqueidquery);
	if($count){
				$userdata=mysqli_fetch_array($uniqueidquery);
				$fname= $userdata['fullname'];
				$email= $userdata['email'];

				$subject = "Reset Password..";
				$body = "Hi, $fname. Click here to reset your password
				http://localhost/puash/PUASH/patient/include/resetpass.php?uniqueid=$uniqueid";
				$sender_email = "From: puash.bd@gmail.com";

				if (mail($email, $subject, $body, $sender_email)) {
					$_SESSION['errmsg']="Check your email: $email to reset your password.";
					} else {
						echo "Email sending failed...";
				}
			}else {
				$_SESSION['errmsg']="Invalid Unique Id.";
			}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"> </script>
		<link href="../../vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <title>Patient | SignIn-SignUp</title>
    <link rel="stylesheet" href="sign/sign-inup.css">
    <style>
      .container.active{
        filter: blur(20px);
      }
            .view{
            background-color:#d3d7de;
            text-align: center;
            width: 40%;
            height: 100px;
          }

        #popUpMain{
          display: block;
          visibility: hidden;
          opacity: 0;
          position: fixed;
          width: 100%;
          height: 100%;
          /* background: rgba(0, 0, 0, 0.6); */
          z-index: 1001;
          transition: all 1s;
        }
        #popup{
          position: absolute;
          top: 40%;
          left: 50%;
          transform: translate(-50%, -50%);
          width: 600px;
          padding: 120px 0;
          box-shadow: 0 5px 30px rgba(0, 0, 0, .30);
          background:#2c2c2c;
          visibility: hidden;
          opacity: 0;
          transition: all 1s;
        }
        #popUpMain.active{
          visibility: visible;
            opacity: 1;

        }
        #popup.active{
            top: 50%;
            visibility: visible;
            opacity: 1;
        }

        /* Forget Pass Start */
        
        .form {
        position:absolute;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%);
        width:300px;
        height:250px;
        padding:10px;
        }
        .form .form-header {
        height:30px;
        display:flex;
        align-items:center;
        text-align:center;
        }
        .form .form-header > div {
        width:calc(100% / 3);
        color:#ddd;
        font-size:18px;
        font-weight:600;
        cursor:pointer;
        }
        
        .form.reset .form-header div.show-reset {
        color:#f1575b;
        }
        .form .form-elements {
        margin-top:15px;
        }
        .form .form-elements .form-element {
        height:50px;
        opacity:1;
        overflow:hidden;
        transition:all 500ms ease-in-out;
        }
        .form .form-elements button:hover{
          background: yellow;
          color: black;
          transition: 1.2s;
        }
        .form .form-elements input {
        width:100%;
        padding:10px;
        font-size:16px;
        margin:5px 0px;
        border-radius:10px;
        box-sizing:border-box;
        border:1px solid #222;
        background:#f5f5f5;
        }
        .form .form-elements button {
        width:100%;
        padding:10px;
        font-size:16px;
        font-weight:600;
        margin-top:5px;
        border-radius:10px;
        background:#f1575b;
        color:#f5f5f5;
        cursor:pointer;
        border:none;
        outline:none;
        }
        .form .arrow {
        position:absolute;
        top:51px;
        width:0;
        height:0;
        border-left:10px solid transparent;
        border-right:10px solid transparent;
        border-bottom:10px solid #f5f5f5;
        }
        .form.signup .arrow {
        left:calc(calc(100% / 3) / 2);
        }
        .form.signin .arrow {
        left:calc(calc(100% / 3) + calc(calc(100% / 3) / 2.2)) ;
        }
        .form.reset .arrow {
        left:calc(calc(calc(100% / 3) * 2) + calc(calc(100% / 3) / 3)) ;
        }

        .form.signin .form-elements > div:nth-child(3) {
        height:0px;
        opacity:0;
        }
        .form.reset .form-elements > div:nth-child(2),
        .form.reset .form-elements > div:nth-child(3) {
        height:0px;
        opacity:0;
        }
        /* Forget Pass End */
        
    </style>
</head>
<body>

  <div class="delete" id="popUpMain">
		<div class="" id="popup">
        <form class="form-login" autocomplete="off" method="post">
            <fieldset>
                <div class="form-group">
                    <!-- <span class="input-icon">
                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
                        <i class="fa fa-envelope"></i> 
                    </span> -->
                    <div class="form signup">
                        <div class="form-header">
                          <div class="show-reset">Forget&nbsp;Password</div>
                        </div>
                        <div class="arrow"></div>
                          <div class="form-elements">
                            <div class="form-element">
                              <span class="input-icon">
                                <input type="text" class="form-control" name="uniqueid" placeholder="✉ Enter Your Unique Id" required> 
                                <!-- <i class="fa fa-envelope-0"></i> -->
                              </span>
                            </div>
                            <div class="form-element">
                              <button id="submit-btn" name="get-password">Get Password</button>
                            </div>
                            <div class="form-element" id="cross">
                              <button id="submit-btn">Close</button>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
            </fieldset>
        </form>
		</div>
	</div>

    <div class="container" id="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- Sign In -->
                <form class="sign-in-form" method="post">
                    <h2 class="title">Sign In</h2>
										<p style="color:green; text-align:center; width:60%;"> <span><?php echo $_SESSION['cmsg']; ?><?php echo $_SESSION['cmsg']="";?></span></p>
										<p>
											Please enter your Unique Id and password to log in.<br />
											<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
										</p>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="uniqueid" placeholder="Unique ID">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                          <div class="form-actions">
                            <!-- <a href="forget-pass.php">Forget password?</a> &nbsp; -->
                            <a href="#" id="view">
                                Forget Password
                            </a> &nbsp;
                            <button type="submit" class="btn btn-primary pull-right" name="submitlog">
                            Login <i class="fa fa-arrow-circle-right"></i>
                            </button>
                          </div>  

                </form>

                <!-- Sign Up -->
                <form class="sign-up-form" id="registration"  method="post" autocomplete="off">
                    <h2 class="title">Sign Up</h2>

											<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="full_name" placeholder="Full Name">
                    </div>

                    <div class="input-field">
                      <i class="fa fa-map-marker"></i>
                      <input type="text" name="address" placeholder="Address">
                    </div>

                    <div class="input-field">
                      <!-- <i class="fa fa-heartbeat"></i> -->
                      <span class="blood">🩸</span>
                      <input type="text" name="blood_group" placeholder="Blood Group">
                    </div>

                    <div class="gender">
                      <div class="block" style="padding: 2px; margin-bottom: 2px;">
                        Gender
                      </div>
                      <div class="clip-radio radio-primary">
                        <input type="radio" id="rg-female" name="gender" value="female" >
                        <label for="rg-female">
                          Female
                        </label>
                        <input type="radio" id="rg-male" name="gender" value="male">
                        <label for="rg-male">
                          Male
                        </label>
                        <input type="radio" id="rg-other" name="gender" value="Other">
                        <label for="rg-other">
                          Other
                        </label>
                      </div>
                    </div>

                    <div class="input-field">
                      <i class="fa fa-calendar"></i>
                        <input type="text" class="form-control datepicker" name="birthdate" id="datepicker" placeholder="Date Of Birth:&#10;dd/mm/yyyy" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="input-field">
                      <i class="fa fa-mobile"></i>
                      <input type="number" name="phone" id="phone" placeholder="Phone Number">
                    </div>

                    <!-- <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password">
                    </div>

                    <div class="input-field">
                      <i class="fas fa-lock"></i>
                      <input type="password" placeholder="Confirm Password">
                      Must contain at least 6 or more characters.
                    </div> -->
                    <span style="color:red;"><?php echo $_SESSION['errpmsg']; ?><?php echo $_SESSION['errpmsg']="";?></span>
                    <span class="input-field">
                      <i class="fa fa-lock"></i>
                      <input type="password" class="form-control password" id="password" value="" name="password" placeholder="Set Password" minlength="6" title="Must contain at least 6 or more characters" required>
                    </span>

                    <span class="input-field">
                        <i class="fa fa-key"></i>
                        <input type="password" class="form-control password" id="cpassword" value="" name="cpassword" placeholder="Confirm Password" minlength="6" title="Must contain at least 6 or more characters" required>
                    </span>

                    <span style="margin-left: -30%;">
                       <input type="checkbox" onclick="passShow()"> &nbsp;Show Password
                    </span>

										<button type="submit" class="btn solid pull-right" name="submit">
											Sign up <i class="fa fa-arrow-circle-right"></i>
										</button>
                </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here !!</h3>
                    <p>Hello, welcome here. Please register yourself giving by your respected information and enjoy our services.</p>
                    <button class="btn transparent" id="sign-up-btn">Sign Up</button> <br> <br>
										<button class="go-to btn transparent"><a href="../../index.html">Go to home</a></button>

                </div>

                <img src="sign/patient1.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>One of Us?</h3>
                    <p>Hello, please sign in with your unique id and password to access your precious files and contact with doctor's frequently.<br>
                    Thank you </p>
                    <button class="btn transparent" id="sign-in-btn">Sign In</button> <br> <br>
										<button class="go-to btn transparent"><a href="../../index.html">Go to home</a></button>
                </div>

                <img src="sign/patient2.svg" class="image" alt="">
            </div>
        </div>

    </div>

		<script src="../../vendor/jquery/jquery.min.js"></script>
		<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../../vendor/modernizr/modernizr.js"></script>
		<script src="../../vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="../../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="../../vendor/switchery/switchery.min.js"></script>

<script src="../../vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="../../vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="../../assets/js/main.js"></script>
<script src="../../assets/js/login.js"></script>
<script src="sign/app.js"></script>

		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>

    <script>
        function passShow() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }

        var y = document.getElementById("cpassword");
        if (y.type === "password") {
          y.type = "text";
        } else {
          y.type = "password";
        }
      }
    </script>

		<script>
			jQuery(document).ready(function() {
				$('#datepicker').datepicker({
			format: 'dd-mm-yyyy',
			changeMonth: true,
			changeYear:true
			});
			});
		</script>
		<script>
		if ( window.history.replaceState ) {
				window.history.replaceState( null, null, window.location.href );
		}
    </script>
    
    <script type="text/javascript">
				document.getElementById('cross').addEventListener("click",function(){
            var container = document.getElementById('container');
            container.classList.toggle('active');
            var popupmain = document.getElementById('popUpMain');
            popupmain.classList.toggle('active');
            var box1= document.getElementById('popup');
          box1.classList.toggle('active')
		      // box1.style.display="none";
		    });
        
		    document.getElementById('view').addEventListener("click",function(){
		      var container = document.getElementById('container');
            container.classList.toggle('active')

            var popup = document.getElementById('popup');
            popup.classList.toggle('active');
            var popupmain = document.getElementById('popUpMain');
            popupmain.classList.toggle('active');
		    });
    </script>
  
</body>
</html>
