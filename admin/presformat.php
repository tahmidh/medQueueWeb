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
if (isset($_GET['app_id'])) {
	$app_id = $_GET['app_id'];
}
else {
	$app_id = 0;
}
$get_res=mysql_query("SELECT * FROM doc_appointment WHERE id = '$app_id'");
$row=mysql_fetch_array($get_res);
$p_id=$row['id_patient']; 

$date = date('Y-m-d');
$time = date('H:i:s');

$d_id = $_SESSION['u_id'];

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

$get_details=mysql_query("SELECT * FROM prescription_det where app_id='$app_id'");
$details= mysql_fetch_array($get_details);

?>

<div id="print_area" style="width:600px; font-size:12px;">
	<div style="background:#00AC7A; width:100%;"> <img src="./img/logo.png" alt="Mountain View" style=""></div>
	<div style="background:#018E65; width:100%; margin-top:-15px;">
		<h3 align ="right" style="margin:2px;font-size:18px; color:white;padding: 10px 10px 1px 15px; "><?php echo $doc1['first_name']; echo " "; echo $doc1['last_name'];?></h3>
		<h4 align ="right" style="margin:2px;font-size:18px; color:white;padding: 1px 10px 1px 15px; "><?php echo $doc1['address'];?></h4>
		<h4 align ="right" style="margin:2px;font-size:15px; color:white;padding: 2px 10px 2px 15px; ">Doctor Speciality: <?php echo $doc3['specialities'];?></h4>
	</div>

	<div style="font-family:'Times New Roman', Georgia, Serif;;font-size:15px; color:white;padding: 2px 10px 10px 15px;background:#00AC7A; width:100%;">Basic Patient Information:<?php echo $app_id;?></div>
	<br>

	<table class="table_data_view" style="width:100%;" cellspacing="1">
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

	<div style="font-family:'Times New Roman', Georgia, Serif;;font-size:15px; color:white;padding: 2px 10px 10px 15px;background:#00AC7A; width:100%;">Rx</div>
	<br>

	<table class="table_data_view" style="width:100%;" cellspacing="1">
		<tr>
			<td style="border-top:1px  dashed #666666;"><?php echo $details['symptoms'];?></td>
		</tr>
	</table>

	<br><hr><br>

	<div style="font-family:'Times New Roman', Georgia, Serif;;font-size:15px; color:white;padding: 2px 10px 10px 15px;background:#00AC7A; width:100%;">Diagnosis</div>
	<br>

	<table class="table_data_view" style="width:100%;" cellspacing="1">
		<tr>
			<td style="border-top:1px  dashed #666666;"><?php echo $details['diagnosis'];?></td>
		</tr>
	</table>

	<br><hr><br>

	<div style="font-family:'Times New Roman', Georgia, Serif;;font-size:15px; color:white;padding: 2px 10px 10px 15px;background:#00AC7A; width:100%;">Medication</div>
	<br>

	<table class="table_data_view" style="width:100%;" cellspacing="1">
		<tr>
                            <td style="border-top:1px  dashed #666666;"><b>Medication</b></td>
                            <td style="border-top:1px  dashed #666666;"><b>Dose (in days)</b></td>
                            <td style="border-top:1px  dashed #666666;"><b>Frequency</b></td>
                        </tr>
                        <?php
                        $str = "select med_name, dose, freq from prescription_med where app_id='$app_id'";
                        $result= mysql_query($str);
                        while($row=mysql_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['med_name'];?></td>
                            <td><?php echo $row['dose'];?></td>
                            <td><?php echo $row['freq'];?></td>
                        </tr>
                          
                        <?php  
                            }
                        ?>

	</table>

	<br><hr><br>

	<div style="font-family:'Times New Roman', Georgia, Serif;;font-size:15px; color:white;padding: 2px 10px 10px 15px;background:#00AC7A; width:100%;">Tests and Advice</div>
	<br>

	<table class="table_data_view" style="width:100%;" cellspacing="1">
		 <tr>
                            <td style="border-top:1px  dashed #666666;"><b>Test Name</b></td>
                            <td style="border-top:1px  dashed #666666;"><b>Notes</b></td>
                        </tr>
                        <?php
                        $str = "select name, notes from prescription_test where app_id='$app_id'";
                        $result= mysql_query($str);
                        while($row=mysql_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['notes'];?></td>
                        </tr>
                          
                        <?php  
                            }
                        ?>
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