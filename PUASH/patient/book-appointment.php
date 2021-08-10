<?php
session_start();
//error_reporting(0);
include('../../include/config.php');
include('include/checklogin.php');
check_login();
$output = '';
if(isset($_GET['id'])){
	$_SESSION['doctorid']=$_GET['id'];
}
if(isset($_GET['sid'])){
	$doctorid=$_SESSION['doctorid'];
	$sid=$_GET['sid'];
	$s_doctor=mysqli_query($con,"select * from doctors where id='$doctorid'");
	$d_row=mysqli_fetch_array($s_doctor);
	$d_spec=$d_row['specilization'];
	$did=$d_row['id'];
  $date=$_GET["date"];
	$fee=$d_row['docFees'];
	$UID=$_SESSION['id'];
	$userstatus=1;
	$docstatus=1;

	$fortime=mysqli_query($con,"select * from schedule where Sid=$sid");
	$sid_row=mysqli_fetch_array($fortime);
	$stime= $sid_row['starttime'];
	$etime= $sid_row['Endtime'];



	$sql_query=mysqli_query($con,"INSERT into appointment(doctorSpecialization,doctorId,userId,Sid,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus) values('$d_spec','$doctorid','$UID','$sid','$fee','$date','$stime-$etime','$userstatus','$docstatus')");

	// $sql_query=mysqli_query($con,"insert into appointment values('','$d_spec','$did','$UID','$sid','$fee','$ap_date','','','1','1','')");
	if($sql_query)
	{
		$dtimei=mysqli_query($con,"select * from doctortime where date='$date' and s_id='$sid' and d_id='$doctorid'");
		$dts11=mysqli_fetch_array($dtimei);
		$dtimeid=$dts11['id'];
		mysqli_query($con,"UPDATE doctortime set book='1' where id='$dtimeid'");
		// mysqli_query($con,"update appointment set userStatus='0' where id = '".$_GET['id']."'");


		// $_SESSION['msg']="Your appointment successfully booked.";
		// header("location:appointment-history.php");
		echo "<script>alert('Your appointment successfully booked at ".$date."');window.location='appointment-history.php'</script>";
	}
	else {
		$_SESSION['errmsg']="Error Appointment Booking record.";
		 // echo "Error Appointment Booking record: " ;
	}
}


$did= $_SESSION['doctorid'];
$sqd = "SELECT * FROM doctors WHERE id=$did";
$result1 = mysqli_query($con, $sqd);
if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_assoc($result1)) {
			$name=$row1["doctorname"];
		  $specilization=$row1["specilization"];
			$docFees=$row1["docFees"];
			$docHospital=$row1["hospital_name"];
}
}
else {
  echo "0 result";
}

if(isset($_POST['submit']))
{
$appdate=$_POST['appdate'];
 $doctime=mysqli_query($con,"select * from doctortime where date='$appdate' and d_id='$did'");
 // $dts=mysqli_fetch_array($doctime);
//  if($dts>0){
// 	 $dtsid= $dts['s_id'];
//  $sql=mysqli_query($con,"select * from schedule where Sid='$dtsid'");
// }
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Patient | Book Appointment</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../vendor/fontawesome/css/font-awesome.min.css">
		<link href="../../vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="../../assets/css/styles.css">
		<link rel="stylesheet" href="../../assets/css/plugins.css">
		<link rel="stylesheet" href="../../include/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="../../include/DataTables/Buttons-1.5.6/css/buttons.bootstrap4.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="include/sidebar-menu.css">

		<style>
		body{
					padding: 0;
					margin: 0;
					background: #607d8b;
					}
		 div#table_filter label::before{
				 content:"🔍 ";
				 font-size: 18px;
		}
		.panel-title{
			color: #00BCD4 !important;
			font-size: 20px;
		}
		</style>
	</head>
	<body>
		<div id="app">
<?php include('include/sidebar-menu.php');?>
			<div class="app-content">

				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title" style="border-bottom:2px solid black; background-color:#673AB7; margin-top:-8px;">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle" style="color: floralwhite"><b>Book Appointment</b></h1>
                 </div>


							</div>
						</section>

							<div class="row">
								<div class="col-md-12">
										<div class="col-lg-12 col-md-12">
											<p style="color:green;"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></p>
											<div class="panel panel-white" style="padding:20px 20px;">
												<!-- <div class="panel-heading"> -->
													<h5 class="panel-title">My Appoinments to Doctors</h5><br>
												<!-- </div> -->

   <label for="name">Doctor Name : <?php echo $name; ?> </label> <br>
	 <label for="specilization">Doctor Specialization : <?php echo $specilization; ?> </label> <br>
	 <label for="name">Consultancy Fees : <?php echo $docFees; ?> </label> <br>
	 <label for="name">Hospital Name : <?php echo $docHospital; ?> </label> <br>

					<form role="form" autocomplete="off" name="book" method="post" >
						<input type="hidden" name="doctor" value="<?php echo $id; ?>">
										<div class="form-group">
											<label for="AppointmentDate"> Select Date</label>
											<input class="form-control datepicker" name="appdate"  required="required" data-date-format="yyyy-mm-dd">
										</div>
											<button type="submit" name="submit" id="gettym" class="btn btn-o btn-primary">
													Get Serial Time
											</button>
					</form>
<br>
<label> <?php echo $appdate ?></label><br>
<label for="time"> Select time</label>
                        <div class="table-responsive" id="doctym">

                        <table id="table" class="table table-striped table-bordered" >
													<thead>
														<tr>
															<th class="center">Schedule ID</th>
															<th>Meeting Start Time </th>
															<th>Meeting End Time </th>
															<th>Action</th>

														</tr>
													</thead>
													<tbody>
			<?php

			$cnt=1;
			// while($row=mysqli_fetch_array($sql))
      while($dts=mysqli_fetch_array($doctime))

			{
        $sss=$dts['s_id'];
				$sql=mysqli_query($con,"select * from schedule where Sid='$sss'");
				$row=mysqli_fetch_array($sql);
				$s_id=$row['Sid'];
				$doctorid=$_SESSION['doctorid'];
				$apdate=$dts['date'];
				// $check_q=mysqli_query($con,"select * from appointment where Sid='$s_id' and doctorid='$doctorid' and appointmentDate='$apdate' doctorStatus='1' ");
				$check_q=mysqli_query($con,"select * from doctortime where book=1 and s_id='$s_id' and d_id='$doctorid' and date='$apdate'");

				?>

											<tr>
												<td class="center"><?php echo $row['Sid'];?>.</td>

						<td><?php echo $row['starttime'];?></td>
						<td><?php echo$row['Endtime'];?></td>
												<td >
												<div class="visible-md visible-lg visible-sm visible-xs">
							<?php
							if(mysqli_num_rows($check_q) == 0)
								{
									?>
								<a href="book-appointment.php?sid=<?php echo $row['Sid']?>&date=<?php echo $dts['date'];?> &cancel=update" onClick="return confirm('Confirm your appointment ?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Book</a>
<?php
						}
						else{
							?>

							Booked
							<?php
						}
						?>


												</div>
												</td>
											</tr>

											<?php
						$cnt=$cnt+1;


								 }?>


													</tbody>
												</table>
									</div>



											</div>
										</div>

											</div>
										</div>

							</div>

			</div>
    </div>
			<!-- start: FOOTER -->
	<?php include('../../include/footer.php');?>
			<!-- end: FOOTER -->

		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../../include/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="../../include/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script src="../../include/DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="../../include/DataTables/Buttons-1.5.6/js/buttons.bootstrap4.min.js"></script>
    <script src="../../include/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="../../include/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="../../include/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="../../include/DataTables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <script src="../../include/DataTables/Buttons-1.5.6/js/buttons.print.min.js"></script>


		<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../../vendor/modernizr/modernizr.js"></script>
		<script src="../../vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="../../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="../../vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="../../vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="../../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="../../vendor/autosize/autosize.min.js"></script>
		<script src="../../vendor/selectFx/classie.js"></script>
		<script src="../../vendor/selectFx/selectFx.js"></script>
		<script src="../../vendor/select2/select2.min.js"></script>
		<script src="../../vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="../../vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="../../assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="../../assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable( {
                buttons: [ 'copy','csv','print', 'excel', 'pdf' ],
                dom:
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [10,25,50,100,-1],
                    [10,25,50,100,"All"]
                ]
            } );

            table.buttons().container()
                .appendTo( '#table_wrapper .col-md-5:eq(0)' );
        } );
    </script>



		<script type="text/javascript">
    if ( window.history.replaceState ) {
           window.history.replaceState( null, null, window.location.href );
       }
    </script>
	</body>
</html>
