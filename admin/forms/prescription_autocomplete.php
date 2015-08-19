<?php 
include('../../forms/dbcon_s.php'); 
$keyword=$_POST['keyword'];
$rStr = '';
$query_str= "select doc_services.name from doc_services where doc_services.name LIKE '".$keyword."%'";
$query=mysql_query($query_str);
if($query)
{

	while ($row = mysql_fetch_array($query)) {
    	$rStr2 = '<li id="set_item" value=\''.str_replace("'", "\'", $row['name']).'\'>'.$row['name'].'</li>';
    	$rStr = $rStr.$rStr2;
	};
 	echo $rStr;
}else
{
	echo mysql_error();	
}

?>
