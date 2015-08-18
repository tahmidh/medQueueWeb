<?php 
session_start();
include("header.php");
include ("menu.php");?>

<div class="hs_page_title">
  <div class="container">
    <h3>Doctor Registration</h3>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="#">Doctor Registration</a></li>
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
<div class="container">
    <div class="col-lg-12">
        <h2 class="hs_heading">Expertise / Category Information</h2>
        <table class="col-lg-12">
            <tr>
                <td>Category Name:</td>
                <td><select name="city" id="form_catname" >
                        <option value="Other">Other</option>
                        <option value="Audiologist">Audiologist</option>
                        <option value="Cardiologist ">Cardiologist </option>
                        <option value="Dentist">Dentist</option>
                        <option value=" Ear, Nose, Throat Doctor (ENT)">Ear, Nose & Throat Doctor (ENT)</option>
                        <option value="Eye Doctor">Eye Doctor</option>
                        <option value=" Gastroenterologist">Gastroenterologist </option>
                        <option value="Neurosurgeon">Neurosurgeon</option>
                        <option value=" Orthopedic ">Orthopedic</option>
                        <option value=" Primary Care Doctor"> Primary Care Doctor</option>
                        <option value=" Psychiatrist">Psychiatrist</option> 
                        <option value=" Radiologist">Radiologist</option>
                        <option value=" Surgeon"> Surgeon</option>
                    </select>
                </td>
                <td>Description:</td>
                <td><input type="text" name="name" placeholder="Last Name" id="form_catdes" required/></td>
            </tr>
            
        </table>
    </div>
</div>
<div class="container">
    <div class="col-lg-12">
        <h2 class="hs_heading">Services Available</h2>
        <table class="col-lg-12">
            <tr>
                <td>Service Name:</td>
                <td><input class="formtd" type="text" name="name" placeholder="Service Name" id="form_sername" required/></td>
                <td>Service Duration:</td>
                <td><input class="formtd" type="text" name="name" placeholder="Service Name" id="form_duration" required/></td>
                <td>Service Price:</td>
                <td><input class="formtd" type="text" name="name" placeholder="Service Name" id="form_" required/></td>
            </tr>
            <tr>
                <td>Service Category:</td>
                <td><select name="city" id="form_sertype" >
                        <option value="Other">Other</option>
                        <option value="Audiologist">Audiologist</option>
                        <option value="Cardiologist ">Cardiologist </option>
                        <option value="Dentist">Dentist</option>
                        <option value=" Ear, Nose, Throat Doctor (ENT)">Ear, Nose, Throat Doctor (ENT)</option>
                        <option value="Eye Doctor">Eye Doctor</option>
                        <option value=" Gastroenterologist">Gastroenterologist </option>
                        <option value="Neurosurgeon">Neurosurgeon</option>
                        <option value=" Orthopedic ">Orthopedic</option>
                        <option value=" Primary Care Doctor"> Primary Care Doctor</option>
                        <option value=" Psychiatrist">Psychiatrist</option> 
                        <option value=" Radiologist">Radiologist</option>
                        <option value=" Surgeon"> Surgeon</option>
                    </select>
                </td>
                <td>Service Description:</td>
                <td><input type="text" name="name" placeholder="Last Name" id="form_serdes" required/></td>
            </tr>
        </table>
    </div>
</div>
<div class="container">
    <div class="col-lg-12">
        <h2 class="hs_heading">Practice Information</h2>
        <table class="col-lg-12">
            <tr>
                <td>Qualifications: </td>
                <td><input class="formtd" type="text" name="name" placeholder="Qualifications (seperate with comma)" id="form_qualifications" required/></td>
            </tr>
            <tr>
                <td>Specialities: </td>
                <td><input type="text" name="name" placeholder="Specialities (seperate with comma)" id="form_specialities"/></td>
            </tr>
            <tr>
                <td>Hospital Affilications: </td>
                <td><input type="text" name="name" placeholder="Hospital Names(seperate with comma)" id="form_hospitals" required/></td>
            </tr>
            <tr>
                <td>Languages: </td>
                <td><input type="text" name="name" placeholder="Language Spoken (seperate with comma)" id="form_language"/></td>
            </tr>
            <tr>
                <td>Professional Satement: </td>
                <td><textarea id="form_prostate" rows="5" cols="400" placeholder="Describe yourself here..."></textarea></td>
            </tr>
            <tr>
                <td>Short Bio: </td>
                <td><textarea id="form_shortbio" rows="2" cols="200" placeholder=" Briefly Describe yourself here..."></textarea></td>
            </tr>
        </table>
    </div>
</div>

<div class="container">
    <div class="col-lg-12" align="center" style="padding-top:30px;">
        <div class="btn btn-default" id="save_newDoctor" align="center">Save Informations</div>
    </div>
</div>




<?php include("footer.php");