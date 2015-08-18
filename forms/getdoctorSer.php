<?php 
include('dbcon_s.php'); 
$login_id=$_POST['login_id'];

$query_str="select name, duration, price from doc_services where user_id ='".$login_id."'";
$query=mysql_query($query_str);
if($query)
{
	$emparray[] = array();
	while ($row = mysql_fetch_array($query)) {
		$emparray[] = $row;
	};
    echo json_encode($emparray);
}else
{
	echo mysql_error();	
}

?>
