<?php 
include('dbcon.php');
$reply= "";

$user=$_POST['user'];
$pass=md5($_POST['pass']);
$sql= "select * from user_login WHERE u_email='$user'";
$result=mysql_query($sql);
if($result)
{
	//$reply .= "SQL succ...";
}else
{
	echo mysql_error(); die;
}
$count=mysql_num_rows($result);
if($count==1)
{
	//$reply .= "Checking session...";
	$row=mysql_fetch_array($result);
	$usert=$row['u_email'];
	$passt=$row['u_password'];
	$type=$row['u_type'];
		if($usert==$user && $passt==$pass)
		{
			$reply .= "Creating session...";
			$_SESSION['u_email']=$row['u_email'];
			$_SESSION['u_name']=$row['u_name'];
			$_SESSION['u_type']=$row['u_type'];
			$_SESSION['u_id']=$row['uid'];
			$_SESSION['login']= true;
			if($row['u_type']=="doctor")
			{
				if ($row['first']=="true") {
					echo "newDoctor";
				}else{
					echo "doctor";
				}
			}
			else if($row['u_type']=='patient')
			{
				if ($row['first']=="true") {
					echo "newPatient";
				}else{
					echo "patient";
				}
			}
			else
			{
				echo "mistaken";
				//header('location:../index.php');
			}
			
		}
	//echo $reply;
}
else
{
	echo "login failed";//header('location:../index.php');
}
?>