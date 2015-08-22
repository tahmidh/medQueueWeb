$( document ).ready(function() {
      //callses();

    $("#printP").click(function() 
    {
        print_prescription();
    });
    $("#printB").click(function() 
    {
        print_bill();
    }); 

    //****************Omar starts****************************** 

    function print_prescription(sta)
    {
        //alert();
        //var book_date = xdate;
        //var start_time = service_slot;
        //var end_time = service_slot_end;
        //var id_doctor = doc_id;
        //var service_name = service_selected;
        var app_id= $("#app_id").val();
        var str= "presformat.php?app_id="+ app_id;
        console.log(str);
        $.post(str ,{},function(result)
        {

            var popupWin = window.open('', '_blank', 'width=300,height=600');
            popupWin.document.open();
            popupWin.document.write('<html><head><script type="text/javascript" src="print.js"></script></head><body onload="window_print()">' + result + '</html>');
            popupWin.document.close();
        });
        createbill(app_id);     


    }
    function createbill(aid){
        $.ajax({ method: "POST", url: "forms/saveBillDet.php",data: {
                app_id: aid
            }
            }).done(function(text) {
                alert(text);
            });


    }


    function get_available_services(){
        var login_id = $("#form_u_id").val();
        $.ajax({
            method: "POST",
            url: "forms/getdoctorSer.php",
            data: {
                login_id: login_id
            }
        })
        .done(function(text) {

            console.log("Got Services: " + text);
            var msg = eval("(function(){return " + text + ";})()");
            var optionHtml = "";
            for (var i = 1; i < Object.keys(msg).length; i++) {
                optionHtml += "<tr class='serviceTableAfter'>";
                for (var j = 0; j < 3 ; j++) {
                 optionHtml += '<td>' + msg[i][j] + '</td>';
             };
             optionHtml += "<td><div class='btn btn-default' id=''>Edit</div><div class='btn btn-default' id=''>Delete</div></td></tr>";
         };
         console.log(optionHtml);
         if($('.serviceTableAfter').length > 0){
            $('.serviceTableAfter').remove();
            $('#serviceTable').after(optionHtml);
        }else{
            $('#serviceTable').after(optionHtml);
        }

    });

    }
    function callses(){
        $.get("../get_session.php", function(sessionFromServer)
        {
         alert(sessionFromServer);
     });      
    }
    /***************************Prescribtion code******************************/
    $("#addbill_det").click(function() 
    {
        alert();
        var p_id= $("#p_id").val();
        var d_id= $("#d_id").val();
        var app_id= $("#app_id").val();
        var ser_name= $("#form_sername").val();
        var qty= $("#form_qty").val();
        var price= $("#form_price").val();
        var total_price= qty* price;
        alert (total_price + "-----"+ qty + "-----"+ price);
        $.ajax({ method: "POST", url: "forms/saveBillDet.php",data: {
                doc_id: d_id, app_id:app_id, patient_id:p_id, ser_name:ser_name, qty:qty, price:price, total_price:total_price
            }
            }).done(function(text) {
                alert(text);
            });
    });
    $("#saveBill").click(function() 
    {
        var app_id= $("#app_id").val();
        $.ajax({ method: "POST", url: "forms/save_bill_info.php",data: {
                app_id:app_id
            }
            }).done(function(text) {
                alert(text);
            });
    });

    $("#savePres").click(function() 
    {
        var symptoms= tinymce.get('form_symptoms').getContent();
        var diagnosis= tinymce.get('form_diagnosis').getContent();
        var advice = tinymce.get('form_advice').getContent();
        var p_id= $("#p_id").val();
        var d_id= $("#d_id").val();
        var app_id= $("#app_id").val();
        alert("app_id" + app_id);
        alert("symptoms" +symptoms);
        alert(diagnosis);
        alert( advice);
        $.ajax({ method: "POST", url: "forms/preSave.php",data: {
                doc_id: d_id, app_id:app_id, patient_id:p_id, symptoms:symptoms, diagnosis:diagnosis, advice:advice
            }
            }).done(function(text) {
                alert(text);
            });
    });
    $("#addmed").click(function() 
    {
        var med_name= $("#form_medname").val();
        var dose= $("#form_dose").val();
        var freq = $("#form_freq").val();
        var p_id= $("#p_id").val();
        var d_id= $("#d_id").val();
        var app_id= $("#app_id").val();
        $.ajax({ method: "POST", url: "forms/pre_med.php",data: {
                doc_id: d_id, app_id:app_id, patient_id:p_id, med_name:med_name, dose:dose, freq:freq
            }
            }).done(function(text) {
                alert(text);
            });
    });
    $("#addtest").click(function() 
    {
        var name= $("#form_test").val();
        var notes= $("#form_tnote").val();
        var p_id= $("#p_id").val();
        var d_id= $("#d_id").val();
        var app_id= $("#app_id").val();
        $.ajax({ method: "POST", url: "forms/pre_test.php",data: {
                doc_id: d_id, app_id:app_id, patient_id:p_id, name:name, notes:notes
            }
            }).done(function(text) {
                alert(text);
            });
    });


    $("#prescribe").click(function() 
    {
        var tablee= checktable('omar');
        var doc_id= $("#d_id").val();
        var i=0;
        while(i<tablee.length){
            var flag= tablee[i][0];
            if (flag== true){
                break;
            }
            i++;
        }
        var app_id= tablee[i][1];
        $.ajax({ method: "POST", url: "forms/prescription_new.php",data: {
                caller: "new", doc_id: doc_id, app_id:app_id
            }
            }).done(function(text) {
                alert(text);
                str= "prescription.php?app_id="+ app_id;
                window.location = str;
            });

    });

    /****************Queue management code*******************/
    $("#delayAll").click(function() 
    {
        var docName= $("#form_u_name").val();
        var tablee = checktable('omar');
        var min= $("#dmin").val();
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
                //alert("Delay msg:   "+ text);
            });

            i++;
        }
    });
    

    $("#callNext").click(function() 
    {
        var tablee = checktable('omar');
    });
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
    /***********************Rechedule code****************************/
    $("#reschedule").click(function() 
    {
        var tablee = checktable('omar');
        
    });


    /***********HTML Table to Javascript Code****************/
    function checktable(tblname) {
        var table = document.getElementById('omar'), 
        rows = table.getElementsByTagName('tr'),
        i, j, cells;
        var jTable=[];


        for (i = 1, j = rows.length; i < j; ++i) {
            console.log(rows[i].cells.length);
            var jrows=[];
            cells = rows[i].getElementsByTagName('td');
            for (x=0; x<rows[i].cells.length; x++) {
                if (x==0){
                    jrows.push($(cells[x].innerHTML).find("span").hasClass("checked"));
                }else{
                    jrows.push(cells[x].innerHTML);   
                }
            };
            jTable.push(jrows);
        };
        console.log(jTable);
        return jTable; 
    }

    
    /*********SMS SERVER CODE********/
    $("#sendSMS").click(function() 
    {
        var number= ["8801674918424"];
        var msg= "Thankyou - MedQueue.";
        send_SMS(msg , number);
    });

    function send_SMS(msg, number){
        for (var i = 0; i < number.length; i++) {
            var myNumber=number[i];
            var myText=msg + "msg n-"+i;
            var username='khaled.ali';
            var password='khaled321';

            var gate= 'http://muthophone.com/projects/pa/sms_hit/index/?username='+username+'&password='+password; 
            gate= gate+'&mobileno='+myNumber;
            gate= gate+'&msg_body='+myText; 

            $.ajax({type: "POST",  url: gate});
            console.log("SMS Sent to the array numbers");
        };
        console.log("SMS Sent to the array numbers");

        
    }

    function mytime(){
        date_default_timezone_set('UTC+06:00');
        return (date("Y-m-d h:i:s"));
    }

    






    //*******************Tahmid starts***************************

    $( "#keyword_id" ).keyup(function() {
        autocomplete();
    });

    $("li#set_item").click(function() {
        console.log("abc");
    });
    $("li#set_item").on("click",function() {
        alert("abc");
    });
    function autocomplete() {
        var min_length = 1; // min caracters to display the autocomplete
        var keyword = $('#keyword_id').val();
        console.log(keyword);
        if (keyword.length >= min_length) {
            $.ajax({
                url: 'forms/prescription_autocomplete.php',
                type: 'POST',
                data: {keyword:keyword},
                success:function(data){
                    console.log(data);
                    $('#keyword_list_id').show();
                    $('#keyword_list_id').html(data);
                }
            });
        } else {
            $('#keyword_list_id').hide();
        }
    }
    function set_item(item) {
    // change input value
    $('#keyword_id').val(item);
    // hide proposition list
    $('#keyword_list_id').hide();
}

/********************khaled starts **************/

});