<?php


$servername = "localhost";
$username = "root";
$password = "";
$db="thesis";

// Create connection
$conn = new mysqli($servername, $username,$password,$db);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
echo "\n";


$email= "'".mysql_real_escape_string($_POST['emailsignup'])."'";
$phone = "'".mysql_real_escape_string($_POST['phone'])."'";
$name= "'".mysql_real_escape_string($_POST['name'])."'";
$lat= "'".mysql_real_escape_string($_POST['lat'])."'";
$lng= "'".mysql_real_escape_string($_POST['lng'])."'";


$reqQuery = "INSERT INTO er_info(id, name, email, number, lat, lng)
VALUES (NULL,$name,$email,$phone,$lat,$lng)";




if ($conn->query($reqQuery) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $reqQuery . "<br>" . $conn->error;
}

$conn->close();

?>
