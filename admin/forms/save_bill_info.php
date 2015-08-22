<?php
include('../../forms/dbcon_s.php');

$app_id=$_POST['app_id'];
$sql= "select * from bill_det where app_id= $app_id";
$result=mysql_query($sql);
$gt= 0;
if($result)
{
    while ($result=mysql_query($sql) ) {
		$gt= $gt+ $row['total_amm'];	
	}
}else
{
    echo mysql_error(); die;
}
$vat= $gt * 0.04;
$gtv= $vat+$gt;
$sql= "update bill_info set total_bill= '$gt', vat= '$vat', grand_total='$gtv' where app_id= '$app_id'";
$result=mysql_query($sql);
if($result)
{
            //$reply .= "SQL succ...";
}else
{
    echo mysql_error(); die;
}

?>