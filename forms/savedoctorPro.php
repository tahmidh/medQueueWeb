<?php 
include('dbcon_s.php'); 
/*qualifications:qualifications, hospitals:hospitals, languages:languages, specialities:specialities,
            professional_det:professional_det, shortbio:shortbio, login_id:login_id*/

$qualifications=$_POST['qualifications'];
$hospitals=$_POST['hospitals'];
$languages=$_POST['languages'];
$specialities=$_POST['specialities'];
$professional_det=$_POST['professional_det'];
$shortbio=$_POST['shortbio'];
$category=$_POST['category'];
$login_id=$_POST['login_id'];


$query_str="insert into doc_qualifications(qualifications, hospitals, languages, specialities, professional_det, shortbio, login_id, category) values('$qualifications','$hospitals','$languages','$specialities','$professional_det','$'shortbio,'$login_id', '$category')";
$query=mysql_query($query_str);
if($query)
{
}else
{
	echo mysql_error();	
}

?>
