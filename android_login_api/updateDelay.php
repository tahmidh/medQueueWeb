<?php
include('dbcon_s.php');
$app_id=$_POST['app_id'];
$newend=$_POST['newend'];
$newstrt=$_POST['newstrt'];

$sql= "update doc_appointment set start_time= '$newstrt', end_time= '$newend' where id='$app_id'";
$result=mysql_query($sql);
if($result)
{
            //$reply .= "SQL succ...";
}else
{
    echo mysql_error(); die;
}

?>