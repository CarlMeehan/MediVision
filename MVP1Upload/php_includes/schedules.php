<div class="col-lg-7 col-sm-7 col-xs-12 top">

    <div class="panel">
    
        <div class="panel-heading clearfix">
        
            <div class="panel-title pull-left">My Schedules</div>
            
            <a onclick="buttonRotateSchedules();" class="panel-buttons pull-right schedulesBtn" data-toggle="collapse" href="#schedules">
            
                <i class="fa fa-chevron-down"></i>
                
            </a>
            
        </div>
        
        <div id="schedules" class="panel-collapse collapse in">
        
            <table>
            
                <tr>
                
                    <th>Date</th>
                    
                    <th>Start Time</th>
                    
                    <th>Finish Time</th>
                    
                </tr>
                
                <?php

                    $check = $userRow['email'];
            
                    $scheduleCheck = mysql_query("SELECT * FROM schedules WHERE email='$check' LIMIT 0, 7");

                    $num_rows = mysql_num_rows($scheduleCheck);

                    if ($num_rows > 0) {

                        WHILE ($sheduleRow = mysql_fetch_array($scheduleCheck)) {

                            echo "<tr><td>" . $sheduleRow['date'] . "</td><td>" . $sheduleRow['start'] . "</td><td>" . $sheduleRow['finish'] . "</td></tr>";

                        }

                    } else {
                        
                        echo "<tr><td colspan='3'>There are no current schedules available.</td></tr>";
                        
                    }

                ?>
                
            </table>
            
        </div>
        
    </div>
    
</div>