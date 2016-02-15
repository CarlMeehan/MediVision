<?php

session_start();

include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="") {

    header("Location: home.php");

}

if(isset($_POST['login'])) {

    $email = mysql_real_escape_string($_POST['email']);

    $password = mysql_real_escape_string($_POST['password']);

    $result = mysql_query("SELECT * FROM users WHERE email='$email'");

    $row=mysql_fetch_array($result);

    if($row['password'] == md5($password)) {

        $_SESSION['user'] = $row['user_id'];

        header("Location: home.php");

    } else {

        ?><script>alert('wrong details');</script><?php

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
    
        <!-- Carls login form here -->
        
        <div id="login-form">
        
            <form method="post">
                
                <div class="title">Login</div>
            
                <input class="form-control" type="text" name="email" placeholder="johndoe@example.com" required />
                
                <input class="form-control" type="password" name="password" placeholder="Password" required />
                
                <input type="submit" name="login" value="Sign In" /> <a href="register.php">Register</a>
                
            </form>
            
        </div>
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
    </body>
    
</html>
