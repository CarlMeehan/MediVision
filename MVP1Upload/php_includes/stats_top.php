<div class="row">

    <div class="col-lg-4 col-sm-4 col-xs-12">

        <div class="topstat">

            <div class="icon" style="background: #5ca9ec;">

                <i class="fa fa-users"></i>

            </div>

            <span class="value"><?php echo ($accounts - 1); ?></span>

            <span class="title">Colleague(s)</span>

        </div>

    </div>

    <div class="col-lg-4 col-sm-4 col-xs-12 top">

        <div class="topstat">

            <div class="icon" style="background: #5ca9ec;">

                <i class="fa fa-list"></i>

            </div>

            <span class="value"><?php echo $tasks_Rows; ?></span>

            <span class="title">Notes</span>

        </div>

    </div>

    <div class="col-lg-4 col-sm-4 col-xs-12 top">

        <div class="topstat">

            <div class="icon" style="background: #5ca9ec;">

                <i class="fa fa-user"></i>

            </div>

            <span class="value">
            
                <?php
                
                $result = mysql_query("SELECT * FROM patients WHERE admitted='yes'");

                $rows = mysql_num_rows($result);

                echo $rows;
                
                ?>
                
            </span>

            <span class="title">Patient(s)</span>

        </div>

    </div>

</div>