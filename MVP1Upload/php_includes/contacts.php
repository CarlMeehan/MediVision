<div class="col-lg-5 col-sm-5 col-xs-12">

    <div class="panel">
    
        <div class="panel-heading clearfix">
        
            <div class="panel-title pull-left">My Team</div>
            
            <a onclick="buttonRotateContacts();" class="panel-buttons pull-right contactsBtn" data-toggle="collapse" href="#contacts">
            
                <i class="fa fa-chevron-down"></i>
                
            </a>
            
        </div>
        
        <div id="contacts" class="panel-collapse collapse in">
        
            <table>
            
                <?php

                    $query = mysql_query("SELECT image, email, username FROM users");

                    WHILE ($rows = mysql_fetch_array($query)) {
                     
                        echo "<tr><td class='image'><img src='" .$rows['image'] . "'/></td><td>" . $rows['username'] . "</td><td class='search'><a href='mailto:" . $rows['email'] . "'><i class='fa fa-envelope'></i></a></td></tr>";
                        
                    }

                ?>
                
            </table>
            
        </div>
        
    </div>
    
</div>

