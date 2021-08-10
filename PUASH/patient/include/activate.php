<?php
session_start();
include('../include/config.php');
if(isset($_GET['token'])){
  $token = $_GET['token'];
  $updatequery = "UPDATE pharmacist set status='active' where token='$token'";
  $query = mysqli_query($con, $updatequery);

  if($query){
    if(isset($_SESSION['cmsg'])){
      $_SESSION['cmsg'] = "Account Activated Successfully! Now You Can Login.";
      header('location: ../index.php');
    }else {
      $_SESSION['cmsg'] = "You are loged out.";
      header('location: ../index.php');
    }
  }else {
    $_SESSION['cmsg'] = "Account Not Activated.";
    header('location: ../registration.php');
  }

}

 ?>
