<?php
session_start();
if(isset($_SESSION['user'])!="") {
					
    header("Location: home.php");
								
}
include_once 'dbconnect.php';
if (isset($_POST['register'])) {
								
    $firstname = $_POST['firstname'];
    
    $lastname = $_POST['lastname'];
    
    $dob = $_POST['DOB'];
    
    $lastadmiss = $_POST['lastadmiss'];
  
    $gender = $_POST['gender'];
    
    $adminstat = $_POST['adminstat'];
    
    $room = $_POST['room'];
								
    $ward = $_POST['ward'];
    
    $height = $_POST['height_cm'];
    
    $weight = $_POST['weight_lbs'];
    
    $lang = $_POST['language'];

    $healthcare = $_POST['healthcare'];    
    
    $telephone = $_POST['telephone]'];
    
    
    
    
								
    if (mysql_num_rows($result)) {
									
        ?> <script>alert("Patient ID taken");</script> <?php
												
    } else {
									
        mysql_query("INSERT INTO patients(firstname, lastname, DOB, lastadmiss, gender, adminstat, Room no., ward, height, weight, language, healthcare no., tel no.) VALUES('$firstname', '$lastname', '$dob', '$lastadmiss', '$gender', '$adminstat', '$room', '$ward', '$height', '$weight', '$lang', '$healthcare', '$telephone')");
												
        ?> <script>alert('Patient added successfully');</script> <?php
												
    }
								
}
?>

<!DOCTYPE html>

<html>

    <head>
	
        <title>Medivision | Add Patient</title>
		
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		
            <link rel="stylesheet" href="includes/css/style.css" />
		
        
		       <link rel="stylesheet" type="text/css" href="includes/css/login.css" media="screen" />
  <style>
    
      
      body {
      background-color: #fcfcfc;
      background-size: cover;
    }
      
      
  </style>
        
        
    </head>
	
    <body>
        
        <!-- Add patient form -->
	<div style="margin-top:50px;" class="container">
                <div class="row">
                   <div class="panel panel-default">
  <div class="panel-body">
    
                      <h3> Register a Patient</h3> <hr>
                  <div class="col-sm-8">
                     
                    <form id="registerform" name="registerform" class="form-horizontal" action="javascript:void(0);" method="post">
                      <fieldset>
                        <!-- Text input-->
                        <div class="form-group">
                    
    
                          </div>
                        </div>
                        <!-- Select title -->
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
                          <label class="col-md-4 control-label" for="firstname">Patient First Name</label>
                          <div class="col-md-6">
                            <input id="firstname" name="firstname" type="text" placeholder="E.g John" class="form-control input-md" required=""> </div>
                        </div>
                        
                        
                        <!-- Text input-->
                        <div class="form-group">
                        
                        
                          <label class="col-md-4 control-label" for="surname">Patient Surname</label>
                          <div class="col-md-6">
                          
                          
                            <input id="surname" name="surname" type="text" placeholder="E.g Doe" class="form-control input-md" required="">                         
                            </div>
                        </div>
                        
                        
                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="dept">Date of Birth</label>
                          <div class="col-md-6">
                            <input id="dateofbirth" name="dateofbirth" type="text" placeholder="E.g 03/05/1994" class="form-control input-md" required=""> 
                            
                            </div>
                            
                        </div>
                        
                        
                        
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="lastadmiss">Last Admission</label>
                          <div class="col-md-6">
                            <input id="lastadmiss" name="lastadmiss" type="text" placeholder="E.g 18/2/2015" class="form-control input-md" required=""> </div>
                        </div>
                        
                        
                        
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="gender">Gender</label>
                          <div class="col-md-6">
                            <input id="gender" name="gender" type="text" placeholder="E.g Male/Female" class="form-control input-md" required=""></div>
                        </div>
                        
                        
                        
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="adminstat">Admission Status</label>
                          <div class="col-md-6">
                            <input id="adminstat" name="adminstat" type="text" placeholder="NOT ADMITTED" class="form-control input-md" required=""> </div>
                        </div>
                        
                        
                        
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="room">Room No.</label>
                          <div class="col-md-6">
                            <input id="room" name="room" type="text" placeholder="E.g 13C05" class="form-control input-md" required=""> </div>
                        </div>
                      </fieldset>
                   
                    <hr width="1" size="500"> </div>
                  <!-- Left / Right -->
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
                     <button type="reset" class="btn btn-default" data-dismiss="modal">Exit Form</button>
              <button class="btn btn-default" id="registrationSubmitButton">Exit Form</button>
      </div>
                   
                </div>
              </div>
                       </div>
        </div>
        
		
       
        <script src="includes/js/menutoggle.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
					
    </body>
	
</html>