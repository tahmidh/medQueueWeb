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
            <div class="block">
                <div class="head red">                                
                    <h2>Symptoms</h2>
                    <ul class="buttons">             
                        <li><div class="icon"><span class="ico-info"></span></div></a></li>
                    </ul>                                
                </div>
                <textarea name="content" style="width:100%; height: 300px;" id="form_symptoms"></textarea>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <!------------------------------------------------------------------------------>
            <div class="block">
                <div class="head green">                                
                    <h2>Diagnosis</h2>
                    <ul class="buttons">             
                        <li><div class="icon"><span class="ico-info"></span></div></a></li>
                    </ul>                                
                </div>
                <textarea name="content" style="width:100%; height: 300px;" id= "form_diagnosis"></textarea>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span7">
            <!------------------------------------------------------------------------------>
            <div class="block">
                <div class="head yellow">                                
                    <h2>Medication</h2>
                    <ul class="buttons">             
                        <li><div class="icon"><span class="ico-info"></span></div></a></li>
                    </ul>                               
                </div>
                <div class="block">
                    <table class="block" id="tableService">
                        <tr id="serviceTable">
                            <td>Medication</td>
                            <td>Dose(in days)</td>
                            <td>Frequency</td>
                        </tr>
                        <tr id="serviceTable">
                            <td><input type="text" name="name" placeholder="Last Name" id="form_medname" required/></td>
                            <td><input type="text" name="name" placeholder="Last Name" id="form_dose" required/></td>
                            <td><input type="text" name="name" placeholder="Last Name" id="form_freq" required/></td>
                        </tr>

                    </table>
                    <button class="btn btn-success" id="addmed" type="button" align="left">Add Med</button>
                </div>
                <div class="block">
                    <table class="block">
                        <tr>
                            <td>Medication</td>
                            <td>Dose(in days)</td>
                            <td>Frequency</td>
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
                </div>
                <!--textarea name="content" style="width:100%; height: 300px;"></textarea-->
            </div>
        </div>
        <div class="span5">
            <!------------------------------------------------------------------------------>
            <div class="block">
                <div class="head blue">                                
                    <h2>tests</h2>
                    <ul class="buttons">             
                        <li><div class="icon"><span class="ico-info"></span></div></a></li>
                    </ul>                                
                </div>
                <!--****************************************************************************-->
                <div class="block">
                    <table class="block" id="tableService">
                        <tr id="serviceTable">
                            <td>Test Name</td>
                            <td>Notes</td>
                        </tr>
                        <tr id="serviceTable">
                            <td><input type="text" name="name" placeholder="Last Name" id="form_test" required/></td>
                            <td><input type="text" name="name" placeholder="Last Name" id="form_tnote" required/></td>
                        </tr>
                    </table>
                    <button class="btn btn-success" id="addtest" type="button">Add Test</button>
                </div>
                <div class="block">
                    <table class="block">
                        <tr>
                            <td>Test Name</td>
                            <td>Notes</td>
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
                </div>
            </div>
        </div>
    </div>
    <!--Doctor Summary information-->
    <!--Advice Panel-->
    <div class="row-fluid">
        <div class="span12">
            <!------------------------------------------------------------------------------>
            <div class="block">
                <div class="head green">                                
                    <h2>Advice</h2>
                    <ul class="buttons">             
                        <li><div class="icon"><span class="ico-info"></span></div></a></li>
                    </ul>                                
                </div>
                <textarea name="content" style="width:100%; height: 50px;" id="form_advice"></textarea>
            </div>
        </div>
    </div>

    <!--Doctor Income Graph-->
    <div class="row-fluid">
        <button class="btn btn-success" id="savePres" type="button">Save</button>
        <button class="btn" id="printP"type="button">Print Prescription</button>
        <button class="btn btn-success" id="sendSMS" type="button">Send SMS</button>
    </div>

</div>

<script type="text/javascript" src="../admin/js/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
    font_size_style_values: "12px,13px,14px,16px,18px,20px",
    content_css : "custom.css",
    selector: "textarea",
    plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
</div> 
<?php
include("footer.php");
?>          