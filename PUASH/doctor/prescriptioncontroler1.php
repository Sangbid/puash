<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();



?>
<html lang="en"><head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title> Prescription </title>
            <!-- Bootstrap -->
           
            <!-- style -->
            <link href="https://doctorssnew.bdtask.com/web_assets/css/bootstrap.min.css" rel="stylesheet">
             <link href="https://doctorssnew.bdtask.com/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
            <script src="https://doctorssnew.bdtask.com/web_assets/js/jquery-min.js" type="text/javascript"></script>
            
            <!-- dynamic style -->
            <style type="text/css" rel="print">

  body{
      font-family: 'Poppins', sans-serif;
      background-color: #E0ECEA;
  }

  @media print {
    
      .mini-footer{
          background: #186AAB !important;
          text-align: center;
               color: #fff !important;
      }

      .header_area {
          background:  #186AAB !important; 
          color: #fff !important;
      }
      .footer1 {
          background:  #186AAB !important; 
          color: #fff !important;
      }

      a[href], 
      a[href]:after,
      a[href]:before, 
      .no-print{content:"" !important;display:none !important;visibility:hidden !important;}
  }



.container{
  background: #fff;
  width: 800px;
}


/*------------------------*/
/*header area*/
/*----------------------*/
.main-header{
  width: 800px;
  min-height:100px;
}

.header_area{
  border-top: 7px solid #186AAB;
  border-bottom: 7px double #EAEAEA;
  padding: 10px;
  background-color: #186AAB;
  color: #fff;
  width: 800px;
}

.hed-1{
  float: left;
  width: 40%;
}
.hed-2{
  float: right;
  width: 55%;
}

.address_area{
  padding: 10px;
  width: 800px;
}
.a-one{
  float: left;
  width: 55%;
}
.a-two{
  float: right;
  width: 45%;
}

.patient_area{
  border-bottom: 7px double #EAEAEA;
  width: 800px;
}
/*----------------------------*/


/*----------------------------*/
.left-side{
  border:1px solid #EAEAEA;
  float: left;
  width: 250px;
  min-height: 500px;
}

.test-list ul li {
  list-style: none;
  font-size: 15px;
  color: #000;
  line-height: 25px;
  margin-left: -40px;
   
}

/*----------------------------*/


/*----------------------------*/
.right-side{
  float: left;
  width: 550px;
  min-height: 500px;
  margin-top:5px;
}


/*-----------------------------------*/
.main-footer{
  width: 800px;
  min-height: 50px;
}
.footer1{
  border-top: 7px double #EAEAEA;
  padding: 10px;
  background-color: #186AAB;
  color: #fff;
}

#link{
  margin-top: 50px;
}
#signature{
  border-top: 2px dashed rgb(0, 0, 0);
  margin-top: 50px;
  text-align: center;
}
.f1{
  float: left;
  width: 55%;
}
.f2{
  float: right;
  width: 45%;
}
/*--------------------------------*/
li { font-size: 16px;}

.social-icons ul, .social-icons ul li {
    list-style: none;
    margin: 0;
    padding: 0;
    display: inline-block;
    background: #074C83;
}

.social-icons ul li a {
    display: inline-block;
    font-size: 15px;
    color: #fff;
    line-height: 40px;
    text-align: center;
    padding: 0 12px;
    margin-left: -5px;
    transition: all .3s ease;
}

.tg{
  margin-left:20px;
}

</style>            <style type="text/css" rel="print">



  @media print {
      a[href], 
      a[href]:after,
      a[href]:before, 
      .no-print{content:"" !important;display:none !important;visibility:hidden !important;}
  }

    
body{
    font-family: 'Poppins', sans-serif;
    background-color: #E0ECEA;
}

.container{
  background: #fff;
  width: 800px;
}

/*------------------------*/
/*header area*/
/*----------------------*/
.main-header{
  width: 

.f1{
  float: left;
  width: 55%;
}
.f2{
  float: right;
  width: 45%;
}
/*--------------------------------*/

li { font-size: 16px;}
.social-icons ul, .social-icons ul li {
    list-style: none;
    margin: 0;
    padding: 0;
    display: inline-block;
    background: #074C83;
}

.social-icons ul li a {
    display: inline-block;
    font-size: 15px;
    color: #fff;
    line-height: 40px;
    text-align: center;
    padding: 0 12px;
    margin-left: -5px;
    transition: all .3s ease;
}
</style>            <!-- end style -->

            <!-- print preview js -->
            <script src="" type="text/javascript"></script>

    </head>


    <body>
        <div class="container">
            <div id="default">
                
<!-- style -->
<link href="" rel="stylesheet">


    <div id="dif_p" class="container">
        <div class="row">
                     <a class="btn btn-primary" href="prescription.php"><i class="fa fa-plus" aria-hidden="true"></i> Create (Trade) </a>
            
            <div class="social-icons pull-right">
                <label class="radio-inline btn btn btn-primary" id="pad">Pad Print</label>
                <ul>
                    <li><a href="" onclick="if (!window.__cfRLUnblockHandlers) return false; printContent('div1')" title="Print"><i class="fa fa-print"></i></a></li>
                </ul>
            </div> 
        </div>
    </div>

    <div id="div1">
    
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

    	           <div class="hed-2"> 
    	                
    	                <a class="btn btn-primary" href="history.php"><i class="fa fa-plus" aria-hidden="true"></i> History </a>
    	            </div>
                    
    	        </div>

    	        <div class="row address_area">
    	            <div class="a-one">
                        <h4><?php
                        
                        echo $_SESSION['author'];?></h4>
    	                MBBS, FRCS <br>
    	                <b>Specialist</b><br>
    	                
    	                <b>Proper Use Of Antibiodtic and Safe Health</b>
    	            </div>

    	            <div class="a-two">
    	                <b>Chnkharpul</b><br>
    	                 dhaka-1229,
    	                Phone Number : 01783729544</div>
    	        </div>

    	        <div class="row patient_area">
    	            <div class="col-md-12">
    	                <h5>
    	                <strong>Patient Name:</strong> <b><?php
                        echo $_SESSION['name'];
                        
                        ?></b>,
    	                 &nbsp; <strong>Age :</strong> 
    	                 <?php
                        echo $_SESSION['age'];
                        
                        ?>
    	                 &nbsp;<strong>Gender :</strong> <?php
                        echo $_SESSION['gender'];
                        
                        ?>
    	                 &nbsp;<strong>Patient Weight :</strong> <?php
                        echo $_SESSION['Weight'];
                        
                        ?>, 
                         &nbsp;<strong>Patient BP :<?php
                        echo $_SESSION['Pressure'];
                        
                        ?></strong>     	                 </h5>
    	            </div>
    	        </div>
            </div>
        </div>

    <!--   -->
    <!-- end hoder area -->
    <!--  -->



    <!--   -->
    <!-- start content area -->
    <!--  -->  
            <div class="container">
                <div class="row">
                	<!-- laft sideber -->
                    <div class="col-md-4 col-sm-4 left-side">
		                    		                        <div class="problem">
		                            <h4>Patient CC </h4>
		                            <li class="tg"> <?php
                        echo $_SESSION['Problem'];
                        
                        ?></li>		                        </div>
		                      
                                                                <div class="history">
                                    <h4>History </h4>
                                    <li class="tg"> <?php
                        echo $_SESSION['history'];
                        
                        ?></li>                             </div>
                                
		                        
                                                                        <h4>O/Ex</h4>
                                        <li class="tg"> <?php
                        echo $_SESSION['oex'];
                        
                        ?> </li>                                
                                                                       <h4>PD </h4> 
                                       <li class="tg"> <?php
                        echo $_SESSION['pd'];
                        
                        ?></li> 
                                
                                		                       
		                        <div class="test-list">
		                             <h4>Test</h4>
		                            <ul>
		                                		                                
		                               <li> <?php
                        echo $_SESSION['te_name'];
                        
                        ?></li>
		                               
		                                		                                
		                               
		                               
		                                		                            </ul>
		                        </div>
                                 
		                         <div class="advice-details">
                                    <h4>Advice</h4>
                                    <ul>
                                                                                <li><?php
                        echo $_SESSION['adv'];
                        
                        ?></li>

                                                                               

                                                                            </ul>
                                </div>
                                                 </div><!--end left sideber-->



                    <!-- right sideber -->
                    <div class="col-md-8 col-sm-8 right-side">
                        <div class="table-responsive marg">
                            <table class="table table-bordered table-hover">
                                
                                <thead>
                                    
                                    <tr>
                                        
                                        <th>Type</th>
                                        <th>Medicine Name</th>
                                        <th>Mg/Ml</th>
                                        <th>Dose </th>
                                        <th>Day</th>
                                        <th>Comments</th>
                                    </tr>
                                    
                                </thead>

                                <tbody>

                        <tr>
                                      
                                        <td><?php
                        echo $_SESSION['type'];
                        
                        ?></td>
                                        <td><?php
                        echo $_SESSION['md_name'];
                        
                        ?></td>
                                        <td><?php
                        echo $_SESSION['mg'];
                        
                        ?></td>
                                        <td><?php
                        echo $_SESSION['dose'];
                        
                        ?></td>
                                        <td><?php
                        echo $_SESSION['day'];
                        
                        ?></td>
                                        <td><?php
                        echo $_SESSION['comments'];
                        
                        ?></td>
                                    </tr>
                               
		
                            </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="7" class="text-center">Stay Home, Be Safe</td>
                                    </tr>
                                </tfoot>
                                
                            </table>
                        </div>
                    </div><!-- end right sideber-->

                </div>
            </div>
        
            <!--   -->
            <!-- start footer area -->
            <!--  -->  
            <div class="container">

                <div class="row main-footer">
                    <div class="col-sm-7 f1">
                        <p id="link">Proper Use Of Antibiodtic And Safe Health</p>
                    </div>
                    <div class="col-sm-5 f2">
                        <p id="signature">Signature</p>
                    </div>
                </div>
                
	            <div class="col-sm-12 footer1">
	                CHAMBER TIME:
	                Start Time : 10:00 AM,
	                End Time : 10:00 PM	            </div>
            </div> 
        </div> 
<!--   -->
<!-- end footer area -->
<!--  -->  
    </div>


            </div>

            <div id="others" style="display: none;">
                <div class="alert alert-danger"></div>            </div>
        
    




</body></html>