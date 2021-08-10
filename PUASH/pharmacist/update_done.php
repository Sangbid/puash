<!-- medicine update done -->
<?php
session_start();
//error_reporting(0);
include('../../include/config.php');
include('include/checklogin.php');
check_login();

include_once "connection.php";
$name=$_POST['name'];
$status=$_POST['status'];
$id=$_POST['id'];
$sql = "UPDATE medicine SET name='$name',status=$status WHERE id=$id";

if (mysqli_query($con,$sql)) {
  $_SESSION['msg']="Record Updated Successfully !!";
header("location:stock.php");
}
else{
  $_SESSION['errmsg']="Error Occured!!";
header("location:stock.php");
  //echo "Error ocured";
}
?>
