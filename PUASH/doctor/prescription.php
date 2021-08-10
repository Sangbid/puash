<!-- <script>
data-cfasync='false'
</script> -->

<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$uniqueid=$_SESSION['uniqueid'];
$sql=mysqli_query($con,"select * from users where uniqueid='$uniqueid'");
$find=mysqli_fetch_array($sql);

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

       
		
	
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> -->

<!------ Include the above in your HEAD tag ---------->

	</head>
	<body>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<div id="app">

			<?php include('include/sidebar.php');?>
			<div class="app-content">


					<?php include('include/header.php');?>



				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
                    
						<!-- start: PAGE TITLE -->
						<section id="page-title" style="border-bottom:1px solid #4d79ff; background-color:#d6f5d6;">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Doctor | Add Prescription</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Add Prescription</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
                      
                        
						<div class="portlet-body form">
                            
                               

                           
                                  
                                        <div class="col-xs-12">
                                        <nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Prescription</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">View Prescription</a>
						
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade active show " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <!-- <form action="" id="prescription" class="prescription" method="POST">     -->
                    <div class="portlet-title">
                                         
                                                 <div class="form-group ">
                                                     
                                                    
                                                            <!--   -->
                                                            <!-- start hoder area -->
                                                            <!--  -->        
                                                        <div class="container">
                                                            <div class="main-header">
                                                                <div class="row header_area">
                                                            
                                                                    <div class="hed-1 "> <b>Patient ID:</b>                     
                                                                <?php
                                                                        echo $_SESSION['p_id'];
                                                                        
                                                                        ?> 
                                                                    </div>

                                                        <div class="col-md-2">
                                                            <input type="text" autocomplete="off" class="form-control" placeholder="Patient Name" name="name" value=" <?php echo $find['fullname'] ?>"required="">
                                                        </div>

                                                        <input type="hidden" name="patient_id" required="">
                                                       
                                                        <div class="col-md-2">
                                                            <input type="text" autocomplete="off" class="form-control" placeholder="Phone Number" name="phone"  value=" <?php echo $find['phone'] ?>"required="">
                                                        </div>

                                                        <div class="col-md-2">
                                                            <input type="date" autocomplete="off" name="birth_date" class="form-control datepicker1 birth_date hasDatepicker" placeholder="Birth date" required="" id="dp1603524379919">
                                                        </div>

                                                        <div class="col-md-1">
                                                            <input type="text" autocomplete="off" name="age" id="age" class="form-control" placeholder="Age">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="md-radio">
                                                                <input type="radio" id="lb1" name="gender" value="Male">
                                                                <label for="lb1"> Male</label>
                                                            
                                                                <input type="radio" id="lb2" name="gender" value="Female">
                                                                 
                                                                <label for="lb2"> Female</label>
                                                            
                                                                <input type="radio" id="lb3" name="gender" value="Others">
                                                                 
                                                                Others                                                            </div>
                                                            </div>
                                                     </div>

                                                
                                            </div>
                                           
                                        </div>
                                   
                                    

                                    <div class="col-md-12">
                                         <div class="form-group ">
                                            <div class="col-md-6"><input type="text" class="form-control" placeholder="Patient CC" name="Problem"></div>
                                            <div class="col-md-2"><input type="text" class="form-control" placeholder="Patient Weight" name="Weight" value=""></div> 
                                            <div class="col-md-2"><input type="text" class="form-control" placeholder="Patient BP" name="Pressure" value=""></div>
                                            <div class="col-md-2"><input type="text" class="form-control" placeholder="Temperature" name="temperature" value=""></div>
                                        </div>
                                    </div><hr>

                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <div class="col-md-4"><input type="text" class="form-control" placeholder="History" name="history"></div>
                                            <div class="col-md-4"><input type="text" class="form-control" placeholder="O/Ex" name="oex"></div>
                                            <div class="col-md-4"><input type="text" class="form-control" placeholder="PD" name="pd" value=""></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                <div class="row">

                                            <div class="col-sm-12 col-xs-12">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr> 
                                                            <td colspan="6" class="m_add_btn">Medicine <a href="javascript:void(0);" class="btn btn-primary add_button pull-right" title="Add field"> <span class="glyphicon glyphicon-plus"></span>Add</a></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="field_wrapper">
                                                                    <div class="form-group ">
                                                                         <div class="col-md-1 col-xs-12">
                                                                            <input type="text" class="form-control" name="type[]" placeholder="Type">
                                                                           
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <input type="hidden" class="mdcn_value" name="medicine_id" value="">
                                                                            <input type="text" class="mdcn_name form-control" name="md_name[]" autocomplete="off" placeholder="Medicine Name">
                                                                            <div id="suggesstion-box"></div>
                                                                        </div>

                                                                        <div class="col-md-2"><input type="text" class="form-control" placeholder="Mg/Ml" name="mg[]"></div> 
                                                                        <div class="col-md-1"><input type="text" class="form-control" placeholder="Dose" name="dose[]"></div>
                                                                        <div class="col-md-1"><input type="text" class="form-control" placeholder="Day" name="day[]"></div>
                                                                        <div class="col-md-3"><input type="text" class="form-control" placeholder="Comments" name="comments[]"></div> 
                                                                        <a href="javascript:void(0);" class=" btn btn-danger remove_button" title="Remove field"><span class="glyphicon glyphicon-trash"></span></a>
                                                                    </div> 
                                                     
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6">
                                                                <div class="form-group col-md-12">
                                                                    <textarea placeholder="Overall Comment" name="prescription_comment" class="form-control" rows="2"></textarea>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                <!-- -->
                                <!-- start Test area  -->
                                <!-- -->
                                <div class="col-sm-6 col-xs-12">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr> 
                                                             <td colspan="6" class="t_add_btn">Test 
                                                                 <a href="javascript:void(0);"  class="btn btn-primary add_button1 pull-right" title="Add field"><span class="glyphicon glyphicon-plus"></span>Add</a>
                                                             </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <tr>
                                                                <td> 
                                                                    <div class="field_wrapper1">
                                                                        <div id="count_test1">
                                                                        <div class="form-group ">
                                                                            <div class="col-md-5">
                                                                                <input type="hidden" class="test_value" name="test_name[]" value="">
                                                                                <input placeholder="Test Name" class="test_name form-control" name="te_name[]" autocomplete="off">
                                                                                <div id="test-box"></div>
                                                                            </div>
                                                                            <div class="col-md-5"> 
                                                                                <input placeholder="Description" name="test_description[]" class="form-control"><samp> </samp>
                                                                            </div>
                                                                            <a href="javascript:void(0);" class=" btn btn-danger remove_button" title="Remove field"><span class="glyphicon glyphicon-trash"></span></a>
                                                                        </div>
                                                                    </div>
                                                                    <div id="count_test2"></div><div id="count_test3"></div><div id="count_test4"></div></div>

                                                                </td>
                                                            </tr>
                                  
                                                    </tbody>
                                                </table>
                                            </div>

                                    <!--  -->
                                    <!-- Advice area  -->
                                    <!--  -->
                                            
                                            <div class="col-sm-6 col-xs-12">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr> 
                                                             <td colspan="6" class="a_btn">Advice 
                                                                <a href="javascript:void(0);" class="btn btn-primary add_advice pull-right" title="Add field"><span class="glyphicon glyphicon-plus"></span>Add  </a>
                                                             </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="field_wrapper2">
                                                                    <div id="count_advice1">
                                                                        <div class="form-group ">
                                                                            <div class="col-md-10">
                                                                                <input type="hidden" class="advice_value" name="advice[]" value="">
                                                                                <input placeholder="Advice " class="advice_name form-control" name="adv[]" autocomplete="off">
                                                                                <div id="advice-box"></div>
                                                                            </div><a href="javascript:void(0);" class=" btn btn-danger remove_button" title="Remove field"><span class="glyphicon glyphicon-trash"></span></a>
                                                                        </div>
                                                                    </div>              
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-offset-9 col-sm-6">
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                <button type="submit" name="submit" id="submit" class="btn btn-success">
                                                <a href="prescriptioncontroler.php" class="btn btn-success">Submit</a></button>
                                            </div>
                                        </div>

                                        </div>    

                             


                                  
                         
                        </div>
                                       
                                        
                    </div>
                    <!-- </form> -->
                    </div>
                    
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        
							
								
                            <div class="col-md-12">

                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">


                                            <table id="table" class ="table table bordered">
                                                <tr>
                                                    <th style="display:none;">ID</th>
                                                    <th>Date</th>
                                                    <th>By</th>
                                                    <th>Action</th>


                                                </tr>
                                                <?php
                                    $query=mysqli_query($con,"select id,name,md_name,current_date,doctorsauthor from prescription where pid='$uniqueid'");
                                    while($row1=mysqli_fetch_array($query))
                                    {
                        
                                                    ?>
                                                    <tr>
                                                        <td style="display:none;"><?php echo $row1['id']?></td>
                                                        
                                                        <td><?php echo $row1['current_date']?>
                                                        </td>
                                                        <td><?php echo $row1['doctorsauthor']?>
                                                        </td>
                                                        <td class="sorting_1" tabindex="0">  
                                                           <Button type ="submit" name='submit' class="submit"><a href="prescriptioncontroler.php"><i class="fa fa-eye">Prescription
                                       
                                    
                                                            </i></a></Button>
                                                                                        
                                                            
                                                                
                                                            <!-- <div class="result" id="result"></div> -->

                                      
   
                                                               
   
                                            



                                                            </tr>
                                                        <?php
                                                } ?>
                                            </table >
                                            
                                        </div>
                                    </div>

                                        </div>
                                    </div>
                                
                            </div>
                        
                    
                    </div>
					</div>
					
				</div>
                                            

                        
                                            
                                           



                

						<!-- end: SELECT BOXES -->

					</div>
                    
				</div>
			</div>
			<!-- start: FOOTER -->
	        <?php include('include/footer.php');?>
			<!-- end: FOOTER -->

	    		<!-- start: SETTINGS -->
	            <?php include('include/setting.php');?>
			<>
			<!-- end: SETTINGS -->
		</div>
        <!-- start: MAIN JAVASCRIPTS -->
        
<script type="text/javascript">


// Medicine
$(document).ready(function(){
            'use strict';

            var maxField = 50; 
            var addButton = $('.add_button'); 
            var wrapper = $('.field_wrapper');
            var x = 1; 
            var counter = 2;
            $(addButton).click(function(){ 
                if(x < maxField){ 
                    var fieldHTML = '<div id="count_'+(counter++)+'">'+
                    '<div class="form-group mdcn">'+
                    '<div class="col-md-1">'+
                    '<input type="text"  class="form-control" name="type[]"  placeholder="Type"  />'+
                    '</div>'+ 
                     '<div class="col-md-3">'+
                     '<input type="hidden" class="mdcn_value" name="medicine_id[]" value="" />'+
                     '<input type="text"  class="mdcn_name form-control" name="md_name[]"  placeholder="Medicine Name" autocomplete="off" required />'+
                     '<div id="suggesstion-box"></div>'+
                     '</div>'+

                     
                     '<div class="col-md-2"><input type="text"  class="form-control "  placeholder="Mg/Ml" name="mg[]" value=""/></div>'+ 
                     '<div class="col-md-1"><input type="text"  class="form-control"  placeholder="Dose" name="dose[]" /></div>'+
                     '<div class="col-md-1"><input type="text"  class="form-control"  placeholder="Day" name="day[]" /></div>'+
                     '<div class="col-md-3"><input type="text"  class="form-control"  placeholder="Comments" name="comments[]" /></div>'+ 
                   
                    '<a href="javascript:void(0);" class=" btn btn-danger remove_button" title="Remove field"><span class="glyphicon glyphicon-trash"></span></a></div>'+
                    '</div>';  

                    x++; 
                    $(wrapper).append(fieldHTML); 
                }
            });


        $(wrapper).on('click', '.remove_button', function(e){ 
            e.preventDefault();
            $(this).parent('div').remove(); 
            x--; 
        });


    });





$(document).ready(function(){
    'use strict';
	var i=1;
    var wrapper = $('.field_wrapper1');
    var testButton = $('.add_button1'); 
	$(testButton).click(function(){
		i++;
        var fieldHTML = '<div id="count_test'+(i)+'">'+
                '<div class="form-group ">'+
                 '<div class="col-md-5">'+
                 '<input type="hidden" class="test_value" name="test_name[]" value="" />'+
                 ' <input placeholder="Test Name" class="test_name form-control" name="te_name[]" autocomplete="off"  >'+
                 ' <div id="test-box"></div>'+
                 '</div>'+
                 '<div class="col-md-5"> <input placeholder="Description" name="test_description[]" class="form-control"  rows="2"></div>'+
                
               '<a href="javascript:void(0);" class=" btn btn-danger remove_button" title="Remove field"><span class="glyphicon glyphicon-trash"></span></a></div>'+
                '</div>';

                  $(wrapper).append(fieldHTML);
	});
    
	
	
    $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove();
                
            });



 // ========================================= -->
        //  advice info -->
        // ========================================= -->
   
        $(document).ready(function(){
            'use strict';

            var maxField = 50; 
            var add_advice = $('.add_advice'); 
            var wrapper = $('.field_wrapper2'); 
            var counter = 2;
            var x = 1; 

            $(add_advice).click(function(){ 
                if(x < maxField){
                  var fieldHTML = '<div id="count_add'+(counter++)+'">'+
                '<div class="form-group ">'+
                 '<div class="col-md-10">'+
                 '<input type="hidden" class="advice_value" name="advice[]" value="" />'+
                 ' <input placeholder="Advice" class="advice_name form-control" name="adv[]" autocomplete="off">'+
                 ' <div style="position:absolute;z-index:9999;" id="advice-box"></div>'+
                 '</div>'+
                
               '<a href="javascript:void(0);" class=" btn btn-danger remove_button" title="Remove field"><span class="glyphicon glyphicon-trash"></span></a></div>'+
                '</div>';

                  $(wrapper).append(fieldHTML);
                }
            });

           
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove();
                x--; 
            });
            // $('#nav-home-tab').click(function(e){
            //     $('#nav-profile').hide();
            //     $('#nav-home').show();
                
                
            // });
            // $('#nav-profile-tab').click(function(e){
            //     $('#nav-home').hide();
            //     $('#nav-profile').show();
                
            // });

           
        });
  







	
	$('#submit').click(function(){		
		$.ajax({
			url:"name.php",
			method:"POST",
			data:$('#prescription').serialize(),
			success:function(data)
			{
				
				$(this)[0].reset();
			}
		});
	});
	
});
</script>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
        <script src="assets/js/form-elements.js"></script>
        <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
           
            
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
