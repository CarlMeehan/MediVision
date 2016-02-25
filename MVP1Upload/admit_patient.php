<?php

include('dbconnect.php');

$id = $_POST['admit_patient'];

mysql_query("UPDATE patients SET admitted='yes' WHERE id='$id'");

header("Location: admitted_patients.php");

?>