<?php

session_start();

include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="") {

    header("Location: home.php");

}

if(isset($_POST['login'])) {

    $email = strtolower(mysql_real_escape_string($_POST['email']));

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
        
        <link rel="stylesheet" href="includes/css/login-register.css" />
        
        <meta name="viewport" content="width=device-width, user-scalable=no" />
                
    </head>
    
    <body>
    
                    
        <!-- Carls login form here -->
        
        <div class="container">
            
            <div class="card card-container">
                
                <div class="logo"> <img width="40%" src="http://s11.postimg.org/ih2cj5ob7/medivision_logo.png">
                    
                <hr />
                    
                <p>Please Login To MediVision</p>
                
                <form class="form-signin" method="post">
                
                   <input class="form-control" type="text" name="email" placeholder="johndoe@example.com" required />

                    <input class="form-control" type="password" name="password" placeholder="Password" required />

                    <input type="submit" style="margin-bottom: 10px;" class="btn btn-lg btn-primary btn-block btn-signin" value="Sign In" name="login" />
                    
                    <a href="register.php"><input class="btn btn-lg btn-primary btn-block btn-signin" value="New User?" /></a>
                    
                </form>
                    
                </div>
            
            </div>
    
        </div>
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
    </body>
    
</html>
