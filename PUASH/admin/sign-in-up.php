<?php
session_start();
error_reporting(0);
include("../../include/if-session-set.php");
include("include/config.php");
if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='".$_POST['username']."' and password='".$_POST['password']."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";//
$_SESSION['adminlogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$_SESSION['role']='admin';
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="sign-in-up.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <title>Admin | Sign-In</title>
    <link rel="stylesheet" href="sign/sign-inup.css">
</head>
<body>

    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- Sign In -->
                <form class="sign-in-form" method="post">
                    <h2 class="title">Sign In</h2>
                    <p>
      								Please enter your name and password to log in.<br />
      								<span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
      							</p>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username">
                    </div>

                    <div class="input-field">
                      <i class="fas fa-lock"></i>
                      <input type="password" name="password" placeholder="Password">
                    </div>

                    <div class="form-actions">
                    <button type="submit" class="btn btn-primary pull-right" name="submit">
                      Login <i class="fa fa-arrow-circle-right"></i>
                    </button>
                    &nbsp;
                    <button class="go-to btn transparent"><a href="../../index.html">Go to home</a></button> <br>      
                    </div>


                </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">

                <div class="content">
                    <!-- <h3>New here</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate voluptates quaerat delectus.</p> -->
                </div> <br>



                <img src="sign/admin1.svg" class="image" alt="">
            </div>
        </div>
    </div>

    <script src="sign/app.js"></script>

    <script src="assets/js/main.js"></script>

		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
</body>
</html>
