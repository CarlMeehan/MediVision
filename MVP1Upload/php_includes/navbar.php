<div class="navbar navbar-fixed-top navbar-default">

    <div class="container-fluid">

        <div class="navbar-header">
            
            <a href="#" onclick="navToggle();" id="navicon" class="pull-left"><i class="fa fa-navicon"></i></a>

            <a href="#" class="navbar-brand hidden-xs">Medivision</a>

        </div>

        <ul class="nav nav-top navbar-right text-right">

            <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                    <?php
                  
                      $name = $userRow['username'];

                      $words = explode(' ', $name);
                  
                    ?>
                  
                    <?php echo "<img class='img-circle' height='50px' src='"; echo $userRow['image']; echo "'>"?>
                  
                    <?php echo "&nbsp; &nbsp;"; echo $words[0]; echo "&nbsp;"; echo "<span class='caret'></span>"; ?>

                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                  
                    <?php if ($userRow['authorisation'] == "admin") echo "<li class='link'><a href='addschedule.php'>Schedules</a></li>";  ?>
                                        
                    <?php if ($userRow['authorisation'] == "admin") echo "<li class='link'><a href='addTask.php'>Tasks</a></li>";  ?>

                    <li class="separator"></li>
                    
                    <li class="link"><a href="logout.php">Sign Out</a></li>

                </ul>

            </li>

        </ul>

    </div>

</div>