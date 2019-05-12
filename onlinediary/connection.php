<?php
$server = "localhost";
$server_username = "root";
$server_password = "";
$dbname = "onlinediary";
$conn = mysqli_connect($server, $server_username, $server_password) or die(mysqli_error());  
mysqli_select_db($conn, $dbname) or die("cannot select DB"); 
?>
