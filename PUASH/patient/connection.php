<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$con = new mysqli("localhost", "root", "", "hms");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>
