<!-- <script>
data-cfasync='false'
</script> -->

<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$query=mysqli_query($con,"select * from doctors where id='".$_SESSION['id']."'");
while($row1=mysqli_fetch_array($query))
{
    
    $author=$row1['doctorname'];
    $_SESSION['author']=$author;


}





?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor | Add Prescription</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
        <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

	</head>
    <body style="">
            <div id="wrap">
    <div id="top">

        <!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">

            <!-- Brand and toggle get grouped for better mobile display -->
            <header class="navbar-header">
                <a class="navbar-brand  animated bounceInDown">
                    <table><tbody><tr><td><img class="image_pos" src="assets/img/81745430443.png"></td><td><strong class="h2">Prescription Management System</strong></td></tr></tbody></table>                </a> 
            </header>
            <div class="topnav">



                <div class="btn-toolbar">
                    <div class="btn-group">
                        <a data-placement="bottom" data-original-title="Show / Hide Sidebar" data-toggle="tooltip" class="btn btn-success btn-sm" id="changeSidebarPos">
                            <i class="fa fa-columns"></i>
                        </a> 
                    </div>

                    
                        <div class="btn-group">
                            <a href="doctor_profile.php" data-toggle="tooltip" data-original-title="Profile" data-placement="bottom" class="btn btn-warning btn-sm">
                                <i class="fa fa-user"></i>
                            </a> 
                        </div>

                        <div class="btn-group">
                            <a href="change_doctor_pass.php" data-toggle="tooltip" data-original-title="Change Password" data-placement="bottom" class="btn btn-metis-4 btn-sm">
                                <i class="fa fa-lock"></i>
                            </a> 
                        </div>

                    
                    <div class="btn-group">
                        <a href="logout.php" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                            <i class="fa fa-sign-out"></i>
                        </a> 
                    </div>
                </div>

            </div><!-- /.topnav -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">

                <!-- .nav -->
                <!-- /.nav -->
            </div>
        </nav><!-- /.navbar -->

        <!-- header.head -->
        <header class="head">            <!-- ."main-bar -->
            <div class="main-bar">
                <h3><i class="fa fa-medkit"></i> Manage Prescription</h3>
            </div>
            <!-- /.main-bar -->
            </header>

<!-- end header.head -->
</div><!-- /#top -->
<div id="left">
    <div class="media user-media">
        <a class="user-link" href="">
            <!--img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif"-->
            <img class="media-object img-thumbnail user-img" alt="User Picture" width="64" height="64" src="assets/img/49943221221.png">        </a> 
        <div class="media-body">
            <h5 class="media-heading" style="color:red;">Active</h5>
            <ul class="list-unstyled user-info">
                <li> <a href="">Doctor</a>  </li>
                <li>Last Access :
                    <br>
                    <small>
                        <i class="fa fa-calendar"></i>
                        &nbsp;12 Sep 02:37                    </small> 
                </li>
            </ul>
        </div>
    </div><ul id="menu" class="collapse">
    <li class="nav-header">Menu</li>
    <li class="nav-divider"></li>

    <li>
        <a href="doctor.php">
            <i class="fa fa-dashboard"></i>&nbsp; Dashboard</a> 
    </li>

    <li>
        <a href="doctor_profile.php">
            <i class="fa fa-user"></i>&nbsp; Profile</a> 
    </li>

    <li>
        <a href="doctor_prescription.php">
            <i class="fa fa-medkit"></i>&nbsp; Prescription</a> 
    </li>
</ul><!-- /#menu -->
</div><!-- /#left -->
            <div id="content">
                <div class="outer">
                    <div class="inner">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box">

                                    <header>
                                        <div class="icons">
                                            <i class="fa fa-medkit "></i>
                                        </div>
                                        <h5>Prescription</h5>
                                        <div class="toolbar">
                                            <ul class="nav pull-right">
                                                <li>
                                                    <a class="minimize-box" href="#div-4" data-toggle="collapse">
                                                        <i class="fa fa-chevron-up"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="icons">
                                            <i class="fa fa-medkit "></i>
                                        </div>
                                        <h5>Previous Prescritions</h5>
                                        <div class="toolbar">
                                            <ul class="nav pull-right">
                                                <li>
                                                    <a class="minimize-box" href="#div-4" data-toggle="collapse">
                                                        <i class="fa fa-chevron-up"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="icons">
                                            <i class="fa fa-medkit "></i>
                                        </div>
                                        <h5>Patient History</h5>
                                        <div class="toolbar">
                                            <ul class="nav pull-right">
                                                <li>
                                                    <a class="minimize-box" href="#div-4" data-toggle="collapse">
                                                        <i class="fa fa-chevron-up"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </header>

                                    <div id="div-4" class="accordion-body collapse in body">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#add_prescription" data-toggle="tab">Add Prescription</a></li>
                                            <li><a href="#edit_prescription" data-toggle="tab">View Prescription</a></li>
                                        </ul>

                                        <div class="tab-content active">
                                            <div class="tab-pane active " id="add_prescription">
                                                <div class="row">
                                                    <div class="col-lg-12">

                                                        <div class="content-box margin1">
                                                            <div class="row margin1">
                                                                <div class="col-lg-12">
                                                                    <div class="col-lg-4 col-lg-offset-8">
                                                                        <div class="input-group">
                                                                            <select id="create_value" class="form-control">
                                                                                                                                                            </select> 
                                                                            <span class="input-group-btn">
                                                                                <button id="create_submit" class="btn btn-info" type="button">Create</button>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- Start Add prescriptionn -->
                                                        <div style="border: 1px solid #ccc;" class="content-box margin1">
                                                            <div class="row margin1">
                                                                <div class="col-lg-12">

                                                                    <div class="col-md-4">
                                                                        <form class="form-horizontal">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_name">Name</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_name" name="patients_name" class="form-control" type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_mobile">Mobile</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_mobile" name="patients_mobile" class="form-control" type="text">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <form class="form-horizontal">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_age">Age</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_age" name="patients_age" class="form-control" type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_gender">Gender</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_gender" name="patients_gender" class="form-control" type="text">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <form class="form-horizontal">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_date">Date</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_date" name="patients_date" class="form-control" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_pid">Patient's ID</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_pid" name="patients_pid" class="form-control" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>  
                                                        </div>
                                                        <!-- Close Add Prescription -->

                                                        <div style="border: 1px solid #ccc;" class="content-box margin1">
                                                            <div class="row margin1">
                                                                <div class="col-lg-12">

                                                                    <div class="col-md-4">
                                                                        <form class="form-horizontal">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_height">Height</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_height" name="patients_height" class="form-control" placeholder="e.g 5.6 inc" type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_weight">Weight</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_weight" name="patients_weight" class="form-control" placeholder="e.g 50 kg/other" type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_bp">B. Pressure</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_bp" name="patients_bp" class="form-control" type="text" placeholder="e.g 80-120">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_pte">Problem To Eat</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_pte" name="patients_pte" class="form-control" type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_nexta">Next Appointment</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_nexta" name="patients_nexta" class="form-control" type="text">
                                                                                </div>
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_disease_name">Disease Name</label>
                                                                                <div class="col-lg-8">
                                                                                    <div class="input-group">
                                                                                        <input type="text" id="patients_disease_name" name="patients_disease_name" class="form-control">
                                                                                        <span class="input-group-btn">
                                                                                            <button id="patients_disease_name_add" class="btn btn-info" type="button">Add</button>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_tests">Tests</label>
                                                                                <div class="col-lg-8">
                                                                                    <div class="input-group">
                                                                                        <input id="patients_tests" name="patients_tests" type="text" class="form-control">
                                                                                        <span class="input-group-btn">
                                                                                            <button id="patients_tests_add" class="btn btn-info" type="button">Add</button>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="box">
                                                                                <header>
                                                                                    <div class="icons">
                                                                                        <i class="fa fa-table"></i>
                                                                                    </div>
                                                                                    <h5>Disease</h5>
                                                                                    <div class="toolbar">
                                                                                        <div class="btn-group">
                                                                                            <a href="#stripedTable1" data-toggle="collapse" class="btn btn-default btn-sm minimize-box">
                                                                                                <i class="fa fa-angle-up"></i>
                                                                                            </a> 
                                                                                        </div>
                                                                                    </div>
                                                                                </header>
                                                                                <section id="no-more-tables">
                                                                                    <div id="stripedTable1" class="body collapse in">
                                                                                        <table class="table table-striped responsive-table">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>Disease</th>
                                                                                                    <th>Action</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody id="disease_table">

                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </section>
                                                                            </div>

                                                                            <div class="box">
                                                                                <header>
                                                                                    <div class="icons">
                                                                                        <i class="fa fa-table"></i>
                                                                                    </div>
                                                                                    <h5>Tests</h5>
                                                                                    <div class="toolbar">
                                                                                        <div class="btn-group">
                                                                                            <a href="#stripedTable2" data-toggle="collapse" class="btn btn-default btn-sm minimize-box">
                                                                                                <i class="fa fa-angle-up"></i>
                                                                                            </a> 
                                                                                        </div>
                                                                                    </div>
                                                                                </header>
                                                                                <section id="no-more-tables">
                                                                                    <div id="stripedTable2" class="body collapse in">
                                                                                        <table class="table table-striped responsive-table">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>Tests</th>
                                                                                                    <th>Action</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody id="tests_table">

                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </section>
                                                                            </div>

                                                                        </form>
                                                                    </div>

                                                                    <div class="col-md-8">
                                                                        <div class="col-lg-12">
                                                                            <form class="form-horizontal">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-lg-2" for="patients_medicine">Medicine</label>
                                                                                    <div class="col-lg-5">
                                                                                        <input id="patients_medicine_category" name="patients_medicine_category" class="form-control" type="text" placeholder="Category">
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <input id="patients_medicine_generic_name" name="patients_medicine_generic_name" class="form-control" type="text" placeholder="Medicine Name">
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-8">
                                                                        <div class="col-lg-12">
                                                                            <form class="form-horizontal">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-lg-2" for="patients_dose">Dose</label>
                                                                                    <div class="col-lg-3">
                                                                                        <select class="form-control" id="patients_dtime" name="patients_dtime">
                                                                                            <option value="0">--Select--</option>
                                                                                            <option value="1+1+1">1+1+1</option>
                                                                                            <option value="1+1+0">1+1+0</option>
                                                                                            <option value="1+0+1">1+0+1</option>
                                                                                            <option value="0+1+1">0+1+1</option>
                                                                                            <option value="1+0+0">1+0+0</option>
                                                                                            <option value="0+1+0">0+1+0</option>
                                                                                            <option value="0+0+1">0+0+1</option>
                                                                                            <option value="Other">Other</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-lg-3">
                                                                                        <select class="form-control" id="patients_dlevel" name="patients_dlevel">
                                                                                            <option value="0">--Select--</option>
                                                                                            <option value="Before">Before</option>
                                                                                            <option value="After">After</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-lg-4">
                                                                                        <input id="patients_dmunite" name="patients_dmunite" class="form-control" type="text" placeholder="Minutes">
                                                                                    </div>

                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-8">

                                                                        <div class="col-lg-12">
                                                                            <center><a id="add_medicine" class="btn col-lg-4 col-lg-offset-4 btn-primary" href="#" data-original-title="" title="">Add Medicine</a></center>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-8">
                                                                        <div class="col-lg-12">

                                                                            <div class="box">
                                                                                <header>
                                                                                    <div class="icons">
                                                                                        <i class="fa fa-table"></i>
                                                                                    </div>
                                                                                    <h5>Medicine</h5>
                                                                                    <div class="toolbar">
                                                                                        <div class="btn-group">
                                                                                            <a href="#stripedTable3" data-toggle="collapse" class="btn btn-default btn-sm minimize-box">
                                                                                                <i class="fa fa-angle-up"></i>
                                                                                            </a> 
                                                                                        </div>
                                                                                    </div>
                                                                                </header>
                                                                                <section id="no-more-tables">
                                                                                    <div id="stripedTable3" class="body collapse in">
                                                                                        <table class="table table-striped responsive-table">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>#</th>
                                                                                                    <th>Medicine Name</th>
                                                                                                    <th>Dose</th>
                                                                                                    <th>Note</th>
                                                                                                    <th>Action</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody id="medicne_table">

                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </section>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-8">
                                                                        <div class="col-lg-12">

                                                                            <div class="col-lg-3 col-lg-offset-3">
                                                                                <center><a id="add_prescription_submit" class="btn btn-primary btn-defaultg" href="#" data-original-title="" title="">Add prescription</a></center>
                                                                            </div>

                                                                            <div class="col-lg-3">
                                                                                <center><a id="reset_prescription_submit" class="btn btn-primary btn-defaultg" href="#" data-original-title="" title="">Reset Prescription</a></center>
                                                                            </div>
                                                                        </div>
                                                                    </div>




                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Add prescription -->
                                            <div class="tab-pane" id="edit_prescription">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="box">
                                                            <header>
                                                                <div class="icons">
                                                                    <i class="fa fa-table"></i>
                                                                </div>
                                                                <h5>Doctor List</h5>
                                                            </header>
                                                            <section id="no-more-tables">
                                                                <div id="collapse4" class="body">
                                                                    <div id="dataTable_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="pull-right"><div id="dataTable_length" class="dataTables_length"><label>Show <select size="1" name="dataTable_length" aria-controls="dataTable"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><table id="dataTable" class="table table-bordered table-condensed table-hover table-striped responsive-table dataTable">
                                                                        <thead>
                                                                            <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="P. ID: activate to sort column descending" style="width: 0px;">P. ID</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 0px;">Name</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 0px;">Phone</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 0px;">Email</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 0px;">Action</th></tr>
                                                                        </thead>
                                                                        
                                                                    <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd"><td valign="top" colspan="5" class="dataTables_empty">No data available in table</td></tr></tbody></table><div class="row"><div class="col-lg-6"><div class="dataTables_filter" id="dataTable_filter"><label>Search: <input type="text" aria-controls="dataTable"></label></div></div><div class="col-lg-6"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination"><li class="prev disabled"><a href="#">← Previous</a></li><li class="next disabled"><a href="#">Next → </a></li></ul></div></div></div></div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Close tab-content -->
                                        </div>






                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Close main Rows -->










                    </div>
                    <!-- end .inner -->
                </div>
                <!-- end .outer -->
            </div>
            <!-- end #content -->



            </div><!-- /#wrap -->
<div id="footer">
    <p>Address : Lorem ipsum dolor sit amet, consectetur adipiscing elit. || Phone : 123456</p></div>

<script async="" src="https://www.google-analytics.com/analytics.js"></script><script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77919638-1', 'auto');
  ga('send', 'pageview');

</script>

<script src="assets/lib/jquery.min.js"></script>
<script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/main.min.js"></script>
            <script type="text/javascript" src="assets/js/doctor.js"></script>
            <script type="text/javascript" src="assets/lib/jasny/js/jasny-bootstrap.min.js"></script>
            <script type="text/javascript" src="assets/lib/datatables/jquery.dataTables.js"></script>
            <script src="assets/lib/datatables/DT_bootstrap.js"></script>

            <script src="assets/lib/tablesorter/js/jquery.tablesorter.min.js"></script>
            <script src="assets/lib/datepicker/js/bootstrap-datepicker.js"></script>
            <script type="text/javascript">
                $("#patients_nexta").datepicker({});
                $(function () {
                    metisTable();
                });
            </script><div class="datepicker dropdown-menu"><div class="datepicker-days" style="display: block;"><table class=" table-condensed"><thead><tr><th class="prev">‹</th><th colspan="5" class="switch">December 2020</th><th class="next">›</th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="day  old">29</td><td class="day  old">30</td><td class="day ">1</td><td class="day  active">2</td><td class="day ">3</td><td class="day ">4</td><td class="day ">5</td></tr><tr><td class="day ">6</td><td class="day ">7</td><td class="day ">8</td><td class="day ">9</td><td class="day ">10</td><td class="day ">11</td><td class="day ">12</td></tr><tr><td class="day ">13</td><td class="day ">14</td><td class="day ">15</td><td class="day ">16</td><td class="day ">17</td><td class="day ">18</td><td class="day ">19</td></tr><tr><td class="day ">20</td><td class="day ">21</td><td class="day ">22</td><td class="day ">23</td><td class="day ">24</td><td class="day ">25</td><td class="day ">26</td></tr><tr><td class="day ">27</td><td class="day ">28</td><td class="day ">29</td><td class="day ">30</td><td class="day ">31</td><td class="day  new">1</td><td class="day  new">2</td></tr><tr><td class="day  new">3</td><td class="day  new">4</td><td class="day  new">5</td><td class="day  new">6</td><td class="day  new">7</td><td class="day  new">8</td><td class="day  new">9</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev">‹</th><th colspan="5" class="switch">2020</th><th class="next">›</th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span class="month active">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev">‹</th><th colspan="5" class="switch">2020-2029</th><th class="next">›</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2019</span><span class="year active">2020</span><span class="year">2021</span><span class="year">2022</span><span class="year">2023</span><span class="year">2024</span><span class="year">2025</span><span class="year">2026</span><span class="year">2027</span><span class="year">2028</span><span class="year">2029</span><span class="year old">2030</span></td></tr></tbody></table></div></div>
        
    

</body></html>