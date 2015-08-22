<?php
include('../../forms/dbcon_s.php');
$doc_id=$_POST['doc_id'];
$app_id=$_POST['app_id'];
$patient_id=$_POST['patient_id'];
$symptoms=$_POST['symptoms'];
$diagnosis=$_POST['diagnosis'];
$advice=$_POST['advice'];



$sql= "update prescription_det  set symptoms='$symptoms', diagnosis='$diagnosis', advice='$advice' where app_id='$app_id'";
$result=mysql_query($sql);
if($result)
{
		$str = "updated data with: app_id"+  $app_id + "symptoms: "+ $symptoms+" $diagnosis: "+ $diagnosis+ " Advice"+  $advice; 
            echo $str; 
}else
{
    echo mysql_error(); die;
}

?>