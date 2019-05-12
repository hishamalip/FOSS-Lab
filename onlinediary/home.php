<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
} else {  
?>  
<!doctype html>  
<html>  
<head>  
<link rel="stylesheet" type="text/css" href="webcss.css">
<title>Home Page</title>  
</head> 

<body>
<h2>Welcome, <?=$_SESSION['sess_user'];?>! <a href="logout.php">Logout</a></h2>  
<p> 
</p>  

</body>  
</html>  
<?php  
}  
?>

<?php
//$x = $_SESSION["sess_user"];
//echo $x;
?>