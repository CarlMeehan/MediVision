<?php

include('dbconnect.php');

$id = $_POST['delete_task'];

mysql_query("DELETE from tasks WHERE task_id='$id'");

header("Location: php_includes/task_deletion.php");

?>