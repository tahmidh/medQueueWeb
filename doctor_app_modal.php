<?php 
$user_id = 2;
$get_services_category=mysql_query("SELECT service_categories FROM doc_services WHERE user_id='$user_id' GROUP BY service_categories");
?>
<div class="modal fade" id="doctor_app_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Book Appointment</h4>
      </div>
      <div class="modal-body">
        <div class="row-fluid">
            <div class="row-form">
            </div>            
              <div class="hs_appointment_form" style="">
          
                <div id="frame-1" style="display:block;">
                  <div class="row frame-container">
                    <div class="col-lg-6 col-md-7 col-sm-6">
                      <div class="form-group">
                        <select class="form-control" id="select_dep" name="select_dep">
                          <option>Select Category</option>
                          <?php 
                            while($row=mysql_fetch_array($get_services_category)){
                              echo '<optgroup label="' . $row['service_categories']. '">';
                                $get_sub_category = mysql_query("SELECT name FROM doc_services WHERE service_categories = '".$row['service_categories']."'AND user_id='$user_id' GROUP BY name");
                                while($row=mysql_fetch_array($get_sub_category)){
                                  echo '<option value="' . $row['name'] . '">'. $row['name'] . '</option>';
                                }
                              echo '</optgroup>';
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                          <input type="hidden" id="modal_selectProvider" class="form-control" value="<?php echo htmlspecialchars($user_id); ?>"/>
                      </div>
                      
                    </div>
                  </div><!-- end of frame container -->
                  <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-3">
                      <button class="btn btn-default" id="btn_nextOneModal">Next</button>
                    </div>
                    
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
                          <?php if ($_SESSION['login']) { ?>
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
                          <?php if ($_SESSION['login']) { ?>
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
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>