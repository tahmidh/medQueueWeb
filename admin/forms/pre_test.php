<?php
include('../../forms/dbcon_s.php');



$doc_id=$_POST['doc_id'];
$app_id=$_POST['app_id'];
$patient_id=$_POST['patient_id'];
$name=$_POST['name'];
$notes=$_POST['notes'];



$sql= "insert into prescription_test (name,notes, doc_id, patient_id, app_id) values ('$name', '$notes', '$doc_id', '$patient_id' , '$app_id') ";
$result=mysql_query($sql);
if($result)
{
            //$reply .= "SQL succ...";
}else
{
    echo mysql_error(); die;
}

?>