<html>
<head>
<script type='text/javascript' src='js/plugins/jquery/jquery-1.9.1.min.js'></script>
<script type="text/javascript">
$( document ).ready(function() {
	alert("omar");
	res(7, 1 , 'omar' );
function res(doc_id, minit, talbe0) 
    {
        var user_id= doc_id;
        var docName= "Tahmid";
        var min= $("#dmin").val();;
        var tablee = checktable('omar');
        //alert("enetring while");

        //var i=tablee.length-1;
        var i=0;
        while(i<tablee.length){
            if (min <=0 ){
                break;
            }
            var prstrt= tablee[i][6];
            var prend= tablee[i][7];
            console.log("start_time "+ prstrt+ "       end_time: "+prend);
            if (i<tablee.length-1){
                var diff= checkDiffMin(prend , tablee[i+1][6]);
                console.log("diff: "+diff+" min: "+ min);
            }
            var newstrt= addMinute(prstrt, min);
            var newend= addMinute(prend, min);
            if(diff>0){
                min= min-diff;
            }
            var number=[];
            number.push(tablee[i][3]);
            var msg= "Your Appointmet with Dr. "+ docName+" has been rescheduled to "+ newstrt+"(previous time: " + prstrt+")";
            //console.log(msg);
            //send_SMS(msg, number);
            $.ajax({ method: "POST", url: "forms/updateDelay.php",data: {
                app_id: tablee[i][1], newstrt: newstrt, newend:newend
            }
            }).done(function(text) {
                alert("Delay msg:   "+ text);
            });

            i++;
        }
    }
    function checktable(tblname) {
        var table = document.getElementById('omar'), 
        rows = table.getElementsByTagName('tr'),
        i, j, cells;
        var jTable=[];


        for (i = 0, j = rows.length; i < j; ++i) {
            console.log(rows[i].cells.length);
            var jrows=[];
            cells = rows[i].getElementsByTagName('td');
            for (x=0; x<rows[i].cells.length; x++) {
                    jrows.push(cells[x].innerHTML);
            };
            jTable.push(jrows);
        };
        console.log(jTable);
        return jTable; 
    }
        /**************************Add minute with time******************************/
    
    function checkDiffMin(time1, time2) {
        console.log("Time form metoh: "+ time1+" time2: "+ time2);
        var hms = time1; // your input string
        var hms2 = time2; // your input string
        var a = hms.split(':'); // split it at the colons
        var a2 = hms2.split(':');
        //console.log("Time spplit: "+ a[0]+" minute: "+ a[1]+ " seconds: "+ a[2]);
        // minutes are worth 60 seconds. Hours are worth 60 minutes.
        var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]);
        var seconds2 = (+a2[0]) * 60 * 60 + (+a2[1]) * 60 + (+a2[2]);
        var diff= (seconds2- seconds)/60;
        console.log("diff"+diff);
        return diff;
        
    }
    
    function addMinute(time, minute) {
        //console.log("Time form metoh: "+ time+" minute: "+ minute);
        var hms = time; // your input string
        var a = hms.split(':'); // split it at the colons
        //console.log("Time spplit: "+ a[0]+" minute: "+ a[1]+ " seconds: "+ a[2]);
        // minutes are worth 60 seconds. Hours are worth 60 minutes.
        var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]);
        seconds += minute * 60;
        console.log(seconds);
        return toHHMMSS(seconds);
    }
    function toHHMMSS(seconds) {
        var sec_num = parseInt(seconds, 10); // don't forget the second param
        var hours = Math.floor(sec_num / 3600);
        var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
        var seconds = sec_num - (hours * 3600) - (minutes * 60);

        if (hours < 10) {
            hours = "0" + hours;
        }
        if (minutes < 10) {
            minutes = "0" + minutes;
        }
        if (seconds < 10) {
            seconds = "0" + seconds;
        }
        var time = hours + ':' + minutes + ':' + seconds;
        return time;
    }
});
</script>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="100%" id= "omar">
<?php
include('../forms/dbcon_s.php');
if (isset($_GET['id']) && isset($_GET['minute'])){
	$user_id=$_GET['id'];
	$min=$_GET['minute'];
}else{
	$user_id=7;
	$min=1;
}
$datee= date('Y-m-d');

$get_today_appointments=mysql_query("SELECT doc_appointment.id_appdetails, app_details.app_fname, app_details.app_email, app_details.app_phone,app_details.app_reason,doc_appointment.book_date,doc_appointment.start_time, doc_appointment.end_time,doc_appointment.id_patient,doc_appointment.id_doctor,doc_appointment.services_name,doc_appointment.app_status FROM doc_appointment, app_details WHERE doc_appointment.id_doctor = '7' AND doc_appointment.id_appdetails = app_details.id  AND doc_appointment.book_date = '2015-08-21' order by start_time");

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
<input type="number" placeholder="minutes for delay" value="<?php echo htmlspecialchars($min); ?>" id="dmin" disabled/>
</table>
</body>
</html>