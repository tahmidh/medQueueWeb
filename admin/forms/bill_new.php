<?php
include('../../forms/dbcon_s.php');
$app_id=$_POST['app_id'];
$pat_id= 0;
$doc_id=0;
$sql= "select id_patient, id_doctor from doc_appointment where id='$app_id';";
$result=mysql_query($sql);
if($result)
{
	$row=mysql_fetch_array($result);
	$pat_id= $row['id_patient'];
	$doc_id= $row['id_doctor'];
}else
{
	echo mysql_error(); die;
}
$date= date('Y-m-d');
$time = date('H:i:s');

$sql= "insert into bill_info (date , time , doc_id, patient_id, app_id) values ('$date' , '$time' , '$doc_id', '$patient_id', '$app_id')";
$result=mysql_query($sql);
if($result)
{
}else
{
	echo mysql_error(); die;
}

?>