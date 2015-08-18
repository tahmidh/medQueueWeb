<?php 
include('dbcon.php');

/*app_fname:app_fname, app_email:app_email, app_phone:app_phone, app_reason:app_reason, 
            book_date:book_date, start_time:start_time, end_time:end_time, id_doctor:id_doctor, service_name:service_name
            id_patient:id_patient*/

$app_fname=$_POST['app_fname'];
$app_email=$_POST['app_email'];
$app_phone=$_POST['app_phone'];
$app_reason=$_POST['app_reason'];
$book_date=$_POST['book_date'];
$start_time=$_POST['start_time'];
$end_time=$_POST['end_time'];
$id_doctor=$_POST['id_doctor'];
$service_name=$_POST['service_name'];
$id_patient=$_POST['id_patient'];




$str="insert into app_details (app_fname, app_email,app_phone, app_reason)values ('$app_fname','$app_email','$app_phone','$app_reason')";
$query=mysql_query($str);
if($query)
{
	$str="select MAX(id) as id from app_details where app_email='$app_email'";
	$query2=mysql_query($str);
	if($query2)
	{
		$row = mysql_fetch_array($query2);
		$id_app = $row['id'];
		$str="insert into doc_appointment (book_date, start_time, end_time, id_doctor, id_patient, services_name, id_appdetails) values ('$book_date','$start_time','$end_time','$id_doctor','$id_patient','$service_name','$id_app')";
		$query3=mysql_query($str);
		if($query3)
		{

		}else{
			echo mysql_error();
		}
	}else
	{
		echo mysql_error();	
	}
}else
{
	echo mysql_error();	
}

?>
