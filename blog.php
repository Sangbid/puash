<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Medical Tips </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" /> -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

		<!-- <link rel="stylesheet" href="homecss/login.css"> -->
	  <link rel="stylesheet" href="homecss/style.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->



		<style media="screen">
		body{
			width: 100%;
		}
		.total-bdy{
			width: 80% !important;
		}
			div#table_filter label::before{
					content:"🔍 ";
					font-size: 18px;
			}



		</style>
		</head>
	<body>

<section class="total-bdy">
      <header>
          <a href="index.html" class="logo" style="color: black;"><h2 style="color: black;">PUASH</h2><span style="font-size:20px">Proper Use of Antibiotic & Safe Health</span></a>
          <!-- <a href="#" class="contact">Contact</a> -->
      </header>
	  <div class="container" style='top: 250px; position: relative; margin: 0;'>
      <?php

		session_start();
					include('include/config.php');
					include('PUASH/doctor/Post.php');
					include('PUASH/doctor/User.php');

					$data_query = mysqli_query($con, "SELECT * FROM posts WHERE deleted='no' ORDER BY id DESC");

					if(mysqli_num_rows($data_query) > 0) {

						$str = "";
						$num_iterations = 0; //Number of results checked (not necasserily posted)
						$count = 1;

						while($row = mysqli_fetch_array($data_query)) {
					$id = $row['id'];
					$title=$row['title'];
					$body = $row['description'];
					$added_by = $row['author'];
					$date_time = $row['upload_date'];
					$imagePath = $row['image'];



						$user_to_obj = new User($con, $row['author']);
						// $user_to_name = $user_to_obj->getFirstAndLastName();
						// $user_to = $row['author'] ;
						$user_to = "to <a href='" . $row['author'] ."'>  </a>";






						$user_details_query = mysqli_query($con, "SELECT doctorname, docEmail, specilization FROM doctors WHERE doctorname='$added_by'");
						$user_row = mysqli_fetch_array($user_details_query);
						$first_name = $user_row['doctorname'];
						$last_name = $user_row['specilization'];
						$profile_pic = $user_row['docEmail'];


						?>

						<?php



						//Timeframe
						$date_time_now = date("Y-m-d H:i:s");
						$start_date = new DateTime($date_time); //Time of post
						$end_date = new DateTime($date_time_now); //Current time
						$interval = $start_date->diff($end_date); //Difference between dates
						if($interval->y >= 1) {
							if($interval->y == 1)
								$time_message = $interval->y . " year ago"; //1 year ago
							else
								$time_message = $interval->y . " years ago"; //1+ year ago
						}
						else if ($interval->m >= 1) {
							if($interval->d == 0) {
								$days = " ago";
							}
							else if($interval->d == 1) {
								$days = $interval->d . " day ago";
							}
							else {
								$days = $interval->d . " days ago";
							}


							if($interval->m == 1) {
								$time_message = $interval->m . " month ". $days;
							}
							else {
								$time_message = $interval->m . " months ". $days;
							}

						}
						else if($interval->d >= 1) {
							if($interval->d == 1) {
								$time_message = "Yesterday";
							}
							else {
								$time_message = $interval->d . " days ago";
							}
						}
						else if($interval->h >= 1) {
							if($interval->h == 1) {
								$time_message = $interval->h . " hour ago";
							}
							else {
								$time_message = $interval->h . " hours ago";
							}
						}
						else if($interval->i >= 1) {
							if($interval->i == 1) {
								$time_message = $interval->i . " minute ago";
							}
							else {
								$time_message = $interval->i . " minutes ago";
							}
						}
						else {
							if($interval->s < 30) {
								$time_message = "Just now";
							}
							else {
								$time_message = $interval->s . " seconds ago";
							}
						}

						if($imagePath != "") {
							$imageDiv = "<div class='postedImage'>
											<img style= 'width:50%'src='PUASH/doctor/$imagePath'>
										</div>";
						}
						else {
							$imageDiv = "";
						}
						?>


							<div class='row' onClick='javascript:toggle$id()'>
								<div class="col-md-4">
								<div class='post_profile_pic'>
										<?php echo $imageDiv; ?>
									</div>
								</div>
								<div class="col-md-8">
									<h4 style="font-size: 25px; color: black"><?php echo $title; ?></h4>
								<div class='posted_by' style='color:#ACACAC; margin-bottom:5px;'>
										<span style="color:darkblue;font-size: 17px"><b><?php echo $first_name; echo ' | ';echo $last_name ; ?> </b></span>&nbsp;<?php echo $time_message;?>
									</div>
									<div id='post_body' style="text-align:justify">
										<?php echo $body; ?>

									</div>

								</div>


								</div>

								<hr>






					<?php
						} //End while loop
					}



					?>


				</div>





    </section>



<!-- footer -->


    <script type="text/javascript">
      // For Sticky Nav Bar
      window.addEventListener("scroll", function(){
          var header = document.querySelector("header");
          header.classList.toggle("sticky", window.scrollY > 0);
        })

    </script>

  </body>
</html>
