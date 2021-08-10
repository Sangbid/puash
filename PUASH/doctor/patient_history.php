<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
    $p_history= $_POST['p_history'];
    $_SESSION['P_HISTORY']=$p_history;
    

?>