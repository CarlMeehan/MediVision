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
                  
                    <div class="row">
                    
                        <div class='col-md-12 col-sm-12 col-lg-10'><h4>All Patients</h4></div>
                        
                    </div>          
                      
                    <?php

                        $patient_check = mysql_query("SELECT * FROM patients");

                        $num_rows = mysql_num_rows($patient_check);

                        echo "<table width='100%' id='addTaskView'>";
                      
                            echo "<tr><th>Patient Name</th><th>Admitted</th><th>View</th><th>Admit Patient</th></tr>";
                      
                            if ($num_rows > 0) {

                                WHILE ($patientRow = mysql_fetch_array($patient_check)) {

                                    echo "<tr><td>" . ucwords($patientRow['name']) . "</td><td>" . ucwords($patientRow['admitted']) . "</td>";

                                    ?> <td><form action="patient_profile.php" method="post"><input type="hidden" name="view_patient" value="<?php echo $patientRow['id']; ?>" /><input style="width: 100%;" type="submit" class="btn btn-primary" value="View" /></form></td> <td><form action="admit_patient.php" method="post"><input type="hidden" name="admit_patient" value="<?php echo $patientRow['id']; ?>" /><input style="width: 100%;" type="submit" class="btn btn-primary" value="Admit" /></form></td> <?php

                                    echo "</tr>";

                                }

                            } else {

                                echo "<tr><td colspan='4'>There are no current patients registered!</td></tr>";

                            }
                      
                        echo "</table>";

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