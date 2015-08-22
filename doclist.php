<?php
session_start();
include("header.php");
include ("menu.php");
include('forms/dbcon_s.php');

$strq = "SELECT pictures.path,user_details.login_id, user_details.address,user_details.first_name,user_details.last_name,doc_qualifications.shortbio,doc_qualifications.specialities FROM pictures,doc_qualifications,user_details WHERE login_id in (SELECT uid FROM user_login WHERE u_type='doctor') AND user_details.login_id = doc_qualifications.user_id AND user_details.login_id = pictures.u_id;";

$get_doctor_list=mysql_query($strq);

?>

<div class="hs_page_title">
  <div class="container">
    <h3>about us</h3>
    <ul>
      <li><a href="index-2.html">Home</a></li>
      <li><a href="about.html">about us</a></li>
    </ul>
  </div>
</div>
<div class="container">
  <!--who we are start-->
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <h4 class="hs_heading">Doctor List</h4>

      <?php
      while($row=mysql_fetch_array($get_doctor_list)){
        echo '<div class="row hs_how_we_are">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="col-lg-4 col-md-6 col-sm-12"> <img src="profile_pic/' . $row['path']. '" style="height:309px;" alt="" /></div>
        <div class="col-lg-8 col-md-6 col-sm-12">
        <div class="hs_how_we_are_text">
        <h4>' . $row['first_name']. ' ' . $row['last_name']. ' </h4>
        <p>' . $row['shortbio']. '</p>
        <p>' . $row['address']. '</p>
        <a href="docpro.php?type=personaProfiledoc&id=' . $row['login_id']. '" class="btn btn-default">View Details</a> </div>
        </div>
        </div>
        </div> 
        ';
      }
      ?>  



    </div>
  </div>
  <!--who we are end--> 
  
  <!--Health Care Team start-->
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <h4 class="hs_heading">Featured Doctors</h4>
      <div class="our_doctor_team">
        <div id="health_care_team_slider" class="owl-carousel owl-theme">

          <?php
          $get_doctor_list=mysql_query($strq);
          while($row1=mysql_fetch_array($get_doctor_list)){
            echo '<div class="health_care_team_slider_item"> <img style="width:200px;height:240px;" src="profile_pic/' . $row1['path']. '" alt="" />
            <div class="hs_team_member_detail"> <a href="docpro.php?type=personaProfiledoc&id=' . $row1['login_id']. '">
            <h5>' . $row1['first_name']. ' ' . $row1['last_name']. '</h5>
            </a>
            <p>' . $row1['specialities']. '</p>
            <hr>
            <p>' . $row1['shortbio']. '</p>
            </div>
            </div>
            ';
          }
          ?>

        </div>
      </div>
      <div class="customNavigation text-right"> <a class="btn_prev prev"><i class="fa fa-chevron-left"></i></a> <a class="btn_next next"><i class="fa fa-chevron-right"></i></a> </div>
    </div>
  </div>

  <!--Health Care Team end-->

  <div hidden class="row">
    <div class="col-lg-12 col-md-12 col-sm-12"> 
      <!--Our Hospital Updates start-->
      <div class="col-lg-8 col-md-8 col-sm-8">
        <h4 class="hs_heading">Our Hospital Updates</h4>
        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Sed dignissim pharetra odio pharetra Ecies. </a> </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
              <div class="panel-body">
                <div class="hs_hospital_update"> <a href="#"><img src="images/hospital_update1.png" class="pull-left" alt=""/></a>
                  <p>Aenean facilisis sodales est nec gravida. Morbi vitaes onest facilisis convallis commodo vel ante. Etiam ltricies lputate felis, non feugiat erat interdum ut. In ultricesam ut facilisetur,enim velit sodales lectus, laciniaui ultrices nibh nunc in est. Morbi vus onest facilisis convallis commodo vel ante.In ultricesam ut facilisetur,enim velit sodales lectus, laciniaui ultrices nibh nunc in est. Morbi vus onest facilisis convallis commodo vel ante. </p>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Sed dignissim pharetra odio pharetra Ecies. </a> </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
              <div class="panel-body">
                <div class="hs_hospital_update"> <a href="#"><img src="images/hospital_update1.png" class="pull-left" alt=""/></a>
                  <h5>Convallis commodo vel</h5>
                  <p>Aenean facilisis sodales est nec gravida. Morbi vitaes onest facilisis convallis commodo vel ante. Etiam ltricies lputate felis, non feugiat erat interdum ut. In ultricesam ut facilisetur,enim velit sodales lectus, laciniaui ultrices nibh nunc in est.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Sed dignissim pharetra odio pharetra Ecies. </a> </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
              <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
            </div>
          </div>
        </div>
      </div>
      <!--Our Hospital Updates end--> 

      <!--Testimonials start-->

      <div class="col-lg-4 col-md-4 col-sm-4">
        <h4 class="hs_heading">Testimonials</h4>
        <div class="testimonial">
          <ul class="testimonial_slider">
            <li>
              <div class="testimonial_content">
                <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1"> <img src="images/testimonial/testimonial1.png" alt="" />
                  <h5>Tom James</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. molestie nunc turpis,</p>
                  <img src="images/testimonial/testimonial2.png" alt="" />
                  <h5>Tom James</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. molestie nunc turpis,</p>
                </div>
              </div>
            </li>
            <li>
              <div class="testimonial_content">
                <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1"> <img src="images/testimonial/testimonial1.png" alt="" />
                  <h5>Tom James</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. molestie nunc turpis,</p>
                  <img src="images/testimonial/testimonial2.png" alt="" />
                  <h5>Tom James</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. molestie nunc turpis,</p>
                </div>
              </div>
            </li>
            <li>
              <div class="testimonial_content">
                <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1"> <img src="images/testimonial/testimonial1.png" alt="" />
                  <h5>Tom James</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. molestie nunc turpis,</p>
                  <img src="images/testimonial/testimonial2.png" alt="" />
                  <h5>Tom James</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. molestie nunc turpis,</p>
                </div>
              </div>
            </li>
            <li>
              <div class="testimonial_content">
                <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1"> <img src="images/testimonial/testimonial1.png" alt="" />
                  <h5>Tom James</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. molestie nunc turpis,</p>
                  <img src="images/testimonial/testimonial2.png" alt="" />
                  <h5>Tom James</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. molestie nunc turpis,</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <!--Testimonials end--> 
    </div>
  </div>

  <!--Releted Post start-->
  <div hidden class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <h4 class="hs_heading">Releted Post</h4>
      <div class="releted_post">
        <div id="releted_post_slider" class="owl-carousel owl-theme">
          <div class="releted_post_slider_item">
            <div class="row">
              <div class="col-lg-2">
                <div class="related_post_date">
                  <h3>01</h3>
                  <p>dec</p>
                </div>
              </div>
              <div class="col-lg-10"> <img src="images/post/related_post1.jpg" alt="" />
                <div class="releted_post_detail">
                  <h4>Etiam malesuada viverra</h4>
                  <p><i class="fa fa-pencil-square-o"></i> faucibus dui varius</p>
                  <p>Quisque ac quamsuellentesque vestibulum at in sa. Etiam eget fringilla quam. </p>
                  <a href="docpro.html" class="btn btn-default">View Details</a> </div>
                </div>
              </div>
            </div>
            <div class="releted_post_slider_item">
              <div class="row">
                <div class="col-lg-2">
                  <div class="related_post_date">
                    <h3>02</h3>
                    <p>dec</p>
                  </div>
                </div>
                <div class="col-lg-10"> <img src="images/post/related_post2.jpg" alt="" />
                  <div class="releted_post_detail">
                    <h4>Etiam malesuada viverra</h4>
                    <p><i class="fa fa-pencil-square-o"></i> faucibus dui varius</p>
                    <p>Quisque ac quamsuellentesque vestibulum at in sa. Etiam eget fringilla quam. </p>
                    <a href="docpro.html" class="btn btn-default">View Details</a> </div>
                  </div>
                </div>
              </div>
              <div class="releted_post_slider_item">
                <div class="row">
                  <div class="col-lg-2">
                    <div class="related_post_date">
                      <h3>22</h3>
                      <p>dec</p>
                    </div>
                  </div>
                  <div class="col-lg-10"> <img src="images/post/related_post3.jpg" alt="" />
                    <div class="releted_post_detail">
                      <h4>Etiam malesuada viverra</h4>
                      <p><i class="fa fa-pencil-square-o"></i> faucibus dui varius</p>
                      <p>Quisque ac quamsuellentesque vestibulum at in sa. Etiam eget fringilla quam. </p>
                      <a href="docpro.html" class="btn btn-default">View Details</a> </div>
                    </div>
                  </div>
                </div>
                <div class="releted_post_slider_item">
                  <div class="row">
                    <div class="col-lg-2">
                      <div class="related_post_date">
                        <h3>28</h3>
                        <p>dec</p>
                      </div>
                    </div>
                    <div class="col-lg-10"> <img src="images/post/related_post1.jpg" alt="" />
                      <div class="releted_post_detail">
                        <h4>Etiam malesuada viverra</h4>
                        <p><i class="fa fa-pencil-square-o"></i> faucibus dui varius</p>
                        <p>Quisque ac quamsuellentesque vestibulum at in sa. Etiam eget fringilla quam. </p>
                        <a href="docpro.html" class="btn btn-default">View Details</a> </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="customNavigation text-right"> <a class="btn_prev prev"><i class="fa fa-chevron-left"></i></a> <a class="btn_next next"><i class="fa fa-chevron-right"></i></a> </div>
              </div>
            </div>
          </div>
          <!--Releted Post end-->
          <div class="hs_margin_40"></div>
        </div>

        <?php
        include("footermenu.php");
        include("modal_login.php");
        include("footer.php");
        ?>