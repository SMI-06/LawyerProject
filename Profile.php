<?php
include "include/connection.php";
include "include/header.php";
session_start();
?>

<?php

if(isset($_REQUEST['sumbit'])){
$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$image = $_FILES['image']['name'];
$temp_name = $_FILES['image']['tmp_name'];
$destination = "Images/lawyer_images/" . $image;
move_uploaded_file($temp_name, $destination);
$phone = $_REQUEST['phone'];
$cnic = $_REQUEST['cnic'];
$dob = $_REQUEST['dob'];
$gender = $_REQUEST['gender'];
$address = $_REQUEST['address'];
$city = $_REQUEST['city'];
$country = $_REQUEST['country'];
$highest_qualification = $_REQUEST['highest_qualification'];
$lawyer_type = $_REQUEST['lawyer_type'];
$specialization = $_REQUEST['specialization'];
$experience_level = $_REQUEST['experience_level'];
$case_done = $_REQUEST['case_done'];
$short_about = $_REQUEST['short_about'];
$about_me = $_REQUEST['about_me'];
$personal_statement = $_REQUEST['personal_statement'];

$query = "INSERT INTO `lawyer_details`( `User_Id`, `first_name`, `last_name`, `lawyer_email`, `mobile_number`, `image`, `gender`, `dob`, `cnic`, `country`, `city`, `address`, `lawyer_type`, `lawyer_case_done`, `short_about`, `about_me`, `lawyer_personal_statement`, `highest_qualification`, `specialization`, `experience_level`) VALUES ('".$_SESSION['id']."',:firstname,:lastname,'".$_SESSION['email']."',:phone,:image,:gender,:dob,:cnic,:country,:city,:address,:lawyer_type,:case_done,:short_about,:about_me,:personal_statement,:highest,:specialization,:experience)";

$pdo_statement = $pdo_con->prepare($query);
$pdo_statement->bindValue(':firstname',$first_name,PDO::PARAM_STR);
$pdo_statement->bindValue(':lastname',$last_name,PDO::PARAM_STR);
$pdo_statement->bindValue(':phone',$phone,PDO::PARAM_STR);
$pdo_statement->bindValue(':image',$image,PDO::PARAM_STR);
$pdo_statement->bindValue(':cnic',$cnic,PDO::PARAM_STR);
$pdo_statement->bindValue(':dob',$dob,PDO::PARAM_STR);
$pdo_statement->bindValue(':gender',$gender,PDO::PARAM_STR);
$pdo_statement->bindValue(':address',$address,PDO::PARAM_STR);
$pdo_statement->bindValue(':city',$city,PDO::PARAM_STR);
$pdo_statement->bindValue(':country',$country,PDO::PARAM_STR);
$pdo_statement->bindValue(':highest',$highest_qualification,PDO::PARAM_STR);
$pdo_statement->bindValue(':lawyer_type',$lawyer_type,PDO::PARAM_STR);
$pdo_statement->bindValue(':specialization',$specialization,PDO::PARAM_STR);
$pdo_statement->bindValue(':experience',$experience_level,PDO::PARAM_STR);
$pdo_statement->bindValue(':case_done',$case_done,PDO::PARAM_STR);
$pdo_statement->bindValue(':short_about',$short_about,PDO::PARAM_STR);
$pdo_statement->bindValue(':about_me',$about_me,PDO::PARAM_STR);
$pdo_statement->bindValue(':personal_statement',$personal_statement,PDO::PARAM_STR);
$pdo_statement->execute();

}

?>
<div class="container">
  <div class="row m-5">
    <div class="col-md-12">
      <form method="post" enctype="multipart/form-data">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">First Name</label>
          <div class="col-sm-10">
            <input type="text" name="first_name" class="form-control" placeholder="First Name">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Last Name</label>
          <div class="col-sm-10">
            <input type="text" name="last_name" class="form-control" placeholder=" Last Name">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Phone</label>
          <div class="col-sm-10">
            <input type="text" name="phone" class="form-control" placeholder="Phone">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Image</label>
          <div class="col-sm-10">
            <input type="file" name="image" class="form-control" placeholder="Image">
          </div>
        </div>
        <br>
        <fieldset class="form-group">
          <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
            <div class="col-sm-10">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="gender" value="Male" checked>Male
                </label>
                <label class="form-check-label" style="margin-left: 40px;">
                  <input class="form-check-input" type="radio" name="gender" value="FeMale">FeMale
                </label>
              </div>
              <div class="form-check">
              </div>
            </div>
          </div>
        </fieldset>
        <br>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Date Of Birth</label>
          <div class="col-sm-10">
            <input type="text" name="dob" class="form-control" placeholder="Date Of Birth">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">CNIC</label>
          <div class="col-sm-10">
            <input type="text" name="cnic" class="form-control" placeholder="CNIC">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Country</label>
          <div class="col-sm-10">
            <select name="country">
              <option value="Pakistan">Pakistan</option>
            </select>
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">City</label>
          <div class="col-sm-10">
            <select name="city">
              <option value="Karachi">Karachi</option>
              <option value="Lahore">Lahore</option>
              <option value="Islamabad">Islamabad</option>
              <option value="Hydrabad">Hydrabad</option>
            </select>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Address</label>
          <div class="col-sm-10">
            <input type="text" name="address" class="form-control" placeholder="Address">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Lawyer Type</label>
          <div class="col-sm-10">
            <select name="lawyer_type">
              <option value="Criminal Lawyer">Criminal Lawyer</option>
              <option value="Personal Lawyer">Personal Lawyer</option>
              <option value="Divorce Lawyer">Divorce Lawyer</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Case Done</label>
          <div class="col-sm-10">
            <input type="text" name="case_done" class="form-control" placeholder="Case Done">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Short About</label>
          <div class="col-sm-10">
            <input type="text" name="short_about" class="form-control" placeholder="Short About">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">About Me</label>
          <div class="col-sm-10">
            <input type="text" name="about_me" class="form-control" placeholder="About me">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Personal Statement</label>
          <div class="col-sm-10">
            <input type="text" name="personal_statement" class="form-control" placeholder="Personal Statement">
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Highest Qualification</label>
          <div class="col-sm-10">
            <select name="highest_qualification">
              <option value="Masters">Masters</option>
              <option value="LLB">LLB</option>
              <option value="LLM">LLM</option>
            </select>
          </div>
        </div>
       
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Specialization</label>
          <div class="col-sm-10">
            <select name="specialization">
              <option value="Criminal Law">Criminal</option>
              <option value="Personal Law">Personal</option>
              <option value="Divorce Law">Divorce</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Experience Level</label>
          <div class="col-sm-10">
            <select name="experience_level">
              <option value="2 to 5 Years">2 to 5 Years</option>
              <option value="5 to 10 Years">5 to 10 Years</option>
              <option value="10 to 15 Years">10 to 15 Years</option>
            </select>
          </div>
        </div>

       
       
        <br>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" name="sumbit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>




<?php include "include/footer.php" ?>