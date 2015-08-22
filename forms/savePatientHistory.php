<?php 
include('dbcon_s.php'); 

$diabetes_own=$_POST['diabetes_own'];
$diabetes_fam=$_POST['diabetes_fam'];
$heart_own=$_POST['heart_own'];
$heart_fam=$_POST['heart_fam'];
$cholestrol_own=$_POST['cholestrol_own'];
$cholestrol_fam=$_POST['cholestrol_fam'];
$bp_own=$_POST['bp_own'];
$bp_fam=$_POST['bp_fam'];
$heartack_own=$_POST['heartack_own'];
$heartack_fam=$_POST['heartack_fam'];
$stroke_own=$_POST['stroke_own'];
$stroke_fam=$_POST['stroke_fam'];
$login_id=$_POST['login_id'];

$query_str="insert into pat_history(diabetes_own,diabetes_fam,heart_own,heart_fam,cholestrol_own,cholestrol_fam,bp_own,bp_fam,heartack_own,heartack_fam,stroke_own,stroke_fam,user_id) values('$diabetes_own','$diabetes_fam','$heart_own','$heart_fam','$cholestrol_own','$cholestrol_fam','$bp_own','$bp_fam','$heartack_own','$heartack_fam','$stroke_own','$stroke_fam','$login_id')";
$query=mysql_query($query_str);

if($query)
{
}else
{
	echo mysql_error();	
}

$query_str="UPDATE user_login set first = 'false' WHERE uid = '$login_id'";
$query=mysql_query($query_str);

if($query)
{
}else
{
	echo mysql_error();	
}



?>