<?php
    include("connection.php");
	session_start();  
	if(!isset($_SESSION["sess_user"]))
	{  
		header("location:login.php");  
	}
	$user = $_SESSION["sess_user"];
?>

<html>  
<head>
<title>View Entry</title>
<link rel="stylesheet" type="text/css" href="webcss.css">
</head>
<!--    <h2 align="center">Hi <?=$_SESSION['sess_user'];?></h2> -->
<h3 style="margin-left: 350px; margin-bottom: 40px">I always say, keep a diary and someday it'll keep you<sub> &nbsp;<font size=3px> -Mae West </font> </sub> </h3>

<body background="images/read.jpg"> 

<table>
    <tr>
    <td>
        <div id="lb">
        <a href="newdiary.php"><input type="button" name="viewdiary" id="buttong" value="Write Diary" id="button"></a>
        </div>
    </td>
    <td>

        <div id="rb">
        <a href="logout.php"><input type="button" name="viewdiary" id="buttonr" value="Logout"></a>
        </div>
    </td>
    </tr>
</table>

<form action = "" method = "POST" align="center">
	<input type = "date" name = "date" required style="margin-top: 35px"> <br /><br /> 
	<input type="submit" value="View Diary" id="buttonb" name="submit" />   
</form>


<?php  
    if( isset($_POST["submit"]) )
    {           
        $date = $_POST['date'];
        $result = mysqli_query($conn, "SELECT * FROM diary WHERE username = '$user' and date = '$date'");
        
        $entry_check = mysqli_query($conn, "SELECT date FROM diary WHERE username = '$user' AND date = '$date'");
        $x = mysqli_fetch_assoc($entry_check);

        if( $x == 0)
        {
            echo "No Entry Found. Please select another date";
        }
        else
        {
?>
<!--
            <table border = ".5px" align = "center">
                <tr> 
                    <td>    Date    </td>
                    <td>    Entry   </td>
                </tr>
-->
<?php
            //To collect the results one row at a time using mysqli_fetch_?
            while($row = mysqli_fetch_assoc($result))  //while($row = mysqli_fetch_array($result))   <-- we can also use this code
            {
?>

<!--
                <tr> 
                    <td>    <?php  echo $row['date']; ?>   </td>
                    <td>    <?php  echo $row['entry']; ?>   </td>
                </tr>
-->
<center>
<textarea rows="20" cols = "50" name = "entry" readonly="true" placeholder="Remember and write it!" style="background: url(images/pageline.png) repeat-y;
 			width: 600px;
			height: 300px;
 			font: normal 14px verdana;
 			line-height: 25px;
 			padding: 2px 10px;
 			border: solid 0.25px #ddd; "
			required> <?php  echo $row['date']; echo "\n"; ?><?php  echo $row['entry']; ?> </textarea>
</center>
<?php 
        }
    }
}
?>

</table>
</body>
</html>