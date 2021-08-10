
<?php
function check_login()
{
if(strlen($_SESSION['dlogin'])==0)
	{
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
		else{
			$host = $_SERVER['HTTP_HOST'];
			$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra="./sign-in-up.php";
			header("Location: http://$host$uri/$extra");
		}

	}

}
?>
