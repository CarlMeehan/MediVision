<?php

include('dbconnect.php');

$id = $_POST['delete_patient'];

mysql_query("DELETE from patients WHERE id='$id'");

header("Location: all_patients.php");

?>