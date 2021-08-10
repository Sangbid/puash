<?php
if(isset($_SESSION['role'])){
	switch ($_SESSION['role']) {
	  case 'doctor':
		header("location: ../doctor/dashboard.php");
	  break;
	  case 'patient':
		header("location: ../patient/dashboard.php");
	  break;
	  case 'pharmacist':
		header("location: ../pharmacist/dashboard.php");
	  break;
	  case 'admin':
		header("location: ../admin/dashboard.php");
	  break;

	  default:
		// code...
		break;
	}
  }
 ?>
