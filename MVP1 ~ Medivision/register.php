<?php

session_start();

if(isset($_SESSION['user'])!="") {
					
    header("Location: home.php");
								
}

include_once 'dbconnect.php';

if (isset($_POST['register'])) {
								
    $username = mysql_real_escape_string($_POST['username']);
    
    $email = mysql_real_escape_string($_POST['email']);
    
    $password = md5(mysql_real_escape_string($_POST['password']));
    
    $image = "includes/img/account_logo.png";
  
    $authorisation = "standard";
								
    $query = "SELECT * FROM users WHERE email='$email'";
    
    $result = mysql_query($query) or die(mysql_error());
								
    if (mysql_num_rows($result)) {
									
        ?> <script>alert("Username taken");</script> <?php
												
    } else {
									
        mysql_query("INSERT INTO users(username, email, password, image, authorisation) VALUES('$username','$email','$password', '$image', '$authorisation')");
												
        ?> <script>alert('Your account has now been registered, please visit the login page to sign in.');</script> <?php
												
    }
								
}

?>

<!DOCTYPE html>

<html>

    <head>
	
        <title>Medivision</title>
		
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		
            <link rel="stylesheet" href="includes/css/style.css" />
		
    </head>
	
    <body>
        
        <!-- Carls register form here -->
	
        <div id="login-form">
		
            <form method="post">
                
                <div class="title">Register</div>
			
                <input class="form-control" type="text" name="username" placeholder="your name" required />
				
                <input class="form-control" type="email" name="email" placeholder="your email" required />
							
                <input class="form-control" type="password" name="password" placeholder="your password" required />
                
                <button type="submit" name="register">Register</button> <a href="index.php">Log In</a>
				
            </form>
			
        </div>
		
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
					
    </body>
	
</html>