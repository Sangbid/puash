<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="sidebar-menu.css"> -->
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"> -->


</head>
<body>

    <input type="checkbox" id="check">
<!--  -->
    <!-- Header Area Start -->
    <header class="navbar navbar-default navbar-static-top">

      <label for="check">
        <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app">
          <i class="fa fa-bars" id="sidebar_btn"></i>
        </a>
        <a href="#" class="sidebar-toggler pull-right visible-md visible-lg"  data-toggle-class="app-sidebar-closed"  data-toggle-target="#app">
          <i class="fa fa-bars" id="sidebar_btn"></i>
        </a>

      </label>


        <div class="left_area">
            <h3><a href="../../index.html"><span style="color: floralwhite !important;">PUA</span><span class="second">SH</span></a></h3>
          </a>
        </div>

        <div class="right_area">
          <a href="logout.php" class="logout_btn"><i class="fa fa-power-off"></i> Logout</a>

              <a href="my-profile.php" class="mee"> <span class="username" style="color:white;">

<?php
$con = mysqli_connect("localhost", "root", "", "hms");
         $query = "select * from doctors where id='".$_SESSION['id']."'";
         if($result = mysqli_query($con, $query)){
             while($row = mysqli_fetch_assoc($result)){
                 $mark = explode(" ", $row["doctorname"]);
                      echo $mark[0]." ";
                      echo $mark[1];
                   }
             }
     ?>

</span></a>


        </div>
    </header>
    <!-- Header Area End -->



<!-- sidebar start -->
    <div class="sidebar app-aside" id="sidebar" >
    				<div class="sidebar-container perfect-scrollbar">
    					<div class="color-layout">
    								<label>
    									<span class="split header"> <span class="color th-header"></span> <span class="color th-collapse"></span> </span>
    									<span class="split"> <span class="color th-sidebar"><i class="element"></i></span> <span class="color th-body"></span> </span>
    								</label>
    							</div>


    <nav>

      <!-- <center>
          <img src="runa.png" class="profile_image" alt="">
          <h4>Nazia Nuzhat</h4>
      </center> -->
      <div>
        <br>
      </div>

      <!-- start: MAIN NAVIGATION MENU -->
      

      <ul class="main-navigation-menu">
        <li>
          <a href="dashboard.php" class="side-content">
            <div class="item-content">
              <div class="item-media">
                <i class="fa fa-television" style="font-size:25px;"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Dashboard </span>
              </div>
            </div>
          </a>
        </li>

        <li>
								<a href="schedule.php" class="side-content">
									<div class="item-content">
										<div class="item-media">
											<i class="fa fa-clock-o" style="font-size:25px;"></i>
										</div>
										<div class="item-inner">
											<span class="title">&nbsp; Daily Schedules</span>
										</div>
									</div>
								</a>
				</li>

        <li>
          <a href="my-profile.php" class="side-content">
            <div class="item-content">
              <div class="item-media">
                <i class="fa fa-user" style="font-size:25px;"></i>
              </div>
              <div class="item-inner">
                <span class="title">&nbsp;&nbsp; Profile </span>
              </div>
            </div>
          </a>
        </li>

        <li>
								<a href="appointment-history.php" class="side-content">
									<div class="item-content">
										<div class="item-media">
											<i class="fa fa-calendar" style="font-size:25px;"></i>
										</div>
										<div class="item-inner">
											<span class="title">&nbsp; Appointments</span>
										</div>
									</div>
								</a>
				</li>

							<li>
								<a href="prescriptionlist.php" class="side-content">
									<div class="item-content">
										<div class="item-media">
                      <i class="fa fa-user-plus" style="font-size:25px;"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Patient Lists </span>
										</div>
									</div>
								</a>
							</li>

							<li>
								<a href="patient-prescription.php" class="side-content">
									<div class="item-content">
										<div class="item-media">
											<i class="fa fa-heartbeat" style="font-size:25px;"></i>
										</div>
										<div class="item-inner">
											<span class="title">&nbsp;Create Prescription</span>
										</div>
									</div>
								</a>
							</li>

							<li>
								<a href="operation.php" class="side-content">
									<div class="item-content">
										<div class="item-media">
                      <i class="fa fa-files-o" style="font-size:20px;"></i>
										</div>
										<div class="item-inner">
											<span class="title">&nbsp; Operation Report</span>
										</div>
									</div>
								</a>
							</li>

              <li>
                  <a href="#" class="blogg">
                    <div class="item-content">
                      <div class="item-media">
                        <i class="fa fa-group" style="font-size:25px;"></i>
                      </div>
                      <div class="item-inner">
                        <span class="title">&nbsp;Blog</span><i class="fa fa-chevron-circle-down"></i>
                      </div>
                    </div>
                  </a>
                  <ul class="sub-menu" style=" background-color: black;">
                    <li>
                      <!-- <a href="blogpost.php" class="side-content"> -->
                      <a href="blogpost.php" class="blogg">
                        <span class="title"> Add New Blog </span>
                      </a>
                    </li>
                    <li>
                      <!-- <a href="blogpost.php" class="side-content"> -->
                      <a href="bloglist.php" class="blogg">
                        <span class="title"> Post List </span>
                      </a>
                    </li>
                  </ul>
              </li>

      </ul>
      <!-- end: CORE FEATURES -->

    </nav>
    </div>
</div>

    <div class="content">

    </div>
</body>
</html>
