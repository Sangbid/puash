<?php
$res=mysqli_query($con,"select * from patientcode where pat_uid='$uniqueid'");
$check=mysqli_fetch_array($res);
$value=$check['value'];
$ucode=" ";
$up=mysqli_query($con,"UPDATE patientcode set ucode='$ucode' WHERE pat_uid='$uniqueid'");

if($value!=0){

}else{
  header("location:../patient-prescription.php");
}

?>
