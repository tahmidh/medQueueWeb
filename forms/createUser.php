<?php 
include('dbcon.php'); 
$name=$_POST['name'];
$pass= md5($_POST['pass']);
$type= $_POST['type'];
$email= $_POST['email'];

$query_str="insert into user_login(u_name, u_email, u_password, u_type) values('$name', '$email', '$pass', '$type')";
$query=mysql_query($query_str);
if($query)
{
}else
{
	echo mysql_error();	
}

?>
