<style type="text/css">
table.table_data_view{ font-size:14px;}
table.table_data_view tr td{ background:#ffffff; border-bottom:1px dashed #666666; border-right:1px dashed #666666; padding:2px;}
table.table_data_view tr td:first-child{border-left:1px dashed #666666;}
table.table_data_view tr th{ background:#ffffff; border-top:1px  dashed #666666; border-bottom:1px dashed #666666; border-right:1px dashed #666666; padding:2px;}
table.table_data_view tr th:first-child{border-left:1px dashed #666666;}
table.table_data_view tr:last-child th{border-top:none;}
</style>

<?php 
session_start();
include("header.php");
include ("menu.php");
//include ("slider.php");
include('forms/dbcon_s.php');
$user_id = $_SESSION['u_id'];

$get_patient_details_1=mysql_query("SELECT * FROM user_details WHERE user_details.login_id = '$user_id'");
$get_patient_details_2=mysql_query("SELECT id FROM doc_appointment WHERE doc_appointment.id_patient = '$user_id'");

$row1=mysql_fetch_array($get_patient_details_1);
$row2=mysql_fetch_array($get_patient_details_2);


?>

<div class="hs_page_title">
  <div class="container">
    <h3>Patient Profile: <?php echo $row1['first_name']; echo " "; echo $row1['last_name'];?></h3>
    <ul>
      <li><a href="index.php">Home</a></li>
    </ul>
  </div>
</div>
<div class="container">
  <div class="row">

   <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="hs_single_profile_detail">
      <div id="getting-started"></div>
   </div>
 </div>


 <!-- <div class="col-lg-12 col-md-12 col-sm-12">
  <div class="hs_single_profile"> <img class="col-lg-5 col-md-5 col-sm-5" src="profile_pic/<?php echo  $row2['path'];?>" alt="" />
    <div class="hs_single_profile_detail">
      <h3><?php echo $row1['first_name']; echo " "; echo $row1['last_name'];?></h3>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6"> <i class="fa fa-user-md"></i>Hospital Affiliation: <?php echo $row4['hospitals'];?> </div>
        <div class="col-lg-5 col-md-6 col-sm-6"> <i class="fa fa-medkit"></i>Specialist On: <a href="#"><?php echo $row4['specialities']; ?></a> </div>
        <div class="col-lg-4 col-md-6 col-sm-6"> <i class="fa fa-medkit"></i><a href="#" data-toggle="modal" data-target="#doctor_app_modal">Book Appointment Now</a> </div>
      </div>
      <hr>
      <div class="row">
       <div class="col-lg-4 col-md-6 col-sm-6"> <i class="fa fa-medkit"></i>Email ID: <a href="#"><?php echo $row1['email'];?></a> </div>
       <div class="col-lg-4 col-md-6 col-sm-6"> <i class="fa fa-phone"></i>Phone No: <a href="#"><?php echo $row1['mobile_number'];?></a> </div>
     </div>
   </div>
   <p>
    <b>Professional Description:</b>
    <?php echo $row4['professional_det'];?>
  </p>

  <p>
    <b>Short Biography:</b>
    <?php echo $row4['shortbio'];?> 
  </p>

  <p>
    <b>Address:</b>
    <?php echo $row1['address'];?>
  </p>

  <p>
    <b>Practice Hours:</b>
    <?php echo $row3['workplan'];?>
  </p>

</div>
</div> -->


</div>

  <!--Post By start>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <h4 class="hs_heading">Post By Neupane Commodo</h4>
      <div class="post_by">
        <div id="post_by_slider" class="owl-carousel owl-theme">
          <div class="post_by_slider_item">
            <div class="row">
              <div class="col-lg-12"> <img src="images/post/related_post1.jpg" alt="" />
                <div class="post_by_detail">
                  <p>Donec suscipit, nulla nec dapib arcu arcu sodales urna, nec auctor odio </p>
                  <a href="#" class="btn btn-default">Read More</a> </div>
              </div>
            </div>
          </div>
          <div class="post_by_slider_item">
            <div class="row">
              <div class="col-lg-12"> <img src="images/post/related_post2.jpg" alt="" />
                <div class="post_by_detail">
                  <p>Donec suscipit, nulla nec dapib arcu arcu sodales urna, nec auctor odio </p>
                  <a href="#" class="btn btn-default">Read More</a> </div>
              </div>
            </div>
          </div>
          <div class="post_by_slider_item">
            <div class="row">
              <div class="col-lg-12"> <img src="images/post/related_post3.jpg" alt="" />
                <div class="post_by_detail">
                  <p>Donec suscipit, nulla nec dapib arcu arcu sodales urna, nec auctor odio </p>
                  <a href="#" class="btn btn-default">Read More</a> </div>
              </div>
            </div>
          </div>
          <div class="post_by_slider_item">
            <div class="row">
              <div class="col-lg-12"> <img src="images/post/related_post1.jpg" alt="" />
                <div class="post_by_detail">
                  <p>Donec suscipit, nulla nec dapib arcu arcu sodales urna, nec auctor odio </p>
                  <a href="#" class="btn btn-default">Read More</a> </div>
              </div>
            </div>
          </div>
          <div class="post_by_slider_item">
            <div class="row">
              <div class="col-lg-12"> <img src="images/post/related_post1.jpg" alt="" />
                <div class="post_by_detail">
                  <p>Donec suscipit, nulla nec dapib arcu arcu sodales urna, nec auctor odio </p>
                  <a href="#" class="btn btn-default">Read More</a> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="customNavigation text-right"> <a class="btn_prev prev"><i class="fa fa-chevron-left"></i></a> <a class="btn_next next"><i class="fa fa-chevron-right"></i></a> </div>
      </div>
    </div>
  </div>
  <!--Post By end--> 
  
  <!--Our Doctor Team start-->
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <h4 class="hs_heading">Our Doctor Team</h4>
      <div class="our_doctor_team">
        <div id="our_doctor_team_slider" class="owl-carousel owl-theme">
          <div class="our_doctor_team_slider_item"> <img src="images/team/team_member1.png" alt="" />
            <div class="hs_team_member_detail">
              <h3>Dr Johnathan Treat</h3>
              <p>Quisque vitae interdum ipsum. Nulla eget mpernulla. Proin lacinia urna </p>
              <a href="#" class="btn btn-default">Read More</a> </div>
            </div>
            <div class="our_doctor_team_slider_item"> <img src="images/team/team_member2.png" alt="" />
              <div class="hs_team_member_detail">
                <h3>Dr. Edwin Spindrift</h3>
                <p>Quisque vitae interdum ipsum. Nulla eget mpernulla. Proin lacinia urna </p>
                <a href="#" class="btn btn-default">Read More</a> </div>
              </div>
              <div class="our_doctor_team_slider_item"> <img src="images/team/team_member3.png" alt="" />
                <div class="hs_team_member_detail">
                  <h3>Dr Johnathan Treat</h3>
                  <p>Quisque vitae interdum ipsum. Nulla eget mpernulla. Proin lacinia urna </p>
                  <a href="#" class="btn btn-default">Read More</a> </div>
                </div>
                <div class="our_doctor_team_slider_item"> <img src="images/team/team_member1.png" alt="" />
                  <div class="hs_team_member_detail">
                    <h3>Dr. Edwin Spindrift</h3>
                    <p>Quisque vitae interdum ipsum. Nulla eget mpernulla. Proin lacinia urna </p>
                    <a href="#" class="btn btn-default">Read More</a> </div>
                  </div>
                </div>
                <div class="customNavigation text-right"> <a class="btn_prev prev"><i class="fa fa-chevron-left"></i></a> <a class="btn_next next"><i class="fa fa-chevron-right"></i></a> </div>
              </div>
            </div>
          </div>
          <!--Our Doctor Team end-->

          <div class="hs_margin_40"></div>
          <?php
          include("footermenu.php");
          include("doctor_app_modal.php");
          include("modal_login.php");
          include("footer.php");
          ?>