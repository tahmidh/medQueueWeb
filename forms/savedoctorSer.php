

<?php 
include('dbcon_s.php'); 


$name=$_POST['name'];
$duration=$_POST['duration'];
$price=$_POST['price'];
$currency=$_POST['currency'];
$category=$_POST['category'];
$description=$_POST['description'];
$login_id=$_POST['login_id'];


$query_str="insert into doc_services(name, duration, price, currency, description, service_categories, user_id) values('$name','$duration','$price','$currency','$description','$category','$login_id')";
$query=mysql_query($query_str);
if($query)
{
	echo $query;
}else
{
	echo mysql_error();	
}

?>
