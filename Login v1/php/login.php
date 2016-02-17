
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_medivision";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$u_authcode = $_POST['authcode'];
$u_email = $_POST['email'];
$u_title = $_POST['title'];
$u_forename = $_POST['fname'];
$u_surname = $_POST['sname'];
$u_pass = $_POST['password'];
$u_dept = $_POST['dept'];
$u_start_date = $_POST['start_date'];
$u_sup_email = $_POST['sup_email'];
// $u_pro_pic = $_POST['pro_pic'];


$sql = "INSERT INTO users (`authcode`,`email`, `title`, `forename`,`surname`,`pass`,`dept`,`start_date`,`sup_email`)
VALUES ('".$u_authcode."','".$u_email."',' ".$u_title."',' ".$u_forename."','".$u_surname."','".$u_pass."','".$u_dept."','".$u_start_date."','".$u_sup_email."')
";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    http_response_code(400);
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>