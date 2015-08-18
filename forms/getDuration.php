<?php 
include('dbcon_s.php'); 
$service_selected=$_POST['service_selected'];
$d_id=$_POST['d_id'];

$query_str="select name, duration, price, currency, description from doc_services where user_id ='".$d_id."'  AND name ='".$service_selected."'";
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
