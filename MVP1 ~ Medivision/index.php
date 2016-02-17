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
        <link rel="stylesheet" type="text/css" href="includes/css/login.css" media="screen" />
  <style>
    body {
      background-image: url("https://static.pexels.com/photos/34844/pexels-photo.jpg");
      background-size: cover;
    }
  </style>
    </head>
    
    <body>
    
        <!-- Carls login form here -->
        
         <div class="container">
    <div class="card card-container">
      <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
      <div class="logo"> <img width="40%" src="http://s11.postimg.org/ih2cj5ob7/medivision_logo.png">
        <hr>
        <p> Please Login To MediVision</p>
      </div> 
      <p id="profile-name" class="profile-name-card"></p>
        
                 <form method="post">
                <input class="form-control" type="text" name="email" placeholder="johndoe@example.com" required />
        <br>
    
                <input class="form-control" type="password" name="password" placeholder="Password" required />
        <br>
               <center>
                <input class="btn btn-default" type="submit" name="login" value="Sign In" /> 
        
        <a class="btn btn-default" href="register.php"> Register</a></center> 
                
            </form>
        
        <hr>
        <p style="font-size:8pt;text-align:center;"> Software Developed By MediVision.
          <br> Copyright 2016 MediVision Ltd</p>
     
      
    </div>
        </div>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
    </body>
    
</html>
