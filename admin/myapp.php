<?php 
session_start();
include("header.php");
include("sidebarmenu.php");
include("topbarmenu.php");
include('../forms/dbcon_s.php');

$user_id = $_SESSION['u_id'];

// date_default_timezone_set('Bangladesh/Dhaka');
$date = date('Y-m-d');
$time = date('H:i:s');




$get_doctor_appointments=mysql_query("SELECT doc_appointment.id_appdetails, app_details.app_fname, app_details.app_email, app_details.app_phone,app_details.app_reason,doc_appointment.book_date,doc_appointment.start_time, doc_appointment.end_time,doc_appointment.id_patient,doc_appointment.id_doctor,doc_appointment.services_name,doc_appointment.app_status FROM doc_appointment, app_details WHERE doc_appointment.id_doctor = '$user_id' AND doc_appointment.id_appdetails = app_details.id order by book_date,start_time");

$get_today_appointments=mysql_query("SELECT doc_appointment.id_appdetails, app_details.app_fname, app_details.app_email, app_details.app_phone,app_details.app_reason,doc_appointment.book_date,doc_appointment.start_time, doc_appointment.end_time,doc_appointment.id_patient,doc_appointment.id_doctor,doc_appointment.services_name,doc_appointment.app_status FROM doc_appointment, app_details WHERE doc_appointment.id_doctor = '$user_id' AND doc_appointment.id_appdetails = app_details.id  AND doc_appointment.book_date = '$date' order by start_time");

?>




<div class="content">
    <input type="text" name="name" id="d_id" value="<?php echo htmlspecialchars($_SESSION['u_id']); ?>" disabled/>
    <input type="hidden" name="name" id="form_u_name" value="<?php echo htmlspecialchars($_SESSION['u_name']); ?>" disabled/>
    <div class="page-header">
        <div class="icon">
            <span class="ico-arrow-right"></span>
        </div>
        <h1>Appointment Board <small>Medqueue</small></h1>
    </div>
    <!--------------------------Doctor Summary information------------------------------>
    <!--------------------------Doctor Summary information------------------------------>
    <!--------------------------Doctor Income Graph------------------------------>
    <div class="row-fluid">

        <div class="span12">
            <div class="block">
              <div class="data-fluid">
                <div class="head orange">                                
                    <h2>List of today's appointments:</h2>
                    <ul class="buttons">
                        <li><a href="#" onClick="source('table_main'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                        <li><a href="#" class="ublock"><div class="icon"><span class="ico-undo"></span></div></a></li>
                        <li><a href="#" class="cblock"><div class="icon"><span class="ico-sort"></span></div></a></li>
                    </ul>
                </div>

                <table cellpadding="0" cellspacing="0" width="100%" class="table lcnp" id= "omar">

                    <thead>
                        <tr>
                            <th width="16"><input type="checkbox" class="checkall"/></th>                                        
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Reason</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Service</th>
                            <th>Status</th>                       
                            <th width="150">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        while($row1=mysql_fetch_array($get_today_appointments)){

                            echo '
                            <tr>
                            <td><input type="checkbox" name="checkbox"/></td>                                        
                            <td id="app_details">' . $row1['id_appdetails']. '</td>
                            <td id="app_fname">' . $row1['app_fname']. '</td>
                            <td id="app_phone">' . $row1['app_phone']. '</td>
                            <td id="app_reason">' . $row1['app_reason']. '</td>
                            <td id="book_date">' . $row1['book_date']. '</td> 
                            <td id="start_time">' . $row1['start_time']. '</td>
                            <td id="end_time">' . $row1['end_time']. '</td>
                            <td id="services_name">' . $row1['services_name']. '</td>
                            <td id="app_status">' . $row1['app_status']. '</td>                       

                            <td>
                            <a href="#" class="button yellow">
                            <div class="icon"><span class="icon-resize-vertical" ></span></div>
                            </a>
                            <a href="#" class="button green">
                            <div class="icon"><span class="ico-pencil"></span></div>
                            </a>
                            <a href="#" class="button red">
                            <div class="icon"><span class="ico-remove"></span></div>
                            </a>
                            </td>
                            </tr>
                            ';

                        }

                        ?>

                    </tbody>

                </table>

            </div>
            <div class="row-fluid">
                <button class="btn" id="prescribe" type="button">Prescribe</button>
                <button class="btn btn-danger" id="reschedule" type="button">Reschedule Selected</button>
                <button class="btn btn-danger" id="reschedule" type="button">Cancel Selected</button>
                <input type="number" placeholder="minutes for delay" value="" id="dmin"/>
                <button class="btn btn-danger" id="delayAll" type="button">Delay and Notify all</button>
                
            </div>
            <div class="row-fluid">
                <button class="btn btn-success" id="callNext" type="button">Next Patient</button>
                <button class="btn" id="printP"type="button">Notify All</button>
                <button class="btn btn-success" id="sendSMS" type="button">SMS 10 Patient</button>
            </div>
            <br><hr><br>


            <div class="data-fluid">
                <div class="head orange">                                
                    <h2>List of all appointments:</h2>
                    <ul class="buttons">
                        <li><a href="#" onClick="source('table_main'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                        <li><a href="#" class="ublock"><div class="icon"><span class="ico-undo"></span></div></a></li>
                        <li><a href="#" class="cblock"><div class="icon"><span class="ico-sort"></span></div></a></li>
                    </ul>
                </div>

                <table cellpadding="0" cellspacing="0" width="100%" class="table lcnp">

                    <thead>
                        <tr>
                            <th width="16"><input type="checkbox" class="checkall"/></th>                                        
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Reason</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Service</th>
                            <th>Status</th>                       
                            <th width="150">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        while($row=mysql_fetch_array($get_doctor_appointments)){

                            echo '
                            <tr>
                            <td><input type="checkbox" name="checkbox"/></td>                                        
                            <td>' . $row['id_appdetails']. '</td>
                            <td>' . $row['app_fname']. '</td>
                            <td>' . $row['app_phone']. '</td>
                            <td>' . $row['app_reason']. '</td>
                            <td>' . $row['book_date']. '</td> 
                            <td>' . $row['start_time']. '</td>
                            <td>' . $row['end_time']. '</td>
                            <td>' . $row['services_name']. '</td>
                            <td>' . $row['app_status']. '</td>                       

                            <td>
                            <a href="#" class="button green">
                            <div class="icon"><span class="icon-resize-vertical"></span></div>
                            </a>
                            <a href="#" class="button green">
                            <div class="icon"><span class="ico-pencil"></span></div>
                            </a>
                            <a href="#" class="button red">
                            <div class="icon"><span class="ico-remove"></span></div>
                            </a>
                            </td>
                            </tr>
                            ';

                        }

                        ?>

                    </tbody>

                </table>

            </div>
            <div class="row-fluid">
                <button class="btn btn-success" type="button">Success button</button>
                <button class="btn" id="printP"type="button">Print Prescription</button>
                <button class="btn btn-success" id="sendSMS" type="button">Send SMS</button>
            </div>                            
        </div>                        

    </div>
    <div style="height: 800px;"></div>


</div>

</div>

</div>
<?php 
include("footer.php");
?>          