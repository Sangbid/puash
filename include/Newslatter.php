
<?php
session_start();
error_reporting(0);
include("config.php");

if(isset($_POST['submit']))
{
  $Email= $_POST['email'];

$Search1=mysqli_query($con,"SELECT * FROM subscriber WHERE Email='$Email'");
$num=mysqli_fetch_array($Search1);
if($num>0){
  echo "<script>alert('You are already subscribed here');window.location='../index.html'</script>";
}
else {
	mysqli_query($con,"insert subscriber set Email='$Email'");


				$subject = "Subscription Confirmation";
        $body = "Congratulations, you are subscribed PUASH. You can get medical tips everyday by our doctors. 
Thank you for being with us.";
				$sender_email = "From: puash.bd@gmail.com";

				if (mail($Email, $subject, $body, $sender_email)) {
          // $_SESSION['errmsg']="Check your email to reset your password.";
          echo "<script>alert('Congratulations, You are now subscribed here !!');window.location='../index.html'</script>";
					} else {
          echo "<script>alert('Email Sending Failed');window.location='../index.html'</script>";
        }
        
}
}
?>