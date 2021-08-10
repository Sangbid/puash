<?php
session_start();
error_reporting(0);
include("../include/config.php");


$Search=mysqli_query($con,"SELECT * FROM blood_donor");
// $num=mysqli_fetch_array($Search);
if(isset($_POST['submit']))
{
  $Name= $_POST['name'];
  $Address=$_POST['address'];
  $Phone=$_POST['phone'];
  $blood_group=$_POST['blood_group'];


$Search1=mysqli_query($con,"SELECT * FROM blood_donor WHERE Name='$Name' and Phone='$Phone'");
$num=mysqli_fetch_array($Search1);
if($num>0){
  echo "<script>alert('Data already added.');window.location='../index.html'</script>";
}
else {
	mysqli_query($con,"insert blood_donor set Name='$Name',Address='$Address', Phone='$Phone',blood_group='$blood_group'");
  echo "<script>alert('Successfully Added. Thank You For Your Valuable Information.');</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blood Status</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
      <link rel="stylesheet" href="styles.css">
      <link rel="stylesheet" href="../homecss/login.css">

      <style media="screen">
        body{
          height: 100%;
          width: 100%;
          background: #38a16e;
          align-items: center;
          justify-content: center;
        }
        .main-gamla{
          width: 1050px;
          height: 100%;
          margin: 20px auto;
          margin-bottom: 20px;
        }
        .wrapper{
        	margin-top: 350px;
          margin-bottom: 20px;
        }
        .gamla{
          width: 80%;
          height: auto;
          text-align: center;
          justify-content: center;
          transform: translate(10% , 150px);
          font-size: 15px;
          font-weight: bold;
        }
        .donor{
          width: auto;
          height: 120px;
          margin-top: 20px;
          background:#454547;
          margin-left: 60px;
          padding: 20px 30px;
          float: left;
          border: 2px solid white;
          text-align: center;
          border-radius: 25px;
        }
        .donor:hover{
          background:#3b3b5e;
        }
        .sub{
          margin-top: 10px;
          border-radius: 20px;
          background: Green;
          padding: 10px;
          color: floralwhite;
          cursor: pointer;
          font-weight: bold;
          border: none;
          outline: none;
        }
        .sub:hover, .sub:active, .sub:focus{
          background: lightgreen;
          color: black;
        }


      .form-blood{
            width: auto;
            display: flex;
            text-align: center;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 5rem;
            overflow: hidden;
            grid-column: 1 / 2;
            grid-row: 1 / 2;
            transition: 0.2s 0.7s ease-in-out;
            z-index: 1;
        }
        fieldset{
          border: 3px solid green;
        }
        .form-group{
          width: 350px;
          text-align: center;
          padding: 15px;
          margin: 10px;
          border: 1px solid green;
          border-radius: 25px
        }
        .form-control{
          width: 320px;
          text-align: center;
            background: none;
            outline: none;
            border: none;
            line-height: 1;
            font-weight: 600;
            font-size: 1.1rem;
            color: #333;
        }

        select{
          text-align: center;
          text-align-last:center;
        }

        header{
          background: none;
        }
        
		
	
      </style>
  </head>
  <body>

<section class="main-gamla">
  <header>
      <a href="../index.html" class="logo"><h2>PUASH</h2> Proper Use of Antibiotic & Safe Health</a>
  </header>

    <div class="gamla">
      <h2 style="color: white;">Please select an option. </h2>
      <div class="donor">
        Do you want to donate your blood?<br>
        <button type="button" name="button" id='donate' class="sub">Donate</button>
      </div>

      <div class="donor">
        Are you looking for a blood donor?<br>
        <button type="button" name="button" id='search' class="sub">Search</button>
      </div>

    </div>

<!-- .................. -->
    <div class="wrapper" id='wrap' style="display:none">
    	<div class="links">
    		<ul>
    			<li data-view="list-view" class="li-list active" id="list">
    			<i class="fas fa-th-list"></i>
    			List View</li>
    			<li data-view="grid-view" class="li-grid" id="grid">
    			<i class="fas fa-th-large"></i>
    			Grid View</li>
    		</ul>
    	</div>
    	<div class="view_main">
    		<div class="view_wrap list-view" id="allview" style="display: block;">

    <?php
    while ($num=mysqli_fetch_array($Search)) {

     ?>
    			<div class="view_item">
    				<div class="vi_left">
    					<img src="images/user-svgrepo-com.svg">
    				</div>
    				<div class="vi_right">
    					<p class="title"><b>Name: </b><?php echo $num['Name']; ?></p>
    					<p class="content">
                            <b>Address: </b><?php echo $num['Address']; ?><br>
                            <b>Phone: </b><?php echo $num['Phone']; ?><br>
    												<b>Blood Group: </b><?php echo $num['blood_group']; ?>
    											</p>
    				</div>
    			</div>
    		<?php } ?>
    		</div>
    	</div>
    </div>
<!-- .................. -->
<div class="wrapper" id='wrap1' style="display:none">
  <div class="view_main">

      <form class="form-blood" method="post">
        <fieldset>
          <legend>
            &nbsp;&nbsp; Add your Information &nbsp;&nbsp;
          </legend> <br>
          <p style="color:white; background-color:green; text-align:center; width:60%;"> <span><?php echo $_SESSION['cmsg']; ?><?php echo $_SESSION['cmsg']="";?></span></p>

          <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Your Name" required>
          </div>
          <div class="form-group form-actions">
              <input type="text" class="form-control" name="address" placeholder="Address" required>
          </div>
          <div class="form-group">
              <input type="number" class="form-control" name="phone" placeholder="Phone Number" required>
          </div>
          <div class="form-group form-actions">
              <!-- <input type="text" class="form-control" name="blood_group" placeholder="Blood Group" required> -->
              <select class="form-control" name="blood_group" placeholder="Blood Group" type="text" required="required">
                <option selected="true" disabled="disabled" value="">Select Your Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
              </select>
          </div>
          <div class="form-actions">
            <button type="submit" class="sub" name="submit">
              Submit
            </button>
          </div> <br>

        </fieldset>
      </form>

  </div>
</div>
<!-- .................. -->
    <br><br><br><br><br><br><br><br>

</section>

<!-- footer -->
    <!-- <div class="copyrightText" style="position:fixed; bottom:0;width:100%;">
      <p>
        Copyright © 2020 By PUASH Team. All Rights Reserved.
      </p>
    </div> -->

   
<script type="text/javascript">
var donate=document.getElementById('donate');
var search=document.getElementById('search');
var wrap=document.getElementById('wrap');
var wrap1=document.getElementById('wrap1');

search.onclick = function(){
wrap.style.display="block";
wrap1.style.display="none";
}
donate.onclick = function(){
wrap.style.display="none";
wrap1.style.display="block";
}
</script>


<script type="text/javascript">
var list=document.getElementById("list");
var grid=document.getElementById("grid");
var li_links = document.querySelectorAll(".links ul li");

li_links.forEach(function(link){
list.onclick = function(){
	document.getElementById("allview").className = "view_wrap list-view";
	li_links.forEach(function(link){
		link.classList.add("active");
	})
	link.classList.remove("active");
}
grid.onclick = function(){
	document.getElementById("allview").className = "view_wrap grid-view";
	li_links.forEach(function(link){
		link.classList.remove("active");
	})
	link.classList.add("active");
}
})
</script>


<script type="text/javascript">
  // For Sticky Nav Bar
  window.addEventListener("scroll", function(){
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0);
    })
</script>

<script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>
  </body>
</html>
