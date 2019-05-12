<?php   
	session_start();  
	if(!isset($_SESSION["sess_user"]))
	{  
		header("location:login.php");  
	}
	$user = $_SESSION["sess_user"];
?>
<?php  

    $diary_table = "diary";

	include("connection.php");
	$id = 0;
    $res = mysqli_query($conn, "SELECT MAX(id)+1 FROM $diary_table");
	if(mysqli_num_rows($res) > 0)
	{
		$row = mysqli_fetch_array($res);
		if($row[0] == null)
		{
			$id = 1;
		}
		else
		{
			$id = $row[0];
		}
	}
?>

<html>  
<head>  
    <title>New Entry</title>  
</head> 

<link rel="stylesheet" type="text/css" href="webcss.css">
<h2 align="center">Hi <?=$_SESSION['sess_user'];?></h2> 

<body background="images/women.jpg"> 
<table>
	<tr>
	<td>
		<div id="lb">
		<a href="viewentry.php">	<input type="button" name="viewdiary" id="buttong" value="View Diary">	</a>
		</div>
	</td>
	<td>
		<div id="rb">
		<a href="logout.php">	<input type="button" name="logout" id="buttonr" value="Logout">	</a>
		</div>
	</td>
	</tr>
</table>

<form action = "" method = "POST" align="center">
	<center>
	<input type="hidden" name="id" value="<?php echo $id; ?>" >
	<input type = "date" name = "date" style="margin-top: 25px" required> <br /><br /> 


	<textarea rows="20" cols = "50" name = "entry" placeholder="Remember and write it!" style="background: url(images/pageline.png) repeat-y;
 			width: 500px;
			height: 250px;
 			font: normal 14px verdana;
 			line-height: 25px;
 			padding: 2px 10px;
 			border: solid 0.25px #ddd; "
			required></textarea> <br /> <br /> 

	<input type="submit" value="Add Entry" name="submit" id="buttonb" />   
	</center>
</form>  
</body>  
</html>



<?php  

$diary_table = "diary";

	if( isset($_POST["submit"]) )
	{           
		$id = $_POST['id'];
		$date = $_POST['date']; 
		$entry = $_POST['entry'];

		include("connection.php");
		$result = mysqli_query($conn, "INSERT INTO $diary_table(id, date, entry, username) VALUES('$id', '$date', '$entry','$user')");  
		if($result)
            {
             echo "
                <script>
                    alert(\"Diary Succusfully Entered.\");
                    window.location='newdiary.php';
                </script>
                ";     
            }       
	}	 
?>  
  