<?php
   ob_start();
session_start();
require('printer_functions.php');
?>

<!doctype html>
<html lang="en">
<head>
    <title>FPAM System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css">
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js" ></script>
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="style.css">
      
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ADABAB;
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }
         
         h2{
            text-align: center;
            color: #017572;
         }
      </style>
      
   </head>
	
   <body>
      
      <h2>Attendence Management System</h2> 
      <div class = "container form-signin">
         
         <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				$con = mysqli_connect("localhost","root","","fpmsdb");
				// Check connection
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " .mysqli_connect_error();
				}
				else{
					$username = mysqli_real_escape_string($con,$_POST['username']);
					$password = mysqli_real_escape_string($con,$_POST['password']);
					$sel_user_query = "select * from logindata where Username= '$username' AND Password= '$password'";
					$result_user_query = mysqli_query($con, $sel_user_query);
					
					$check_user = mysqli_num_rows($result_user_query);
                    /*session is started if you don't write this line can't use $_Session  global variable*/
						
					if($check_user > 0){
						$_SESSION['username']=$_POST['username'];
                        $_SESSION["password"] = $_POST['password'];
						echo "<script>window.open('home.php','_self')</script>";
					}
					else{
						echo "<script>alert('username or password is not correct, try again!')</script>";
					}
				}
			}
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php ($_SERVER['PHP_SELF']); ?>" method = "post">
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Sign In</button>
         </form>
			
         Click here to clean <a href = "logout.php" tite = "Logout">Session.
         
      </div> 
      
   </body>
</html>