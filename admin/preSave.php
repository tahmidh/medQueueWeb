<?php
include('../../forms/dbcon_s.php');
$doc_id=$_POST['doc_id'];
$app_id=$_POST['app_id'];
$patient_id=$_POST['patient_id'];
$symptoms=$_POST['symptoms'];
$diagnosis=$_POST['diagnosis'];
$advice=$_POST['advice'];



$sql= "update prescription_med  set symptoms='$symptoms', diagnosis='$diagnosis', advice='$advice', doc_id='$doc_id', patient_id='$patient_id' where app_id='$app_id'";
$result=mysql_query($sql);
if($result)
{
            //$reply .= "SQL succ...";
}else
{
    echo mysql_error(); die;
}

?>