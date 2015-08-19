<?php 
include('dbcon_s.php'); 
/*dob:dob,gender:gender,bloodgroup:bloodgroup,weight:weight,height:height */


$dob=$_POST['dob'];
$gender=$_POST['gender'];
$bloodgroup=$_POST['bloodgroup'];
$weight=$_POST['weight'];
$height=$_POST['height'];
$login_id=$_POST['login_id'];


$query_str="insert into pat_basic(dob,gender,bloodgroup,weight,height,user_id) values('$dob','$gender','$bloodgroup','$weight','$height','$login_id')";
$query=mysql_query($query_str);
if($query){
}else{
	echo mysql_error();	
}

?>