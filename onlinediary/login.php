<!doctype html>  
<html>  
    <head>  
	<link rel="stylesheet" type="text/css" href="webcss.css">
    <title>Login</title>
<body background="images/login.jpg">      
<h2 align="center">Online Diary</h2>

<div class="inputarea">
    <form action="" method="POST">  
      <div class="contents">
        Username: <input type="text" name="user" placeholder="Username" required/><br /> <br /> 
        Password: <input type="password" name="pass" placeholder="Password" required><br />   
        <div class="submit">  <input type="submit" id="buttonb" value="Login" name="submit" /></div> 
      <div class="register">  <br><a href="register.php">Don't have an account? Register Now!</a></div>
    </div>
        </form>  
</div>
</body>
</html>

<?php  
$logintable="login";
if(isset($_POST["submit"]))
{
        $user = $_POST['user'];  
        $pass = $_POST['pass'];  

        include("connection.php");
        /*
        $conn = mysqli_connect($server, $server_username, $server_password) or die(mysqli_error());  
        mysqli_select_db($conn, $dbname) or die("cannot select DB");  
        */
        $query = mysqli_query($conn, "SELECT * FROM $logintable WHERE username = '".$user."' AND password = '".$pass."'");  
        $numrows = mysqli_num_rows($query);  
        
        if($numrows != 0)  
        {  
            while( $row = mysqli_fetch_array($query) )  
            {  
                $username = $row['username'];  
                $password = $row['password'];  
            }  
    
            if($user == $username && $pass == $password)  
            {  
                session_start();  
                $_SESSION['sess_user'] = $user;  
        
                /* Redirect browser */  
                header("Location: newdiary.php");  
            }  
        } 
        else 
        {  
            echo "
                <script>
                    alert(\"Invalid username or password!\");
                </script>
                ";
        }  
}  
?>  