<?php session_start();
include('../../include/config.php');

if(isset($_POST['phis'])){
    $history_post=$_POST['phis'];
    $_SESSION['phis']=$history_post;
}

$GET_NAME=$_SESSION['phis'];
$query=mysqli_query($con,"select * from prescription where id='$GET_NAME'");
$row= mysqli_fetch_array($query);
$_SESSION['name']=$row['name'];
$_SESSION['day']=$row['day'];
$_SESSION['p_id']=$row['pid'];
$_SESSION['phone']=$row['phone'];
$_SESSION['birth_date']=$row['birth_date'];
$_SESSION['age']=$row['age'];
$_SESSION['gender']=$row['gender'];
$_SESSION['Weight']=$row['Weight'];
$_SESSION['Pressure']=$row['Pressure'];
$_SESSION['Problem']=$row['Problem'];
$_SESSION['history']=$row['history'];
$_SESSION['oex']=$row['oex'];
$_SESSION['pd']=$row['pd'];
$_SESSION['comments']=$row['prescription_comment'];

$_SESSION['te_name']= $row['te_name'];
$_SESSION['adv']=$row['adv'];
$_SESSION['type']=$row['type'];
$_SESSION['md_name']=$row['md_name'];
$_SESSION['mg']=$row['mg'];
$_SESSION['dose']=$row['dose'];
$_SESSION['day']=$row['day'];
$_SESSION['dose']=$row['dose'];
$_SESSION['author']=$row['doctorsauthor'];
$_SESSION['current_date']=$row['current_date'];



// while($row=mysqli_fetch_array($query))
// if($query)
// {
   
//     header("Location: prescriptioncontroler.php");


// }
// else{
//     header("Location: prescription.php");
// }


//             // $pid=$_POST['t_name'];
//             // // $name=$_POST['name'];
//             // // $phone=$_POST['phone'];
//             // // $birth_date=$_POST['birth_date'];
//             // // $age=$_POST['age'];
//             // // $gender=$_POST['gender'];
//             // // $Problem=$_POST['Problem'];
//             // // $Weight =$_POST['Weight'];
//             // // $Pressure =$_POST['Pressure'];
//             // // $temperature =$_POST['temperature'];
//             // // $history =$_POST['history'];
//             // // $oex =$_POST['oex'];
//             // // $pd =$_POST['pd'];
//             // // $type =[];
//             // // $md_name =[];
//             // // $mg =[];
//             // // $dose =[];
//             // // $day =[];
//             // // $comments=[];
//             // // $prescription_comment =$_POST['prescription_comment'];
//             // // $te_name = [];
//             // // $test_description =[];
//             // // $adv =[];




			
// 			$sql=mysqli_query($con,"INSERT into prescription(doctorsauthor) 
//                         values('$history_post')");
//                         if($sql)
//                         {
//                         echo "<script>alert('Prescription info added Successfully');</script>";
                       

//                         }

//                         else{
//                             echo "<script>alert('Prescription info not added');</script>";
// 			}
			

?>


            
					







