<?php
include('../../forms/dbcon_s.php');


$doc_id=$_POST['doc_id'];
$app_id=$_POST['app_id'];
$patient_id=$_POST['patient_id'];
$ser_name=$_POST['ser_name'];
$qty=$_POST['qty'];
$total_price=$_POST['total_price'];
$price=$_POST['price'];



$sql= "insert into bill_det (ser_name, ser_price, ser_qty, total_amm, app_id) values ('$ser_name','$price','$qty','$total_price', '$app_id')";
$result=mysql_query($sql);
if($result)
{
            //$reply .= "SQL succ...";
}else
{
    echo mysql_error(); die;
}

?>