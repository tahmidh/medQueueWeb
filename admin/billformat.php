<?php session_start();?>
<style type="text/css">
table.table_data_view{ font-size:14px;}
table.table_data_view tr td{ background:#ffffff; border-bottom:1px dashed #666666; border-right:1px dashed #666666; padding:2px;}
table.table_data_view tr td:first-child{border-left:1px dashed #666666;}
table.table_data_view tr th{ background:#ffffff; border-top:1px  dashed #666666; border-bottom:1px dashed #666666; border-right:1px dashed #666666; padding:2px;}
table.table_data_view tr th:first-child{border-left:1px dashed #666666;}
table.table_data_view tr:last-child th{border-top:none;}
</style>

<?php 

include('../forms/dbcon_s.php');
if (isset($_GET['id'])) {
	$p_id = $_GET['id'];
}
else {
	$p_id = 8;
}

$date = date('Y-m-d');
$time = date('H:i:s');

$d_id = $_SESSION['u_id'];

// $get_doctor_details=mysql_query("SELECT * FROM user_details as u,pictures as p,doc_workplan as dw,doc_services as ds,doc_qualifications as dq WHERE user_details.login_id = '$user_id' AND pictures.u_id = '$user_id' AND doc_workplan.user_id = '$user_id' AND doc_services.user_id = '$user_id' AND doc_qualifications.user_id = '$user_id'");

$get_patient_details_1=mysql_query("SELECT * FROM user_details WHERE user_details.login_id = '$p_id'");
$get_patient_details_2=mysql_query("SELECT * FROM pat_basic WHERE pat_basic.user_id = '$p_id'");
$get_patient_details_3=mysql_query("SELECT * FROM pat_history WHERE pat_history.user_id = '$p_id'");

$get_doctor_details_1=mysql_query("SELECT * FROM user_details WHERE user_details.login_id = '$d_id'");
$get_doctor_details_2=mysql_query("SELECT * FROM doc_services WHERE doc_services.user_id = '$d_id'");
$get_doctor_details_3=mysql_query("SELECT * FROM doc_qualifications WHERE doc_qualifications.user_id = '$d_id'");


$pat1=mysql_fetch_array($get_patient_details_1);
$pat2=mysql_fetch_array($get_patient_details_2);
$pat3=mysql_fetch_array($get_patient_details_3);

$doc1=mysql_fetch_array($get_doctor_details_1);
$doc2=mysql_fetch_array($get_doctor_details_2);
$doc3=mysql_fetch_array($get_doctor_details_3);



?>

<div id="print_area" style="width:600px; font-size:12px;">
<!--?php 
include('dbcon_s.php'); 
#00ac7a
?-->
<div style="background:#00AC7A; width:100%;"> <img src="./img/logo.png" alt="Mountain View" style=""></div>
<div style="background:#018E65; width:100%; margin-top:-15px;">
	<h3 align ="right" style="margin:2px;font-size:18px; color:white;padding: 10px 10px 1px 15px; "><?php echo $doc1['first_name']; echo " "; echo $doc1['last_name'];?></h3>
	<h4 align ="right" style="margin:2px;font-size:18px; color:white;padding: 1px 10px 1px 15px; "><?php echo $doc1['address'];?></h4>
	<h4 align ="right" style="margin:2px;font-size:15px; color:white;padding: 2px 10px 2px 15px; ">Doctor Speciality: <?php echo $doc3['specialities'];?></h4>
	<!-- 	<p style="font-family:'Times New Roman', Georgia, Serif;;font-size:15px; color:white;padding: 2px 10px 10px 15px;">Doctor Specialization</p> -->
</div>

<div style="font-family:'Times New Roman', Georgia, Serif;;font-size:15px; color:white;padding: 2px 10px 10px 15px;background:#00AC7A; width:100%;">Basic Patient Information:</div>
<br>

<table class="table_data_view" style="width:100%;" cellspacing="1">
<!-- 	<tr>
		<th colspan="5">Basic Patient Information:</th>
	</tr> -->
	<tr>
		<td style="border-top:1px  dashed #666666;" colspan="4">Patient Name: <?php echo $pat1['first_name']; echo " "; echo $pat1['last_name'];?></td>
		<td colspan="1" style="text-align:right;border-top:1px  dashed #666666;">Date: <?php echo $date;?></td>
	</tr>
	<tr>
		<td>DOB: <?php echo $pat2['dob'];?></td>
		<td>Gender: <?php echo $pat2['gender'];?></td>
		<td>Blood Group: <?php echo $pat2['bloodgroup'];?></td>
		<td>Weigth: <?php echo $pat2['weight'];?></td>
		<td>Heigth: <?php echo $pat2['height'];?></td>
	</tr>
</table>

<br><hr><br>

<div style="font-family:'Times New Roman', Georgia, Serif;;font-size:15px; color:white;padding: 2px 10px 10px 15px;background:#00AC7A; width:100%;">Billing Information</div>
<br>

<table class="table_data_view" style="width:100%;" cellspacing="1">
	<tr>
		<th width="10%">Serial No.</th>
		<th width="70%">Description</th>
		<th>Amount</th>
	</tr>

	<tr>
		<td width="10%">1</td>
		<td width="70%">Colsultancy</td>
		<td>Tk. 400</td>
	</tr>
		<tr>
		<td width="10%">1</td>
		<td width="70%">Ultrasonography</td>
		<td>Tk. 1500</td>
	</tr>
	<tr>
		<td colspan="2"><b>Total:</b></td>
		<td><b>Tk. 1900</b></td>
	</tr>


</table>

<br><hr><br>

<br><br>


<p align ="right">
	________________________________
	<?php 
	echo "<br>";
	echo $doc1['first_name']; echo " "; echo $doc1['last_name'];
	echo "<br>";
	echo $date; echo " "; echo $time;
	echo "<br>";
	echo $doc3['qualifications'];
	?>
</p>

<?php
/*
	$incvat=$total_price+$total_vat-$discount;
	$cash=$total_price+$total_vat+$s_charge-$discount;
	$update_order_list=mysql_query("update order_list set order_total='$total_price', discount='$discount', ser_charge='$s_charge', vat_total='$total_vat', incv_total='$incvat', cash='$cash' where order_no='$order'");

	$update_table_info=mysql_query("update table_info set status='waiting' where table_no='$table'");
*/
	?>



</div>            