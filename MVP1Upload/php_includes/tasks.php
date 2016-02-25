<div class="col-lg-12 col-sm-12 col-xs-12">

    <div class="panel">
    
        <div class="panel-heading clearfix">
        
            <div class="panel-title pull-left">My Tasks</div>
          
            <a onclick="buttonRotateTasks();" class="panel-buttons pull-right tasksBtn" data-toggle="collapse" href="#tasks">
            
                <i class="fa fa-chevron-down"></i>
                
            </a>
                        
        </div>
        
        <div id="tasks" class="panel-collapse collapse in">
        
            <table>
            
                <?php

                    $check = $userRow['email'];
            
                    $taskCheck = mysql_query("SELECT * FROM tasks WHERE email='$check'");

                    $num_rows = mysql_num_rows($taskCheck);
                
                    // $delete = mysql_query("DELETE FROM tasks WHERE user_id;

                    if ($num_rows > 0) {

                        WHILE ($taskRow = mysql_fetch_array($taskCheck)) {

                            echo "<tr><td><strong>" .$taskRow['taskName'] . "</strong><br />" . $taskRow['taskDesc'] . "</td></tr>";

                        }

                    } else {
                        
                        echo "<tr><td colspan='3'>You have no current tasks assigned.</td></tr>";
                        
                    }

                ?>
                
            </table>
            
        </div>
        
    </div>
    
</div>