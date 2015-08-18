<?php 
include('dbcon_s.php'); 


$workplan=$_POST['workplan'];
$login_id=$_POST['login_id'];


$query_str="insert into doc_workplan(workplan, user_id) values('$workplan','$login_id')";
$query=mysql_query($query_str);
if($query)
{
	echo $query;
}else
{
	echo mysql_error();	
}

?>
