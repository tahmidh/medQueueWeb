<?php 
session_start();
include("header.php");
include ("menu.php");?>

<div class="hs_page_title">
  <div class="container">
    <h3>Patient Registration</h3>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="#">Patient Registration</a></li>
  </ul>
</div>
</div>
<div class="container">
    <div class="col-lg-12">
        <h2 class="hs_heading">Personal Information</h2>
        <table class="col-lg-12">
            <input type="hidden" name="name" id="form_u_id" value="<?php echo htmlspecialchars($_SESSION['u_id']); ?>" disabled/>
            <tr>
                <td>First Name:</td>
                <td><input class="formtd" type="text" name="name" placeholder="First Name" id="form_fname" required/></td>
                <td>Last Name:</td>
                <td><input type="text" name="name" placeholder="Last Name" id="form_lname" required/></td>
                <td>User Name:</td>
                <td><input type="text" name="name" id="form_uname" value="<?php echo htmlspecialchars($_SESSION['u_name']); ?>" disabled/></td>

            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="name" placeholder="Email" id="form_email" value="<?php echo htmlspecialchars($_SESSION['u_email']); ?>" disabled/></td>
                <td>Mobile Number:</td>
                <td><input type="text" name="name" placeholder="8801*********" id="form_mobile"/></td>
                <td>Second Number (if any):</td>
                <td><input type="text" name="name" placeholder="880*******" id="form_ofnum"/></td>
            </tr>
            <tr>
                <td>Address</td>
                <td colspan="5"><input type="text" name="name" placeholder="Your Address" id="form_address"/></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><select name="city" id="form_city" >
                    <option value="Dhaka">Dhaka</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="Barisal">Barisal</option>
                </select>
            </td>
            <td>Zip Code:</td>
            <td><input type="number" name="name" placeholder="4 digit number" id="form_zip"/></td>
            <td>Country:</td>
            <td><select name="login_terminal" id="form_country" >
                <option value="Bangladesh">Bangladesh</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Notes (if any):</td>
        <td colspan="5"><input type="text" name="name" placeholder="Notes (Notes)" id="form_notes"/></td>
    </tr>
</table>
</div>
<!-- Button to save new person info -->
<div class="container">
    <div class="col-lg-12" align="center" style="padding-top:30px;">
        <div class="btn btn-default" id="save_newperinfo" align="center">Save Information</div>
    </div>
</div>
<div class="col-lg-12">
    <h2 class="hs_heading">Basic Health Information</h2>
    <table class="col-lg-12">
        <input type="hidden" name="name" id="form_u_id" value="<?php echo htmlspecialchars($_SESSION['u_id']); ?>" disabled/>

        <tr>
            <td>Date of Birth:</td>
            <td><input type="date" id="form_dob"/></td>
            <td>Gender: </td>
            <td><select name="city" id="form_gender" >
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <br>
        </tr>
        <tr>
            <td>Blood Group:</td>
            <td><select name="city" id="form_bloodgroup" >
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Weight (in kilograms):</td>
        <td><input class="formtd" type="number" name="name" placeholder="00" id="form_weight" /></td>
        <td>Height (in inches):</td>
        <td><input class="formtd" type="number" name="name" placeholder="00" id="form_height" /></td>
    </tr>
    <tr>
        <td><br>Note: Estimates are fine for weight and height if exact values are not known</td>
    </tr>
</table>
</div>
</div>
<!-- Button to save basic health info -->
<div class="container">
    <div class="col-lg-12" align="center" style="padding-top:30px;">
        <div class="btn btn-default" id="save_basic" align="center">Save Information</div>
    </div>
</div>
<div class="container">
    <div class="col-lg-12">
        <h2 class="hs_heading">Additional Health Information</h2>
        <h5>History of disease and illness</h5>
        <h5>Select the appropriate box where you or a family member have any of the following:</h5>
        <br>
        <table class="col-lg-12">
            <tr>
            </tr>
            <tr>
                <td>Illness</td>
                <td>You</td>
                <td>Family Member</td>
            </tr>
            <tr>
                <td>Diabetes</td>
                <td><input type="checkbox" id="form_diabetes_own" ></td>
                <td><input type="checkbox" id="form_diabetes_fam" ></td>
            </tr>
            <tr>
                <td>Heart Disease</td>
                <td><input type="checkbox" id="form_heart_own" ></td>
                <td><input type="checkbox" id="form_heart_fam" ></td>
            </tr>
            <tr>
                <td>High Choltestrol</td>
                <td><input type="checkbox" id="form_cholestrol_own" ></td>
                <td><input type="checkbox" id="form_cholestrol_fam" ></td>
            </tr>
            <tr>
                <td>High Blood Pressure</td>
                <td><input type="checkbox" id="form_bp_own" ></td>
                <td><input type="checkbox" id="form_bp_fam" ></td>
            </tr>
            <tr>
                <td>Asthma</td>
                <td><input type="checkbox" id="form_asthma_own" ></td>
                <td><input type="checkbox" id="form_asthma_fam" ></td>
            </tr>
            <tr>
                <td>Heart Attack</td>
                <td><input type="checkbox" id="form_heartack_own" ></td>
                <td><input type="checkbox" id="form_heartack_fam" ></td>
            </tr>
            <tr>
                <td>Stroke</td>
                <td><input type="checkbox" id="form_stroke_own" ></td>
                <td><input type="checkbox" id="form_stroke_fam" ></td>
            </tr>
        </table>
    </div>
</div>

<!-- Button to save additional health info -->
<div class="container">
    <div class="col-lg-12" align="center" style="padding-top:30px;">
        <div class="btn btn-default" id="save_history" align="center">Save Information</div>
    </div>
</div>

<div class="container">
    <div class="col-lg-12">
        <!-- an empty div -->
    </div>
</div>
<div class="container">
    <div class="col-lg-12">
        <!-- an empty div -->
    </div>
    <input type="hidden" name="myInput" readonly="readonly" placeholder="Select Appointment Date" id="app_date" /> 
</div>



<?php include("footermenu.php");include("footer.php");?>