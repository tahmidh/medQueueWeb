    $( document ).ready(function() {
      //callses();

      $("#printP").click(function() {
        print_prescription();
    });  

    //****************Omar starts******************************
    function print_prescription(sta)
    {
        var app_fname = $("#f2_name").val();
        var app_email = $("#f2_email").val();
        var app_phone = $("#f2_phone").val();
        var app_reason = $("#f2_reason").val();
        var book_date = xdate;
        var start_time = service_slot;
        var end_time = service_slot_end;
        var id_doctor = doc_id;
        var service_name = service_selected;
        $.post("presformat.php",{},function(result)
        {

            var popupWin = window.open('', '_blank', 'width=300,height=600');
            popupWin.document.open();
            popupWin.document.write('<html><head><script type="text/javascript" src="print.js"></script></head><body onload="window_print()">' + result + '</html>');
            popupWin.document.close();
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