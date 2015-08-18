<?php 
include('dbcon_s.php'); 
$name=$_POST['name'];
$service_categories=$_POST['service_categories'];

$query_str="select user_details.login_id, user_details.first_name, user_details.last_name from user_details where user_details.login_id in(SELECT doc_services.user_id FROM doc_services WHERE doc_services.name = '".$name."' AND doc_services.service_categories = '".$service_categories."')";
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
