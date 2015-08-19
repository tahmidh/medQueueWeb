<!-- Modal Login-->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
      </div>
      <div class="modal-body">
        <div class="row-fluid">
            <div class="row-form">
                <div class="span12">
                    <input type="text" name="login" placeholder="Email" id="s_lemail"/>
                </div>
            </div>
            <div class="row-form">
                <div class="span12">
                    <input type="password" name="password" placeholder="Password" id="s_lpass"/>
                </div>            
            </div>
            <div class="row-form">
                <div class="span12">
                    <input type="checkbox"/> Keep me signed in
                </div>
            </div>
            <div id="login_msg"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="s_signin">Sign in</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Signup-->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
      </div>
      <div class="modal-body">
        <div class="row-fluid">
            <div class="row-form">
                <div class="span12">
                    <input type="text" name="name" placeholder="Username" id="s_name"/>
                </div>
            </div>
            <div class="row-form">
                <div class="span12">
                    <input type="text" name="email" placeholder="Email" id="s_email"/>
                </div>
            </div>
            <div class="row-form">
                <div class="span12">
                    <input type="password" name="password" placeholder="Password" id="s_pass"/>
                </div>            
            </div>
            <div class="row-form">
                <div class="span12">
                  <p>You are, </p>
                    <input type="radio" name="s_type" value="doctor"/> Doctor
                    <br>
                    <input type="radio" name="s_type" value="patient"/> Patient
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="s_signup">Sign up</button>
      </div>
    </div>
  </div>
</div>