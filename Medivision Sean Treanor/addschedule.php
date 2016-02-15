<?php

session_start();

include_once 'dbconnect.php';
 
if(!isset($_SESSION['user'])) {

    header("Location: index.php");
	
}

$res = mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);

$userRow = mysql_fetch_array($res);

if ($userRow['authorisation'] !== "admin") {
  
    header("Location: index.php");
  
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
	
        <div class="wrapper">
        
            <?php include('php_includes/navbar.php'); ?>
            
            <?php include('php_includes/sidenav.php'); ?>
            
            <div class="main-content">
            
                <div class="container-fluid">
                
                  <form method="post" id="addSchedule">
                  
                    <?php
                    
                      $users = mysql_query("SELECT * FROM users");
                    
                      $num_rows = mysql_num_rows($users);
                    
                      echo "<div class='row'>";
                                          
                        echo "<div class='col-md-12 col-sm-12 col-lg-10'><h4>Add Schedule</h4> <br  /></div>";
                      
                        echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
                      
                          echo "<p>Select User</p>";
                    
                          echo "<select class='form-control' name='scheduleuser' required>";

                          echo "<option></option>";

                            WHILE ($user = mysql_fetch_array($users)) {

                              echo "<option>" . $user['email'] . "</option>";

                            }

                          echo "</select>";
                    
                        echo "</div>";
                    
                        echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
                    
                          echo "<p>Input Date</p>";
                    
                          echo "<input type='text' class='form-control' name='scheduledate' required Placeholder='e.g. Thursday 5th March' />";
                    
                        echo "</div>";
                    
                        echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
                    
                          echo "<p>Input Start Time</p>";
                    
                          echo "<input type='text' class='form-control' name='schedulestart' required Placeholder='e.g. 08:00am' />";
                    
                        echo "</div>";
                    
                        echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
                    
                          echo "<p>Input Finish Time</p>";
                    
                          echo "<input type='text' class='form-control' name='schedulefinish' required Placeholder='e.g. 16:30am' />";
                    
                        echo "</div>";
                    
                        echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
                                        
                          echo "<input type='submit' name='addSchedule' value='Add Schedule' class='btn btn-primary' />";
                    
                        echo "</div>";
                    
                      echo "</div>"; // end row
                    
                      if (isset($_POST['addSchedule'])) {
                        
                        $scheduleuser = $_POST['scheduleuser'];
                          
                        $scheduledate = $_POST['scheduledate'];
                          
                        $schedulestart = $_POST['schedulestart'];
                        
                        $schedulefinish = $_POST['schedulefinish'];
                          
                        if (mysql_query("INSERT INTO schedules (email, date, start, finish) VALUES('$scheduleuser','$scheduledate', '$schedulestart', '$schedulefinish')")) {
                          
                          header("Location: php_includes/schedule_confirmation.php");
                          
                        } else {
                          
                          ?> <script>alert("There has been a problem adding this to the schedules!");</script> <?php
                          
                        }
                        
                      }
                    
                    ?>
                  
                  </form>
                    
                  <div class="addSchedule">
                  
                    <div class="row">
                    
                        <div class='col-md-12 col-sm-12 col-lg-10'><h4>Current Schedules</h4></div>
                        
                    </div>          
                      
                    <?php

                        $scheduleCheck = mysql_query("SELECT * FROM schedules");

                        $num_rows = mysql_num_rows($scheduleCheck);

                        // $delete = mysql_query("DELETE FROM tasks WHERE user_id;

                        echo "<table width='100%' id='addScheduleView'>";
                      
                            echo "<tr><th>User Email</th><th>Date</th><th>Start Time</th><th>Finish Time</th><th>Delete</th></tr>";
                      
                            if ($num_rows > 0) {

                                WHILE ($scheduleRow = mysql_fetch_array($scheduleCheck)) {

                                    echo "<tr><td>" . $scheduleRow['email'] . "</td><td>" . $scheduleRow['date'] . "</td><td>" . $scheduleRow['start'] . "</td><td>" . $scheduleRow['finish'] . "</td>";

                                ?> <td><form action="deleteschedule.php" method="post"><input type="hidden" name="delete_schedule" value="<?php echo $scheduleRow['schedule_id']; ?>" /><input style="width: 100%;" class="btn btn-danger" type="submit" value="Delete" /></form></td> <?php
                                    
                                echo "</tr>";
                               
                                }

                            } else {

                                echo "<tr><td colspan='5'>You have not added any schedules.</td></tr>";

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