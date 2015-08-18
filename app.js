$(document).ready(function() {
    var x; //booking day
    var xdate; //booking date
    var doc_id = -1;
    var service_selected = ""; //service name
    var selected_service_category = "";//service category of that service
    var service_slot = ""; //appointment slot selected
    var service_duration = "" //service duration of current service
        // var service_provider_id = 0;

    //callses();
    if (window.location.href.indexOf("newdoctor.php") > -1) {
        get_available_services();
    }
    jsDate = new JsDatePick({
        useMode: 2,
        target: "app_date",
        dateFormat: "%Y-%m-%d"
    });
    jsDate.addOnSelectedDelegate(function() {
        xdate = $("#app_date").val();
        x = myFunction(xdate);
        getDocApp(doc_id, x, xdate);
    });

    $("#s_signup").click(function() {
        var type = $('input:radio[name=s_type]:checked').val();
        var email = $("#s_email").val();
        var name = $("#s_name").val();
        var pass = $("#s_pass").val();
        console.log(name);
        console.log(email);
        console.log(pass);
        console.log(type);
        $.ajax({
                method: "POST",
                url: "forms/createUser.php",
                data: {
                    name: name,
                    email: email,
                    pass: pass,
                    type: type
                }
            })
            .done(function(msg) {
                alert("Data Saved: " + msg);
            });
    });


    $("#s_signin").click(function() {
        var user = $("#s_lemail").val();
        var pass = $("#s_lpass").val();
        console.log(user);
        console.log(pass);
        $.ajax({
                method: "POST",
                url: "forms/login_check.php",
                data: {
                    user: user,
                    pass: pass
                }
            })
            .done(function(msg) {
                if (msg == "doctor") {
                    window.location = "doctor.php";
                } else if (msg == "newDoctor") {
                    window.location = "newdoctor.php";
                } else if (msg == "newPatient") {
                    window.location = "newpatient.php";
                } else if (msg == "patient") {
                    window.location = "patient.php";
                } else {
                    $("#login_msg").append("<p style='color:red'>   Login failed    </p>");
                };
            });
    });


    $("#save_newDoctor").click(function() {
        add_personal_details();
        add_professional_details();
    });

    function add_personal_details() {
        var first_name = $("#form_fname").val();
        var last_name = $("#form_lname").val();
        //var first_name=$("#form_fname").val();
        var email = $("#form_email").val();
        var login_id = $("#form_u_id").val();
        var mobile_number = $("#form_mobile").val();
        var phone_number = $("#form_ofnum").val();
        var address = $("#form_address").val();
        var city = $("#form_city").val();
        var zip_code = $("#form_zip").val();
        var state = $("#form_country").val();
        var notes = $("#form_notes").val();
        $.ajax({
                method: "POST",
                url: "forms/saveUserDetails.php",
                data: {
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    mobile_number: mobile_number,
                    phone_number: phone_number,
                    address: address,
                    city: city,
                    zip_code: zip_code,
                    state: state,
                    notes: notes,
                    login_id: login_id
                }
            })
            .done(function(msg) {
                alert("personal info Saved: " + msg);
            });

    }

    function add_professional_details() {
        var qualifications = $("#form_qualifications").val();
        var hospitals = $("#form_hospitals").val();
        var languages = $("#form_language").val();
        var specialities = $("#form_specialities").val();
        var professional_det = $("#form_prostate").val();
        var shortbio = $("#form_shortbio").val();
        var category = $("#form_catname").val();
        var login_id = $("#form_u_id").val();
        $.ajax({
            method: "POST",
            url: "forms/savedoctorPro.php",
            data: {
                qualifications: qualifications,
                hospitals: hospitals,
                languages: languages,
                specialities: specialities,
                professional_det: professional_det,
                shortbio: shortbio,
                login_id: login_id,
                category: category
            }
        })
        .done(function(msg) {
            alert("professional info Saved: " + msg);
        });

    }

    $("#save_newService").click(function() {
        // alert("service Clicked!!!");
        add_service_details();
        
    });

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

    function add_service_details() {

        var name = $("#form_sername").val();
        var duration = $("#form_duration").val();
        var price = $("#form_price").val();
        var currency = $("#form_currency").val();
        var category = $("#form_sercat").val();
        var description = $("#form_serdes").val();
        var login_id = $("#form_u_id").val();
        $.ajax({
            method: "POST",
            url: "forms/savedoctorSer.php",
            data: {
                name: name,
                duration: duration,
                price: price,
                currency: currency,
                category: category,
                description: description,
                login_id: login_id
            }
        })
        .done(function(msg) {
            //alert("Services Saved: " + msg);
            get_available_services();
        });

    }

    function callses() {
        $.get("get_session.php", function(sessionFromServer) {
            alert(sessionFromServer);
        });
    }

    $("#select_dep").change(function() {
        var text = JSON.parse($("#select_dep").val());
        service_selected = text.s_name;
        selected_service_category = text.s_category;
        $('#select-provider').empty();
        
        $.ajax({
                method: "POST",
                url: "forms/getSer.php",
                data: {
                    name: service_selected, service_categories:selected_service_category
                }
            })
            .done(function(text) {
                console.log("Select option received: " + text);
                var msg = eval("(function(){return " + text + ";})()");
                var optionHtml = "<option>Select Doctor</option>";
                for (var i = 1; i < Object.keys(msg).length; i++) {
                    optionHtml += '<option value="' + msg[i].login_id + '">' + msg[i].first_name + ' ' + msg[i].last_name + '</option>';
                };
                console.log(optionHtml);
                $('#select-provider').append(optionHtml);
            });
    });

    $("#select-provider").change(function() {
        doc_id = $("#select-provider").val();
        console.log(doc_id);
    });

    $("#save_work").click(function() {
        alert("service Clicked!!!");
        add_work();
    });

    function add_work() {

        var day = "";
        var brk = "";
        var stime = "";
        var etime = "";
        var bstime = "";
        var betime = "";
        var week_day = "";
        var week = {};
        var login_id = $("#form_u_id").val();

        for (var i = 0; i < 7; i++) {
            day = "#c_day" + i;
            brk = "#bc_day" + i;
            stime = "#s_day" + i;
            etime = "#e_day" + i;
            bstime = "#bs_day" + i;
            betime = "#be_day" + i;
            var day_time = "";

            if ($(day).is(":checked") == true) {
                var break_time = {
                    "start": $(bstime).val(),
                    "end": $(betime).val()
                };
                day_time = {
                    "start": $(stime).val(),
                    "end": $(etime).val(),
                    "break": break_time
                };
            }
            var d = $(day).val();
            week[d] = day_time;
        };
        var result = JSON.stringify(week);
        $.ajax({
                method: "POST",
                url: "forms/saveWorkPlan.php",
                data: {
                    workplan: result,
                    login_id: login_id
                }
            })
            .done(function(msg) {
                alert("WorkPlan Saved: " + msg);
            });
    }



    $("#btn_nextOneModal").click(function() {
        doc_id = $(modal_selectProvider).val();
        $("#frame-1").css("display", "none");
        $("#frame-2").css("display", "block");
    });
    $("#btn_nextOne").click(function() {
        $("#frame-1").css("display", "none");
        $("#frame-2").css("display", "block");
    });

    $("#btn_nextTwo").click(function() {
        $("#frame-2").css("display", "none");
        $("#frame-3").css("display", "block");
    });
    $("#btn_nextThree").click(function() {
        $("#frame-3").css("display", "none");
        $("#frame-4").css("display", "block");
    });
    $("#btn_confirm").click(function() {
        $("#frame-4").css("display", "none");
        $("#frame-1").css("display", "block");
        add_appointment();
    });

    function add_appointment() {
        var app_fname = $("#f2_name").val();
        var app_email = $("#f2_email").val();
        var app_phone = $("#f2_phone").val();
        var app_reason = $("#f2_reason").val();
        var book_date = xdate;
        var start_time = service_slot;
        var end_time = service_slot_end;
        var id_doctor = doc_id;
        var service_name = service_selected;
        var id_patient = $("#f2_user_id").val();

        $.ajax({
                method: "POST",
                url: "forms/createAppointment.php",
                data: {
                    app_fname: app_fname,
                    app_email: app_email,
                    app_phone: app_phone,
                    app_reason: app_reason,
                    book_date: book_date,
                    start_time: start_time,
                    end_time: end_time,
                    id_doctor: id_doctor,
                    service_name: service_name,
                    id_patient: id_patient
                }
            })
            .done(function(msg) {
                console.log("Data Saved: " + msg);
            });
    }


    function myFunction(app_date) {
        var d = new Date(app_date);
        var weekday = new Array(7);
        weekday[0] = "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";

        var n = weekday[d.getDay()];
        return n;
    }

    function getDocApp(d_id, day, date) {
        $('#select_appoint_slot').empty();
        $.ajax({
                method: "POST",
                url: "forms/getTime.php",
                data: {
                    d_id: d_id,
                    date: xdate
                }
            })
            .done(function(text) {
                var app_data = JSON.parse(text);
                var msg = JSON.parse(app_data[0]);

                //console.log("msg > "+ msg['Sunday']['start']);
                if (msg[day] == "") {
                    $('#select_appoint_slot').hide();
                    $('#appoint_msg').append("<p>Doctor unavailable!</p>");
                } else {
                    $.ajax({
                            method: "POST",
                            url: "forms/getDuration.php",
                            data: {
                                d_id: d_id,
                                service_selected: service_selected
                            }
                        })
                        .done(function(text) {
                            var result = eval("(function(){return " + text + ";})()")
                            console.log(result[1].name + ' ' +
                                result[1].duration + ' ' +
                                result[1].price + ' ' +
                                result[1].currency);
                            service_duration = result[1].duration;
                            var regExp = /(\d{1,2})\:(\d{1,2})\:(\d{1,2})/;
                            var doc_startTime = msg[day]['start'];
                            var doc_endTime = msg[day]['end'];
                            var a_startTime = msg[day]['start'];
                            var a_endTime;
                            var doc_break_start = msg[day]['break']['start'];
                            var doc_break_end = msg[day]['break']['end'];
                            var all_app = [];
                            var optionHtml = "<option>Select Appointment Time</option>";

                            while (parseInt(a_startTime.replace(regExp, "$1$2$3")) < parseInt(doc_endTime.replace(regExp, "$1$2$3"))) {
                                var flag = true;
                                a_endTime = addMinute(a_startTime, result[1].duration);
                                console.log("time 1");
                                if (checkOverLap(a_startTime, a_endTime, doc_break_start, doc_break_end) == true) {
                                    for (var i = 1; i < Object.keys(app_data).length; i++) {
                                        if (checkOverLap(a_startTime, a_endTime, app_data[i].start_time, app_data[i].end_time) == true) {} else {
                                            flag = false;
                                            break;
                                        }
                                    };
                                    if (flag) {
                                        all_app.push(a_startTime);
                                        optionHtml += '<option value="' + a_startTime + '">' + a_startTime + '</option>';
                                    }
                                };

                                a_startTime = addMinute(a_startTime, result[1].duration);
                            }
                            $('#select_appoint_slot').append(optionHtml);
                        });
                }
            });
    }

    $("#select_appoint_slot").change(function() {
        service_slot = $("#select_appoint_slot").val();
        service_slot_end = addMinute(service_slot, service_duration);
        //console.log(service_slot_end);
    });


    function checkOverLap(time1, time2, time3, time4) {
        var regExp = /(\d{1,2})\:(\d{1,2})\:(\d{1,2})/;
        var stime = parseInt(time1.replace(regExp, "$1$2$3"));
        var etime = parseInt(time2.replace(regExp, "$1$2$3"));
        var bkStart = parseInt(time3.replace(regExp, "$1$2$3"));
        var bkEnd = parseInt(time4.replace(regExp, "$1$2$3"));

        if (stime < bkStart || stime > bkEnd) {
            if (etime < bkStart || etime > bkEnd) {
                if (stime < bkStart && etime > bkEnd) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function addMinute(time, minute) {
        var hms = time; // your input string
        var a = hms.split(':'); // split it at the colons
        // minutes are worth 60 seconds. Hours are worth 60 minutes.
        var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]);
        seconds += minute * 60;
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

    function currentDate() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd
        }

        if (mm < 10) {
            mm = '0' + mm
        }

        today = yyyy + '-' + mm + '-' + dd;
        return today;
    }

});