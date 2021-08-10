<?php
include('../include/config.php');
include('track.php');
if(isset($_POST['submit']))
{
	$fname=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['mobile'];
	$subject=$_POST['sub'];

$sql=mysqli_query($con,"insert into contact(name,email,mobile,subject) values('$fname','$email','$phone','$subject')");
if($sql){
	echo "<script>alert('Your message has been sent.');window.location='../index.html'</script>";
		// $_SESSION['msg']="Your message has been sent";
}
else {
	echo "<script>alert('Invalid!!');</script>";
	// $_SESSION['errmsg']="Invalid!!";
}
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Select for login or signup</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css"  media="all" />
    <link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../homecss/login.css">

    <style media="screen">
    .homec{
    width:50%;
    text-align:center;
    position:flex;
    }
    .logoc a{
      position: relative;
      font-weight: 700;
      color: darkcyan;
      text-decoration: none;
      font-size: 2em;
      text-transform: uppercase;
      letter-spacing: 2px;
      transition: 0.6s;
    }
    .btnc{
      padding: 10px 10px;
      border: 1px solid black;
      background-color: black;
      color: white;
      cursor: pointer;
    }
    .btnc:hover{
      background-color: White;
      color: black;
    }
    .contact-form input[type="email"],input[type="number"]{
          padding: 8px;
          display: block;
          width: 98%;
          background: #fcfcfc;
          border: none;
          outline: none;
          /* color: black; */
          color: rgb(139, 139, 139);
          font-size: 0.8125em;
          font-family: Arial, Helvetica, sans-serif;
          -webkit-box-shadow: inset 0px 0px 3px rgb(199, 199, 199);
    }
    .c-black{
      color: black !important;
    }

    @media screen and (max-width:800px) and (min-width: 700px){
      .span_1_of_3{
    		width: 30% !important;
        float: left;
    	}
    	.images_3_of_1 ,.span_2_of_3{
    		width: 60% !important;
    	}
    }
    @media (min-width: 700px){
      .span_1_of_3{
    		margin-top: -20%;
    	}
    }

    </style>
  </head>
  <body>
<section class="total-bdy" style="margin-top:-15px;">
      <header>
          <a href="../index.html" class="logo"><h2>PUASH</h2> Proper Use of Antibiotic & Safe Health</a>
          <!-- <a href="#" class="contact">Contact</a> -->

      </header>

      <div class="contain" id="contain">
        <div class="">

        </div>
                  <div class="col span_1_of_3">
                      <div class="company_address">
                        <h2 class="c-black">Dear Sir/Mam</h2>
                            <p class="c-black">Please fillup this form first to contact with us. </p>
                            <p class="c-black">Without form fillup, we can not get your messages.</p>
                            <p class="c-black">Don't forget to give us your review.</p>
                            <p class="c-black">We always care your valuable feedback.</p>
                            <p class="c-black">To stay with PUASH, many many thanks to you.</p>
                      <p class="c-black">Email: <span>puash.bd@gmail.com</span></p>

                     </div>
                  </div>
        <div class="col span_2_of_3">
          <div class="contact-form">
            <h2 class="c-black">Contact Us</h2>
                  <form autocomplete="off" method="post">
                    <div class="from">
                      <span><label class="c-black">NAME</label></span>
                      <span><input type="text" name="name" value="" required></span>
                    </div>
                    <div class="from">
                      <span><label class="c-black">E-MAIL</label></span>
                      <span><input type="email" name="email" value="" required></span>
                    </div>
                    <div class="from">
                      <span><label class="c-black">MOBILE.NO</label></span>
                      <span><input type="number" name="mobile" value="" required></span>
                    </div>
                    <div>
                      <span><label class="c-black">SUBJECT</label></span>
                      <span>
                        <textarea name="sub" id="text" placeholder="Describe your problem..."> </textarea></span>
                    </div>
                   <div>
                    <button class="btnc" type="submit" name="submit" value="submit">SUBMIT</button>
                  </div>
                  </form>
            </div>
          </div>
        </div>

    </section>



<!-- footer -->
    <div class="copyrightText">
      <p>
        Copyright © 2021 By PUASH Team. All Rights Reserved.
      </p>
    </div>

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
