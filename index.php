<?php 
session_start();
include("header.php");
include ("menu.php");
include ("slider.php");
include('forms/dbcon_s.php');
$get_services_category=mysql_query("SELECT service_categories FROM doc_services GROUP BY service_categories");
?>
<div class="container"> 
  <!--service start-->
 
  <!--service end-->
  
  <div class="row"> 
    <!--what we do start-->
    <div class="col-lg-6 col-md-7 col-sm-12">
      <h4 class="hs_heading">What we do</h4>
      <div class="hs_tab">
        <ul id="myTab" class="nav nav-tabs">
          <li class="active"><a href="#services1" data-toggle="tab">services # 1</a></li>
          <li><a href="#services2" data-toggle="tab">services # 2</a></li>
          <li><a href="#services3" data-toggle="tab">services # 3</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade in active" id="services1">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="col-lg-6 col-md-6 col-sm-6"> <img width="228" height="252" src="images/service/1.jpg" alt="" /> </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <h4 class="hs_theme_color">Apointment Automation</h4>
                  <div class="hs_margin_30"></div>
                  <p>Get an appointment from us from anywhere, just login and book a time of your choice.</p>
                  <p>You can access our website from any platform, be it PC, Mobile or Tablet</p>
                  <div class="hs_margin_30"></div>
                  <a href="#" class="btn btn-default">Read More</a> </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="services2">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <h4 class="hs_theme_color">Queue Management .</h4>
                  <div class="hs_margin_30"></div>
                  <p>Never miss your queue</p>
                  <p>We will send you a SMS before your time to see the doctor. If you miss it, you can re-schedule from home. </p>
                  <div class="hs_margin_30"></div>
                  <a href="#" class="btn btn-default">Read More</a> </div>
                <div class="col-lg-6 col-md-6 col-sm-6"> <img width="228" height="252" src="images/service/1.jpg" alt="" /> </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="services3">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12"> <img width="512" height="252" src="images/service/2.jpg" alt="" />
                <h4 class="hs_theme_color">Billing .</h4>
                <p>All Billing systems are automated</p>
                <p>Get your billing informations from home. </p>
                <a href="#" class="btn btn-default">Read More</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--what we do end--> 
    <!--Book an Appointment start-->
    <div class="col-lg-6 col-md-5 col-sm-12">
      <h4 class="hs_heading">Book an Appointment</h4>
      <div class="hs_appointment_form_div"> <img src="images/bg/appointment_form.jpg" width="512" height="365" alt=""/>
        <div class="hs_appointment_form" style="padding-left: 40px;padding-top: 40px;">
          
            <div id="frame-1" style="display:block;">
              <div class="row frame-container">
                <div class="col-lg-6 col-md-7 col-sm-6">
                  <div class="form-group">
                    <select class="form-control" id="select_dep" name="select_dep">
                      <option>Select Category</option>
                      <?php 
                      
                        while($row=mysql_fetch_array($get_services_category)){
                          echo '<optgroup label="' . $row['service_categories']. '">';
                            $get_sub_category = mysql_query("SELECT name, service_categories FROM doc_services WHERE service_categories = '".$row['service_categories']."' GROUP BY name");
                            while($row=mysql_fetch_array($get_sub_category)){
                              $values_arr = array('s_name' => $row['name'], 's_category' => $row['service_categories']);
                              echo "<option value='".json_encode($values_arr)."'>". $row['name'] . "</option>";
                            } 
                          echo '</optgroup>';
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                      <select id="select-provider" class="form-control"></select>
                  </div>
                  
                </div>
              </div><!-- end of frame container -->
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-3">
                  <button class="btn btn-default" id="btn_nextOne">Next</button>
                </div>
                <!-- <div class="col-lg-8 col-md-8 col-sm-8">
                  <p>Aenean facilisis sodales est nec gravida. Morbi vitae purus non est facilisis.</p>
                </div> -->
              </div> <!-- end of next button container -->
            </div><!-- end of frame 1 -->

            <div id="frame-2" style="display:none;"> <!-- start of frame 2 -->
              <div class="row frame-container"> <!-- start of frame container -->
                <div class="col-lg-6 col-md-7 col-sm-6">
                  <div class="form-group">
                    <input type="text" name="myInput" readonly="readonly" placeholder="Select Appointment Date" id="app_date" /> 
                  </div>
                  <div id="appoint_posd" class="form-group">
                    <div id="appoint_msg">
                      <select class="form-control" id="select_appoint_slot" name="select_appoint_slot">
                      </select>
                    </div>
                  </div>
                </div>
              </div> <!-- end of frame container -->
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-3">
                  <button class="btn btn-default" id="btn_nextTwo">Next</button>
                </div>
              </div> <!-- end of next button container -->
            </div><!-- end of frame 2 -->

            <div id="frame-3" style="display:none;"> <!-- start of frame 3 -->
              <div class="row frame-container"> <!-- start of frame container -->
                <div class="col-lg-6 col-md-7 col-sm-6">
                  <div class="form-group">
                     <label for="first-name" class="control-label">Full Name *</label>
                      <?php if ($_SESSION != null) { ?>
                        <input type="hidden" name="name" id="f2_user_id" value="<?php echo htmlspecialchars($_SESSION['u_id']); ?>" disabled/>
                        <input type="text" id="f2_name" class="required form-control" maxlength="100" value="<?php echo htmlspecialchars($_SESSION['u_name']); ?>" disabled>
                      <?php }else{
                        ?>
                        <input type="hidden" name="name" id="f2_user_id" value="0" disabled/>
                        <input type="text" id="f2_name" class="required form-control" maxlength="100">
                        <?php
                      } ?>
                  </div>
                  <div class="form-group">
                      <label for="email" class="control-label">Email *</label>
                      <?php if ($_SESSION != null) { ?>
                        <input type="text" id="f2_email" class="required form-control" maxlength="250" value="<?php echo htmlspecialchars($_SESSION['u_email']); ?>" disabled>
                      <?php }else{
                        ?>
                        <input type="text" id="f2_email" class="required form-control" maxlength="250">
                        <?php
                      } ?>
                  </div>
                  <div class="form-group">
                      <label for="phone-number" class="control-label">Phone Number *</label>
                      <input type="text" id="f2_phone" class="required form-control" maxlength="60">
                  </div>
                  <div class="form-group">
                      <label for="phone-number" class="control-label">Reason *</label>
                      <input type="text" id="f2_reason" class="required form-control" maxlength="60">
                  </div>
                </div>
              </div> <!-- end of frame container -->
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-3">
                  <button class="btn btn-default" id="btn_nextThree">Next</button>
                </div>
              </div> <!-- end of next button container -->
            </div><!-- end of frame 3 -->

            <div id="frame-4" style="display:none;"> <!-- start of frame 4 -->
              <div class="row frame-container"> <!-- start of frame container -->
                <div class="col-lg-6 col-md-7 col-sm-6">
                  <div class="form-group">
                      
                  </div>
                  <div class="form-group">
                      
                  </div>
                  <div class="form-group">
                      
                  </div>
                  <div class="form-group">
                      
                  </div>
                </div>
              </div> <!-- end of frame container -->
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-3">
                  <button class="btn btn-default" id="btn_confirm">Confirm</button>
                </div>
              </div> <!-- end of next button container -->
            </div><!-- end of frame 4 -->
          
        </div>
      </div>
    </div>
</div>


<!--Our Doctor Team start-->
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12">
    <h4 class="hs_heading">Our Doctor Team</h4>
    <div class="our_doctor_team">
      <div id="our_doctor_team_slider" class="owl-carousel owl-theme">
        <div class="our_doctor_team_slider_item"> <img src="images/team/team_member1.png" alt="" />
          <div class="hs_team_member_detail">
            <h3>Dr Johnathan Treat</h3>
            <p>ENT Specialist</p>
            <a href="#" class="btn btn-default">Read More</a> </div>
        </div>
        <div class="our_doctor_team_slider_item"> <img src="images/team/team_member2.png" alt="" />
          <div class="hs_team_member_detail">
            <h3>Dr. Edwin Spindrift</h3>
            <p>Cardio Vascular Sergion </p>
            <a href="#" class="btn btn-default">Read More</a> </div>
        </div>
        <div class="our_doctor_team_slider_item"> <img src="images/team/team_member3.png" alt="" />
          <div class="hs_team_member_detail">
            <h3>Dr Johnathan Treat</h3>
            <p>Opthalmologist</p>
            <a href="#" class="btn btn-default">Read More</a> </div>
        </div>
        <div class="our_doctor_team_slider_item"> <img src="images/team/team_member1.png" alt="" />
          <div class="hs_team_member_detail">
            <h3>Dr. Edwin Spindrift</h3>
            <p>Maxilo Facial Surgion</p>
            <a href="#" class="btn btn-default">Read More</a> </div>
        </div>
      </div>
      <div class="customNavigation text-right"> <a class="btn_prev prev"><i class="fa fa-chevron-left"></i></a> <a class="btn_next next"><i class="fa fa-chevron-right"></i></a> </div>
    </div>
  </div>
</div>
<!--Our Doctor Team end-->

<!--Up Coming Events start>
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12">
    <h4 class="hs_heading">Up Coming Events</h4>
    <div class="up_coming_events">
      <div id="up_coming_events_slider" class="owl-carousel owl-theme">
        <div class="up_coming_events_slider_item">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="hs_event_date">
                <h3>14</h3>
                <p>Feb</p>
              </div>
            </div>
          </div>
          <div class="hs_event_div">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="col-lg-6 col-md-5 col-sm-6"> <img src="images/event/up_comming_event1.jpg" alt="" /> </div>
                <div class="col-lg-6 col-md-7 col-sm-12">
                  <h4>Pelln sque vitae dolor non.</h4>
                  <p>Cras sodaleut ligula, velit enim quis, neatis feugiat ante. Ut arcu nulla.Cras velit ligula, sodaleut enim quis, venenatis feugiat ante. lus facilisis nisl. </p>
                  <a href="#" class="btn btn-default pull-right">Read More</a> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="up_coming_events_slider_item">
          <div class="row">
            <div class="col-lg-12">
              <div class="hs_event_date">
                <h3>23</h3>
                <p>Feb</p>
              </div>
            </div>
          </div>
          <div class="hs_event_div">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="col-lg-6 col-md-5 col-sm-6"> <img src="images/event/up_comming_event2.jpg" alt="" /> </div>
                <div class="col-lg-6 col-md-7 col-sm-12">
                  <h4>Pelln sque vitae dolor non.</h4>
                  <p>Cras sodaleut ligula, velit enim quis, neatis feugiat ante. Ut arcu nulla.Cras velit ligula, sodaleut enim quis, venenatis feugiat ante. lus facilisis nisl. </p>
                  <a href="#" class="btn btn-default pull-right">Read More</a> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="up_coming_events_slider_item">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="hs_event_date">
                <h3>24</h3>
                <p>Feb</p>
              </div>
            </div>
          </div>
          <div class="hs_event_div">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="col-lg-6 col-md-5 col-sm-6"> <img src="images/event/up_comming_event3.jpg" alt="" /> </div>
                <div class="col-lg-6 col-md-7 col-sm-12">
                  <h4>Pelln sque vitae dolor non.</h4>
                  <p>Cras sodaleut ligula, velit enim quis, neatis feugiat ante. Ut arcu nulla.Cras velit ligula, sodaleut enim quis, venenatis feugiat ante. lus facilisis nisl. </p>
                  <a href="#" class="btn btn-default pull-right">Read More</a> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="up_coming_events_slider_item">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="hs_event_date">
                <h3>14</h3>
                <p>Feb</p>
              </div>
            </div>
          </div>
          <div class="hs_event_div">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="col-lg-6 col-md-5 col-sm-6"> <img src="images/event/up_comming_event1.jpg" alt="" /> </div>
                <div class="col-lg-6 col-md-7 col-sm-12">
                  <h4>Pelln sque vitae dolor non.</h4>
                  <p>Cras sodaleut ligula, velit enim quis, neatis feugiat ante. Ut arcu nulla.Cras velit ligula, sodaleut enim quis, venenatis feugiat ante. lus facilisis nisl. </p>
                  <a href="#" class="btn btn-default pull-right">Read More</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="customNavigation text-right"> <a class="btn_prev prev"><i class="fa fa-chevron-left"></i></a> <a class="btn_next next"><i class="fa fa-chevron-right"></i></a> </div>
    </div>
  </div>
</div>

<div class="clearfix"></div>
Happy Patients start-->
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12">
    <h4 class="hs_heading">Happy Patients</h4>
    <div class="hs_testimonial">
      <ul class="bxslider">
        <li>
          <div class="hs_testimonial_content">
            <div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
              <p><i class="fa fa-quote-left"></i> This is a great system. My mother was sick and her appointment was done with a few clicks. <i class="fa fa-quote-right"></i></p>
              <h4 class="hs_theme_color">Health Care </h4>
            </div>
          </div>
        </li>
        <li>
          <div class="hs_testimonial_content">
            <div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
              <p><i class="fa fa-quote-left"></i> My billing informations were crystal clear and I could do it from home. <i class="fa fa-quote-right"></i></p>
              <h4 class="hs_theme_color">Health Care </h4>
            </div>
          </div>
        </li>
        <li>
          <div class="hs_testimonial_content">
            <div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
              <p><i class="fa fa-quote-left"></i>I needed to re-schedule my appontment and thanks to MediQueue I did it so easily <i class="fa fa-quote-right"></i></p>
              <h4 class="hs_theme_color">Health Care </h4>
            </div>
          </div>
        </li>
        <li>
        <div class="hs_testimonial_content">
            <div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
              <p><i class="fa fa-quote-left"></i> Best part of MedQuque is that they can give an apprximation of the final time <i class="fa fa-quote-right"></i></p>
              <h4 class="hs_theme_color">Health Care </h4>
            </div>
          </div>
        </li>
      </ul>
      <div id="bx-pager"> <a data-slide-index="0" href="#"><img src="images/testimonial/testimonial_pager.png"  alt=""/>
        <div class="hs_testimonial_control_img"></div>
        </a> <a data-slide-index="1" href="#"><img src="images/testimonial/testimonial_pager1.png"  alt=""/>
        <div class="hs_testimonial_control_img"></div>
        </a> <a data-slide-index="2" href="#"><img src="images/testimonial/testimonial_pager2.png"  alt=""/>
        <div class="hs_testimonial_control_img"></div>
        </a> <a data-slide-index="3" href="#"><img src="images/testimonial/testimonial_pager3.png"  alt=""/>
        <div class="hs_testimonial_control_img"></div>
        </a> </div>
    </div>
  </div>
</div>
<!--Happy Patients end-->
<span id="login_info"></span>
 
<?php
  include("footermenu.php");
  include("modal_login.php");
  include("footer.php");

  ?>