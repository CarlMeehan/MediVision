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
    
    $title = mysql_real_escape_string($_POST['title']);
    
    $surname = mysql_real_escape_string($_POST['surname']);
    
    $start_date = mysql_real_escape_string($_POST['start_date']);
    
    $sup_email = mysql_real_escape_string($_POST['sup_email']);
    
    $authcode = md5(mysql_real_escape_string($_POST['authcode']));
    
    $image = "includes/img/account_logo.png";
  
    $department = mysql_real_escape_string($_POST['department']);
    
    $authorisation = "standard";
								
    $query = "SELECT * FROM users WHERE email='$email'";
    
    $result = mysql_query($query) or die(mysql_error());
								
    if (mysql_num_rows($result)) {
									
        ?> <script>alert("Username taken");</script> <?php
												
    } else {
									
        mysql_query("INSERT INTO users(username, email, password, image, authorisation, department, title, surname, , start_date, sup_email, authcode) VALUES('$username','$email','$password', '$image', '$authorisation','$department','$title','$surname','$start_date','$sup_email','$authcode',)");
												
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
		       <link rel="stylesheet" type="text/css" href="includes/css/login.css" media="screen" />
  <style>
    body {
      background-image: url("https://static.pexels.com/photos/34844/pexels-photo.jpg");
      background-size: cover;
    }
  </style>
    </head>
	
    <body>
        
        <!-- Carls register form here -->
	<div style="margin-top:50px;" class="container">
                <div class="row">
                   <div class="panel panel-default">
  <div class="panel-body">
    
                      <h3> Register for Medivision</h3> <hr>
                  <div class="col-sm-8">
                     
                    <form id="registerform" name="registerform" class="form-horizontal"  method="post">
                      <fieldset>
                        <!-- Text input-->
                        <div class="form-group">
                    
                          <label class="col-md-4 control-label" for="authcode">Authorization Code</label>
                          <div class="col-md-6">
                            <input id="authcode" name="authcode" type="text" placeholder="Enter Code Here" class="form-control input-md" required="">
                            <p style='margin-top: 10px;margin-right:0px;font-size:9pt;'> This will of been supplied by your network administrator during training.</p>
                          </div>
                        </div>
                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="title">Title</label>
                          <div class="col-md-6">
                            <select id="title" name="title" class="form-control">
                              <option value="Dr">Dr</option>
                              <option value="Mr">Mr</option>
                              <option value="Mrs">Mrs</option>
                              <option value="Miss">Miss</option>
                              <option value="Ms">Ms</option>
                            </select>
                          </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="sname">Forename (Username)</label>
                          <div class="col-md-6">
                            <input id="sname" name="username" type="text" placeholder="E.g Doe" class="form-control input-md" required=""> </div>
                        </div>
                           <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="sname">Surname</label>
                          <div class="col-md-6">
                            <input id="sname" name="surname" type="text" placeholder="E.g Doe" class="form-control input-md" required=""> </div>
                        </div>
                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="department">Department</label>
                          <div class="col-md-6">
                            <select id="dept" name="department" class="form-control">
                              <option value="Reception">Please Select</option>
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
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" name="email" for="email">NHS Email</label>
                          <div class="col-md-6">
                            <input id="email" name="email" type="email" placeholder="E.g johndoe@dhh.nhs.uk" class="form-control input-md" required=""> </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" name="password" for="fname">Password</label>
                          <div class="col-md-6">
                            <input id="password" pattern=".{12,}"   required title="12 characters minimum" name="password" type="password" placeholder="********" class="form-control input-md" required=""> </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="textinputdate">Start Date</label>
                          <div class="col-md-6">
                            <input id="start_date" name="start_date" type="text" placeholder="E.g 13/03/201" class="form-control input-md" required=""> </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="supervisor">Supervisors Email</label>
                          <div class="col-md-6">
                            <input id="sup_email" name="sup_email" type="email" placeholder="E.g janedoe@dhh.nhs.uk" class="form-control input-md" required=""> </div>
                        </div>
                      </fieldset>
                   
                    <hr width="1" size="500"> </div>
                  <!-- Left / Right -->
                  <div class="col-sm-4">
                      <p> Upload Profile Picture</p>
                  <p style="margin:0;font-size:9pt;"> <i>Please Note: You <b> Must</b> include a profile picture in full uniform.</p></i>
                    <hr style="max-width:350px;">
                   <img id="blah" width=220px height=220px src="http://americanmuslimconsumer.com/wp-content/uploads/2013/09/blank-user.jpg" />
                      <br>
                      <br>
                   
                        <fieldset>
                          <!-- File Button -->
                          <div class="form-group">
                            <div class="col-md-4">
                              <input type='file' id="imgInp" /> </div>
                          </div>
                        </fieldset>
      <div style="margin-left:auto; margin-top:40px; margin-right:auto;">
                     <button type="reset" class="btn btn-default">Reset Form</button>
              <button class="btn btn-default" type="submit" name="register">Register</button> 
          
                      </div>
      </div>
      </form>
                   
                </div>
              </div>
                       </div>
        </div>
        
		
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
					
    </body>
	
</html>