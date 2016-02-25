<?php

include('dbconnect.php');

$id = $_POST['delete_schedule'];

mysql_query("DELETE from schedules WHERE schedule_id='$id'");

header("Location: php_includes/schedule_deletion.php");

?>