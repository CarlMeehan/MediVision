<?php

session_start();

include_once 'dbconnect.php';
 
if(!isset($_SESSION['user'])) {

    header("Location: index.php");
	
}

$res = mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);

$userRow = mysql_fetch_array($res);

?>

<!DOCTYPE html>

<html>

    <head>
        
        <title>Medivision</title>
		
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		
            <link rel="stylesheet" href="includes/css/style.css" />
        
            <meta name="viewport" content="width=device-width, user-scalable=no" />
		
    </head>
	
    <body>
	
        <div class="wrapper">
        
            <?php include('php_includes/navbar.php'); ?>
            
            <?php include('php_includes/sidenav.php'); ?>
            
            <div class="main-content">
            
                <div class="container-fluid">
                
                  <form method="post" id="addPatient">
                  
                      <div class="row">
                      
                          <div class='col-md-12 col-sm-12 col-lg-10'><h4>Add Patient</h4> <br  /></div>
                          
                          <div class='col-md-12 col-sm-12 col-lg-10'><p style="padding-bottom: 10px; font-weight: bold;">Personal Details</p> </div>
                          
                          <div class='col-sm-6 col-md-6 col-lg-6'>
                              
                              <p>Title</p>
                              
                              <select class="form-control" name="patTitle" required>
                              
                                  <option></option>
                                  
                                  <option>Mr</option>
                                  
                                  <option>Mrs</option>
                                  
                                  <option>Miss</option>
                                  
                                  <option>Ms</option>
                                  
                                  <option>Dr</option>
                                  
                                  <option>Master</option>
                                  
                              </select>
                              
                          </div>
                          
                          <div class='col-sm-6 col-md-6 col-lg-6 autofix'>
                              
                              <p>Name</p>
                              
                              <input type="text" name="patName" class="form-control" placeholder="e.g. John Doe" required />
                              
                          </div>
                          
                          <div class='col-sm-6 col-md-6 col-lg-6 autofix'>
                              
                              <p>D.O.B</p>
                              
                              <input type="text" name="patDOB" class="form-control" placeholder="e.g. 04/01/1994" required />
                              
                          </div>
                          
                          <div class='col-sm-6 col-md-6 col-lg-6 autofix'>
                              
                              <p>Gender</p>
                              
                              <select class="form-control" name="patGender" required>
                              
                                  <option></option>
                                  
                                  <option>Male</option>
                                  
                                  <option>Female</option>
                                  
                              </select>
                              
                          </div>
                          
                          <div class='col-sm-6 col-md-6 col-lg-6 autofix'>
                              
                              <p>Address</p>
                              
                              <input type="text" name="patAddress" class="form-control" placeholder="e.g. 12 Ashbury Grove" required />
                              
                          </div>
                          
                          <div class='col-sm-6 col-md-6 col-lg-6 autofix'>
                              
                              <p>Postcode</p>
                              
                              <input type="text" name="patPostcode" class="form-control" placeholder="e.g. BT357EE" required />
                              
                          </div>
                          
                          <div class='col-sm-6 col-md-6 col-lg-6 autofix'>
                              
                              <p>Contact Number</p>
                              
                              <input type="text" name="patNum" class="form-control" placeholder="e.g. 02830839391" required />
                              
                          </div>
                          
                          <div class='col-sm-6 col-md-6 col-lg-6 autofix'>
                              
                              <p>Email</p>
                              
                              <input type="text" name="patEmail" class="form-control" placeholder="e.g. johndoe@example.com" required />
                              
                          </div>
                          
                          <div class='col-md-12 col-sm-12 col-lg-10'><p style="padding: 15px 0px 10px 0px; font-weight: bold;">Emergency Contact</p> </div>
                          
                          <div class='col-sm-6 col-md-6 col-lg-6 autofix'>
                              
                              <p>Name</p>
                              
                              <input type="text" name="patEmergencyName" class="form-control" placeholder="e.g. John Doe" required />
                              
                          </div>
                          
                          <div class='col-sm-6 col-md-6 col-lg-6 autofix'>
                              
                              <p>Relation</p>
                              
                              <input type="text" name="patEmergencyRelation" class="form-control" placeholder="e.g. Parent" required />
                              
                          </div>
                          
                          <div class='col-sm-6 col-md-6 col-lg-6 autofix'>
                              
                              <p>Contact No.</p>
                              
                              <input type="text" name="patEmergencyLandline" class="form-control" placeholder="e.g. 02830839391" required />
                              
                          </div>
                          
                          <div class='col-sm-6 col-md-6 col-lg-6 autofix'>
                              
                              <p>Mobile No.</p>
                              
                              <input type="text" name="patEmergencyMob" class="form-control" placeholder="e.g. 07599803928" required />
                              
                          </div>
                          
                          <div class='col-sm-6 col-md-6 col-lg-6 autofix'>
                          
                              <input type='submit' name='add_Patient' value='Add Patient' class='btn btn-primary' />
                              
                          </div>
                                                    
                      </div>
                      
                      <?php
                      
                        if (isset($_POST['add_Patient'])) {
                            
                            $patTitle = strtolower($_POST['patTitle']);
                            
                            $patName = strtolower($_POST['patName']);
                            
                            $patDOB = strtolower($_POST['patDOB']);
                            
                            $patGender = $_POST['patGender'];
                            
                            $patAddress = strtolower($_POST['patAddress']);
                            
                            $patPostcode = strtolower($_POST['patPostcode']);
                            
                            $patNum = strtolower($_POST['patNum']);
                            
                            $patEmail = strtolower($_POST['patEmail']);
                            
                            $patEmergencyName = strtolower($_POST['patEmergencyName']);
                            
                            $patEmergencyRelation = strtolower($_POST['patEmergencyRelation']);
                            
                            $patEmergencyLandline = strtolower($_POST['patEmergencyLandline']);
                            
                            $patEmergencyMob = strtolower($_POST['patEmergencyMob']);
                            
                            $admitted = "no";

                            $query = "SELECT * FROM patients WHERE name='$patName' AND postcode='$patPostcode'";
                         
                            $result = mysql_query($query) or die(mysql_error());
                            
                            if (mysql_num_rows($result)) {

                                ?> <script>alert("Patient already exists!");</script> <?php

                            } else {

                                mysql_query("INSERT INTO patients(title, name, dob, gender, address, postcode, contact_number, email, emergency_name, emergency_relation, emergency_landline, emergency_mobile, admitted) VALUES('$patTitle', '$patName', '$patDOB', '$patGender', '$patAddress', '$patPostcode', '$patNum', '$patEmail', '$patEmergencyName', '$patEmergencyRelation', '$patEmergencyLandline', '$patEmergencyMob', '$admitted')");
                                
                                ?> <script>alert('Patient has been added.');</script> <?php

                            }
                            
                        }
                      
                      ?>
                      
                  </form>

                </div>
        
            </div>
            
        </div>
        
        <script src="includes/js/menutoggle.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
    </body>
	
</html>