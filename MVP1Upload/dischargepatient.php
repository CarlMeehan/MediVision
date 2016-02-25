<?php

include('dbconnect.php');

$id = $_POST['discharge_patient'];

mysql_query("UPDATE patients SET admitted='no' WHERE id='$id'");

header("Location: admitted_patients.php");

?>