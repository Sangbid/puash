
<?php

$con = mysqli_connect('localhost', 'root', '', 'hms');
if(isset($_COOKIE['visit'])){

}
else{
    setcookie('visit', 'yes', time() + (60*60*24*30)); // cookie set for 1 month
    mysqli_query($con, "update visit set total_count = total_count+1");
}

?>