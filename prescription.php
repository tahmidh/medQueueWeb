<?php 
session_start();
include("header.php");
include ("menu.php");?>

<div class="hs_page_title">
  <div class="container">
    <h3>Doctor Registration</h3>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="#">Patient Prescription</a></li>
    </ul>
  </div>
</div>

<div class="container">
    <div class="col-lg-12">
        <h2 class="hs_heading">Patient Personal Information</h2>
        <table class="col-lg-12">
            <input type="hidden" name="name" id="form_u_id" value="<?php echo htmlspecialchars($_SESSION['u_id']); ?>" disabled/>
            <tr>
                <td>First Name:</td>
                <td><input class="formtd" type="text" name="name" placeholder="First Name" id="form_fname" required/></td>
                <td>Last Name:</td>
                <td><input type="text" name="name" placeholder="Last Name" id="form_lname" required/></td>
                <td>User Name:</td>
                <td><input type="text" name="name" placeholder="Middle Name" id="form_uname" value="<?php echo htmlspecialchars($_SESSION['u_name']); ?>" disabled/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="name" placeholder="Email" id="form_email" value="<?php echo htmlspecialchars($_SESSION['u_email']); ?>" disabled/></td>
                <td>Mobile:</td>
                <td><input type="text" name="name" placeholder="8801*********" id="form_mobile"/></td>
                <td>Office Number:</td>
                <td><input type="text" name="name" placeholder="880*******" id="form_ofnum"/></td>
            </tr>
            <tr>
                <td>Address</td>
                <td colspan="5"><input type="text" name="name" placeholder="Your Address (Prefered Chamber)" id="form_address"/></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><select name="city" id="form_city" >
                        <option value="Dhaka">Dhaka</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Khulna">Khulna</option>
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
                <td>Notes</td>
                <td colspan="5"><input type="text" name="name" placeholder="Notes (Notes)" id="form_notes"/></td>
            </tr>
        </table>
    </div>
</div>

