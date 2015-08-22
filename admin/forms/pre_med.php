<?php
include('../../forms/dbcon_s.php');

$doc_id=$_POST['doc_id'];
$app_id=$_POST['app_id'];
$patient_id=$_POST['patient_id'];
$med_name=$_POST['med_name'];
$dose=$_POST['dose'];
$freq=$_POST['freq'];



$sql= "insert into prescription_med (med_name, dose, freq, doc_id, patient_id, app_id) values ('$med_name', '$dose', '$freq', '$doc_id', '$patient_id' , '$app_id') ";
$result=mysql_query($sql);
if($result)
{
            //$reply .= "SQL succ...";
}else
{
    echo mysql_error(); die;
}

?>