<?php 
session_start();
include("header.php");
include ("menu.php");
//include ("slider.php");
include('forms/dbcon_s.php');
if (isset($_GET['id'])) {
  $user_id = $_GET['id'];
}
else {
  // other php instructions
}

$get_doctor_details=mysql_query("SELECT * FROM user_details as u,pictures as p,doc_workplan as dw,doc_services as ds,doc_qualifications as dq WHERE user_details.login_id = '$user_id' AND pictures.u_id = '$user_id' AND doc_workplan.user_id = '$user_id' AND doc_services.user_id = '$user_id' AND doc_qualifications.user_id = '$user_id'");

?>

<div class="hs_page_title">
  <div class="container">
    <h3>Doctor Name</h3>
    <ul>
      <li><a href="index-2.html">Home</a></li>
      <li><a href="about.html">Doctor Name</a></li>
    </ul>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="hs_single_profile"> <img src="images/team/profile_single.jpg" alt="" />
        <div class="hs_single_profile_detail">
          <h3>Dr. Helena</h3>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6"> <i class="fa fa-user-md"></i>Experience: <a href="#">6 Year</a> </div>
            <div class="col-lg-5 col-md-6 col-sm-6"> <i class="fa fa-medkit"></i>Specialist On: <a href="#">Addiction psychiatrist, Adolescent</a> </div>
            <div class="col-lg-4 col-md-6 col-sm-6"> <i class="fa fa-medkit"></i><a href="#" data-toggle="modal" data-target="#doctor_app_modal">Book Appointment Now</a> </div>
          </div>
          <hr>
          <div class="row">
          	<div class="col-lg-4 col-md-6 col-sm-6"> <i class="fa fa-medkit"></i>Email ID: <a href="#">health@helathcare.com</a> </div>
            <div class="col-lg-4 col-md-6 col-sm-6"> <i class="fa fa-phone"></i>Phone No: <a href="#">+00 00 0 000 000 00</a> </div>
            <div class="col-lg-4 col-md-6 col-sm-6"> Get connect with him:
              <div class="hs_profile_social">
                <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-skype"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <p>Fusce pharetra ultrices elementum. Ut facilisis sit amet justo ut blandit. Phasellus in dolor vel metus hendrerit feugiat. Vivamus imperdiet,  velbus feugiat, est leo sagittis tortor, et commodo massa justo nec mi. Donec condimentum varius ipsum varius facilisis. Fusce in purus non massodales dicm. Curabitur in tellus non sem euismod pulvinar. Integer vitae nisi sit amet nulla placerat semper. Nam porttitor nulla id pretium ullamcorper. Itpat, magna id tempus posuere, risus ligula cursus erat, sit amet sagittis mi lacus non massa. Vestibulum libero ligula, sollicitudin sed ornare in, laoreet sed lacusCras tristique, metus eleifend malesuada eleifend, justo mi dapibus neque, sit amet fringilla elit risus quis nunc. Nullam molestie dolor pus, id ullorper massa adipiscing sit amet. Vivamus ut purus eu leo imperdiet suscipit. Integer lacus metus, ultricies eu quam vitae, vestibulum mattis ipsum. Pellentesque erat risus, congue non nisl auctor, accumsan pellentesque enim. </p>
        <p>In hac habitasse platea dictumst. Suspendisse potenti. Morbi dignissim rhoncus faucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla nisi a bibendum euismod. Quisque eget elit sed erat bibendum tempus. </p>
      </div>
    </div>
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