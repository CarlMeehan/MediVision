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
                
                  <form method="post" id="addTask">
                  
                    <?php
                    
                      $users = mysql_query("SELECT * FROM users");
                    
                      $num_rows = mysql_num_rows($users);
                    
                      echo "<div class='row'>";
                                          
                        echo "<div class='col-md-12 col-sm-12 col-lg-10'><h4>Add Task</h4> <br  /></div>";
                      
                        echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
                      
                          echo "<p>Select User</p>";
                    
                          echo "<select class='form-control' name='taskUser' required>";

                          echo "<option></option>";

                            WHILE ($user = mysql_fetch_array($users)) {

                              echo "<option>" . $user['email'] . "</option>";

                            }

                          echo "</select>";
                    
                        echo "</div>";
                    
                        echo "<div class='col-sm-6 col-md-6 col-lg-6 autofix'>";
                    
                          echo "<p>Task Name</p>";
                    
                          echo "<input type='text' class='form-control' name='taskName' required Placeholder='e.g. Meeting at 3pm on 21/03/2016' />";
                    
                        echo "</div>";
                    
                        echo "<div style='margin-top: 20px;' class='col-sm-12 col-md-12 col-lg-12'>";
                    
                          echo "<p>Task Description</p>";
                    
                          echo "<textarea style='margin-top: 0px;' class='form-control' name='taskDesc' required Placeholder='Details for the meeting'></textarea>";
                    
                        echo "</div>";
                    
                        echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
                                        
                          echo "<input style='margin-top: 20px;' type='submit' name='addTask' value='Add Task' class='btn btn-primary' />";
                    
                        echo "</div>";
                    
                      echo "</div>"; // end row
                    
                      if (isset($_POST['addTask'])) {
                        
                        $taskUser = $_POST['taskUser'];
                          
                        $taskName = $_POST['taskName'];
                          
                        $taskDesc = $_POST['taskDesc'];
                          
                        if (mysql_query("INSERT INTO tasks (taskName, taskDesc, email) VALUES('$taskName','$taskDesc', '$taskUser')")) {
                          
                          header("Location: php_includes/task_confirmation.php");
                          
                        } else {
                          
                          ?> <script>alert("There has been a problem adding this to the tasks!");</script> <?php
                          
                        }
                        
                      }
                    
                    ?>
                  
                  </form>
                    
                  <div class="addSchedule">
                  
                    <div class="row">
                    
                        <div class='col-md-12 col-sm-12 col-lg-10'><h4>Current Tasks</h4></div>
                        
                    </div>          
                      
                    <?php

                        $taskCheck = mysql_query("SELECT * FROM tasks");

                        $num_rows = mysql_num_rows($taskCheck);

                        // $delete = mysql_query("DELETE FROM tasks WHERE user_id;

                        echo "<table width='100%' id='addTaskView'>";
                      
                            echo "<tr><th>User Email</th><th>Task Name</th><th>Task Description</th><th>Delete</th></tr>";
                      
                            if ($num_rows > 0) {

                                WHILE ($taskRow = mysql_fetch_array($taskCheck)) {

                                    echo "<tr><td>" . $taskRow['email'] . "</td><td>" . $taskRow['taskName'] . "</td><td>" . $taskRow['taskDesc'] . "</td>";
                                    
                                    ?> <td><form action="deletetask.php" method="post"><input type="hidden" name="delete_task" value="<?php echo $taskRow['task_id']; ?>" /><input style="width: 100%;" type="submit" class="btn btn-danger" value="Delete" /></form></td> <?php
                                    
                                    echo "</tr>";

                                }

                            } else {

                                echo "<tr><td colspan='4'>You have not added any tasks.</td></tr>";

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