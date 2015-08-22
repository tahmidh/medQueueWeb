<?php
session_start();
include('../forms/dbcon_s.php');
include("header.php");
include("sidebarmenu.php");
include("topbarmenu.php");
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



?>            

<div class="content">
    <input type="text" name="name" id="doc_id" value="<?php echo htmlspecialchars($d_id); ?>" disabled/>
    <input type="hidden" name="name" id="p_id" value="<?php echo htmlspecialchars($p_id); ?>" disabled/>
    <input type="hidden" name="name" id="app_id" value="<?php echo htmlspecialchars($app_id); ?>" disabled/>
    <div class="page-header">
        <div class="icon">
            <span class="ico-arrow-right"></span>
        </div>
        <h1>Prescription<small>Medqueue</small></h1>
    </div>
    <!--------------------------Doctor Summary information------------------------------>
    <div class="row-fluid">
        <div class="span12">
            <div style="font-family:'Times New Roman', Georgia, Serif;;font-size:15px; color:white;padding: 2px 10px 10px 15px;background:#00AC7A; width:100%;">Basic Patient Information:</div>
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

            <!------------------------------------------------------------------------------>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <!------------------------------------------------------------------------------>
            <div class="block">
                <div class="head yellow">                                
                    <h2>Billing Information</h2>
                    <ul class="buttons">             
                        <li><div class="icon"><span class="ico-info"></span></div></a></li>
                    </ul>                               
                </div>
                <div class="block">
                    <table class="block" id="tableService">
                        <tr id="serviceTable">
                            <td>Details</td>
                            <td>Qty</td>
                            <td>Price</td>
                        </tr>

                        <tr id="serviceTable">
                            <td><input type="text" name="name" placeholder="Last Name" id="form_sername" required/></td>
                            <td><input type="text" name="name" placeholder="Last Name" id="form_qty" required/></td>
                            <td><input type="text" name="name" placeholder="Last Name" id="form_price" required/></td>
                        </tr>

                    </table>
                    <button class="btn btn-success" id="addbill_det" type="button" align="left">Add Billing Item</button>
                </div>
                <div class="block">
                    <table class="block">
                        <tr>
                            <td>Sl.</td>
                            <td>Billing Information</td>
                            <td>Qty</td>
                            <td>Price</td>
                            <td>Total Price</td>
                        </tr>
                        <?php
                        $str = "select * from bill_det where app_id='$app_id'";
                        $result= mysql_query($str);
                        $sl=1;
                        while($row=mysql_fetch_array($result)){
                            ?>
                            <tr>
                                <td><?php echo $sl;?></td>
                                <td><?php echo $row['ser_name'];?></td>
                                <td><?php echo $row['ser_qty'];?></td>
                                <td><?php echo $row['ser_price'];?></td>
                                <td><?php echo $row['total_amm'];?></td>
                            </tr>

                            <?php  
                            $sl=$sl+1;
                        }
                        ?>

                    </table>
                </div>
                <!--textarea name="content" style="width:100%; height: 300px;"></textarea-->
            </div>
        </div>
    </div>
    <!--Doctor Summary information-->
    <!--Advice Panel-->

    <!--Doctor Income Graph-->
    <div class="row-fluid">
        <button class="btn btn-success" id="savebill" type="button">Save</button>
        <button class="btn" id="printB"type="button">Print Bill</button>
        
    </div>

</div>
</div> 

</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
<?php
include("footer.php");
?>          