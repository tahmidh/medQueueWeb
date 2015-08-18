

<?php 
include('dbcon_s.php'); 
/*first_name:first_name,last_name:last_name;email:email,mobile_number:mobile_number,phone_number:phone_number,
            address:address, city:city,zip_code:zip_code,state:state; notes:notes*/


$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$mobile_number=$_POST['mobile_number'];
$phone_number=$_POST['phone_number'];
$address=$_POST['address'];
$city=$_POST['city'];
$zip_code=$_POST['zip_code'];
$state=$_POST['state'];
$notes=$_POST['notes'];
$login_id= $_POST['login_id'];

$query_str="insert into user_details(first_name, last_name, email, mobile_number, phone_number, address, city, state, zip_code,notes, login_id) values('$first_name','$last_name','$email','$mobile_number','$phone_number','$address','$city','$state','$zip_code','$notes','$login_id')";
$query=mysql_query($query_str);
if($query)
{
}else
{
	echo mysql_error();	
}

?>
