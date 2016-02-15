<?php

session_start();

include_once 'dbconnect.php';
 
if (!isset($_SESSION['user'])) {

    	header("Location: index.php");
	
}

$result = mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);

$accountCheck = mysql_query("SELECT * FROM users");

$notesCheck = mysql_query("SELECT * FROM tasks");

$accounts = mysql_num_rows($accountCheck);

$notes = mysql_num_rows($notesCheck);

$userRow = mysql_fetch_array($result);

$check = $userRow['email'];
            
$taskCheck = mysql_query("SELECT * FROM tasks WHERE email='$check'");

$tasks_Rows = mysql_num_rows($taskCheck);

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
                
                    <?php include('php_includes/stats_top.php'); ?>

                    <div class="row">

                        <?php include('php_includes/contacts.php'); ?>
                      
                        <?php include('php_includes/schedules.php'); ?>
                        
                    </div><!-- end row for schedules / contacts -->
                    
                    <div class="row">
                    
                        <?php include('php_includes/tasks.php'); ?>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>

        <script src="includes/js/menutoggle.js"></script>
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
    </body>
	
</html>