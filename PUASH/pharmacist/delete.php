
<?php
session_start();
include('../../include/config.php');
include('include/checklogin.php');
check_login();

$id=$_GET['id'];

$sql = "DELETE FROM medicine WHERE id=$id";

if (mysqli_query($con,$sql)) {
    $_SESSION['msg1']="Record Deleted Successfully !!";
  header("location:stock.php");

} else {
  $_SESSION['errmsg']="Error Deleting Record.";
  header("location:stock.php");
    //echo "Error deleting record: " ;
}
 ?>
