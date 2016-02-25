<?php

session_start();

if(isset($_SESSION['user'])!="") {
					
    header("Location: home.php");
								
}

include_once 'dbconnect.php';

if (isset($_POST['register'])) {
								
    $username = strtolower(mysql_real_escape_string($_POST['username']));
    
    $email = strtolower(mysql_real_escape_string($_POST['email']));
    
    $password = md5(mysql_real_escape_string($_POST['password']));
    
    $department = $_POST['department'];
    
    $title = $_POST['title'];
    
    $image = "includes/img/account_logo.png";
  
    $authorisation = "standard";
								
    $query = "SELECT * FROM users WHERE email='$email'";
    
    $result = mysql_query($query) or die(mysql_error());
								
    if (mysql_num_rows($result)) {
									
        ?> <script>alert("Username taken");</script> <?php
												
    } else {
									
        mysql_query("INSERT INTO users(username, email, password, image, authorisation, title, department) VALUES('$username','$email','$password', '$image', '$authorisation', '$title', '$department')");
												
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
        
            <link rel="stylesheet" href="includes/css/login-register.css" />
        
            <meta name="viewport" content="width=device-width, user-scalable=no" />
		
    </head>
	
    <body>
        
	       <div style="margin-top:50px; max-width: 350px;" class="container">

            <div class="row">

                <div class="panel panel-default">
                    
                    <div class="panel-body">
        
                        <h3> Register for Medivision</h3> <hr>
        
                        <form method="post">
                            
                            <div class="col-sm-12">

                                <div class="form-group">

                                    <label class="control-label" for="title">Title</label>

                                    <select name="title" class="form-control" required>

                                      <option></option>
                                        
                                      <option value="Dr">Dr</option>

                                      <option value="Mr">Mr</option>

                                      <option value="Mrs">Mrs</option>

                                      <option value="Miss">Miss</option>

                                      <option value="Ms">Ms</option>

                                    </select> 

                                </div>

                                <div class="form-group">

                                    <label class="control-label" for="name">Name</label>

                                    <input name="username" type="text" placeholder="E.g John Doe" class="form-control" required>

                                </div>

                                <div class="form-group">

                                    <label class="control-label" for="department">Department</label>

                                    <select name="department" class="form-control" required>

                                      <option></option>

                                      <option value="Doctors Office">Reception</option>

                                      <option value="First Aid Office">Doctors Office</option>

                                      <option value="Surgeon Office">First Aid Office</option>

                                      <option value="Medical Recovery Ward">Surgeon Office</option>

                                      <option value="Medical ICR Ward">Medical Recovery Ward</option>

                                      <option value="Medical Out Patients">Medical ICR Ward</option>

                                      <option value="Ground Ambulance">Medical Out Patients</option>

                                      <option value="Air Ambulance">Ground Ambulance</option>

                                      <option value="Motorcycle Ambulance">Air Ambulance</option>

                                      <option value="First Response Paramedic">Motorcycle Ambulance</option>

                                      <option value="First Response Doctor">First Response Paramedic</option>

                                      <option value="">First Response Doctor</option>

                                    </select>

                                </div>

                                <div class="form-group">

                                    <label class="control-label" for="email">Email</label>

                                    <input id="email" name="email" type="email" placeholder="E.g johndoe@dhh.nhs.uk" class="form-control input-md" required>

                                </div>

                                <div class="form-group">

                                    <label class="control-label" for="password">Password</label>

                                    <input pattern=".{12,}"   required title="12 characters minimum" name="password" type="password" placeholder="********" class="form-control input-md" required>

                                </div>

                                <div class="form-group">

                                    <input class="btn btn-primary form-control" style="margin-bottom: 10px;" value="Register" type="submit" name="register" />
                                    
                                    <a href="index.php"><input class="btn btn-primary form-control" value="Login" name="login" /></a>

                                </div>

                            </div>
                        
                        </form>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
        <!-- Carls register form here -->
	
        <!-- <div id="login-form">
		
            <form method="post">
                
                <div class="title">Register</div>
			
                <input class="form-control" type="text" name="username" placeholder="your name" required />
				
                <input class="form-control" type="email" name="email" placeholder="your email" required />
							
                <input class="form-control" type="password" name="password" placeholder="your password" required />
                
                <button type="submit" name="register">Register</button> <a href="index.php">Log In</a>
				
            </form>
			
        </div> -->
		
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
					
    </body>
	
</html>