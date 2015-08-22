<?php
include('../../forms/dbcon_s.php');
$app_id=$_POST['app_id'];
$caller=$_POST['caller'];
$doc_id=$_POST['doc_id'];
$pat_id= 0;
$sql= "select id_patient from doc_appointment where id='$app_id';";
$result=mysql_query($sql);
if($result)
{
	$row=mysql_fetch_array($result);
      $pat_id= $row['id_patient'];
}else
{
    echo mysql_error(); die;
}
$date= date('Y-m-d');
if ($caller=="new"){

$sql= "insert into prescription_det (doc_id, patient_id, date, app_id) values ('$doc_id', '$pat_id', '$date','$app_id')";
$result=mysql_query($sql);
if($result)
{
            //$reply .= "SQL succ...";
}else
{
    echo mysql_error(); die;
}

}

?>