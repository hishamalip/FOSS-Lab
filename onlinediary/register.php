<!doctype html>  
<html>  
<head>  
<link rel="stylesheet" type="text/css" href="webcss.css">
<title>Register</title>  
</head>  
<body background="images/register.jpg">   
<h2 align="center">Online Diary</h2>

<div class="inputarea">
<form action="" method="POST">
<div class="contents" style="margin-top: 0px;">
Full Name : <input type="text" name="name" placeholder="Full Name" required/><br /><br />
E-mail : <input type="email" name="email" placeholder="E-mail" required/><br /><br />
Username: <input type="text" name="user" placeholder="Username" required/><br />  <br />
Password: <input type="password" name="pass" placeholder="Password" required/><br />
<div class="submit"><input type="submit" value="Register" id="buttonb" name="submit" align="center"/> </div>
<div class="register"><br><a href="login.php"> Already an account? Login Now!</a></div>

</div>
</form>  
</div>
</body>  
</html>


<?php  

$login_table = "login";
$users_table = "user";

if( isset($_POST["submit"]) )
{   
        $name = $_POST['name'];
        $email = $_POST['email'];    
        $user = $_POST['user'];  
        $pass = $_POST['pass']; 
        $date = $_POST['date']; 
        

        // connection.php contains this (below commented codes) 
        /*
        $conn = mysqli_connect($server, $server_username, $server_password) or die(mysqli_error());  
        mysqli_select_db($conn, $dbname) or die("cannot select DB");  
        */
    	include("connection.php");
        $query = mysqli_query($conn, "SELECT * FROM $login_table WHERE username='".$user."'");  
        $numrows = mysqli_num_rows($query);  

        $query2 = mysqli_query($conn, "SELECT * FROM $users_table WHERE email='".$email."'");  
        $numrows2 = mysqli_num_rows($query2);

        if($numrows == 0 && $numrows2 == 0)  
        {  
            //insert into user table
            mysqli_query($conn, "INSERT INTO $users_table(username, name, email) VALUES('$user', '$name', '$email')");
            
            $sql = "INSERT INTO $login_table(username, password) VALUES('$user','$pass')"; 	
            $result = mysqli_query($conn, $sql);
            if($result)
            {
             echo "
                <script>
                    alert(\"Account Successfully Created. Login to continue\");
                    window.location='login.php';
                </script>
                ";     
            } 
            else 
            {  
                echo "Failure!";  
            }  
        }
        else if($numrows2 != 0)
        {
            echo "
                <script>
                    alert(\"This email id is already in use. Please try again with another.\");
                    window.location='register.php';
                </script>
                ";  
        } 
        else 
        {  
            echo "
                <script>
                    alert(\"This username already exists! Please try again with another.\");
                    window.location='register.php';
                </script>
                ";  
        }
        echo $date;
}  
?>  
  