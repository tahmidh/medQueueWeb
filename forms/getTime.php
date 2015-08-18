<?php 
include('dbcon_s.php'); 
$d_id=$_POST['d_id'];

$query_str="select workplan from doc_workplan where user_id = '$d_id'";
$query=mysql_query($query_str);
$result = [];
if($query)
{
	
	$row = mysql_fetch_array($query);
	array_push($result, $row['workplan']);
    // echo json_encode($result);
   
}else
{
	echo mysql_error();	
}

$date=$_POST['date'];

$query_str2="select start_time, end_time from doc_appointment where id_doctor='$d_id' and book_date= '$date'";
$query2=mysql_query($query_str2);
if($query2)
{
	// $emparray[] = array();
	while ($row2 = mysql_fetch_array($query2)) {
		array_push($result, $row2);
	};
    echo json_encode($result);
}else
{
	echo mysql_error();	
}

?>
