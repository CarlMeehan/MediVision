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
                    
                    <div id="patientProfile">
                        
                        <div class="row"><div class='col-md-12 col-sm-12 col-lg-10'><h4>Patient Details</h4></div></div>
                    
                        <?php
                        
                            $id = $_POST['view_patient'];
                        
                            $check_patient = mysql_query("SELECT * from patients WHERE id='$id'");

                            $num_rows = mysql_num_rows($check_patient);
                        
                            if ($num_rows > 0) {
                             
                                WHILE ($patient = mysql_fetch_array($check_patient)) {
                                 
                                    ?>
                            
                                        <table>
                                            
                                            <tr>
                                            
                                                <td>Title</td>
                                                
                                                <td><?php echo ucwords($patient['title']); ?></td>
                                                
                                            </tr>
                                            
                                            <tr>
                                            
                                                <td>Name</td>
                                                
                                                <td><?php echo ucwords($patient['name']); ?></td>
                                                
                                            </tr>
                                            
                                            <tr>
                                            
                                                <td>D.O.B</td>
                                                
                                                <td><?php echo ucwords($patient['dob']); ?></td>
                                                
                                            </tr>
                                            
                                            <tr>
                                            
                                                <td>Gender</td>
                                                
                                                <td><?php echo $patient['gender']; ?></td>
                                                
                                            </tr>
                                            
                                            <tr>
                                            
                                                <td>Address</td>
                                                
                                                <td><?php echo ucwords($patient['address']); ?></td>
                                                
                                            </tr>
                        
                                            <tr>
                                            
                                                <td>Postcode</td>
                                                
                                                <td><?php echo strtoupper($patient['postcode']); ?></td>
                                                
                                            </tr>
                                            
                                            <tr>
                                            
                                                <td>Contact No.</td>
                                                
                                                <td><?php echo $patient['contact_number']; ?></td>
                                                
                                            </tr>
                                            
                                            <tr>
                                            
                                                <td>Email</td>
                                                
                                                <td><?php echo $patient['email']; ?></td>
                                                
                                            </tr>
                                            
                                        </table>
                        
                                        <br /> <br />
                        
                                        <div class="row"><div class='col-md-12 col-sm-12 col-lg-10'><h4>Emergency Contact</h4></div></div>
                        
                                        <table>
                        
                                            <tr>
                                            
                                                <td>Name</td>
                                                
                                                <td><?php echo ucwords($patient['emergency_name']) ?></td>
                                                
                                            </tr>
                                            
                                            <tr>
                                            
                                                <td>Relation</td>
                                                
                                                <td><?php echo ucwords($patient['emergency_relation']) ?></td>
                                                
                                            </tr>
                                            
                                            <tr>
                                            
                                                <td>Landline No.</td>
                                                
                                                <td><?php echo $patient['emergency_landline'] ?></td>
                                                
                                            </tr>
                                            
                                            <tr>
                                            
                                                <td>Mobile No.</td>
                                                
                                                <td><?php echo $patient['emergency_mobile'] ?></td>
                                                
                                            </tr>
                                            
                                        </table>
                        
                                    <?php
                                    
                                }
                                
                            }
                        
                        ?>
                        
                    </div>
    
                </div>
        
            </div>
            
        </div>
        
        <script src="includes/js/menutoggle.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
    </body>
	
</html>