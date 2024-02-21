<?php
include "include/connection.php";
include "include/header.php" 


?>



<?php if (isset($_SESSION['role']) == "Lawyer") { ?>

  <?php
  // Insert Start

  if (isset($_REQUEST['sumbit'])) {
    $image = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
    $destination = "Images/lawyer_images/" . $image;
    move_uploaded_file($temp_name, $destination);
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $cnic_5 = $_REQUEST['cnic_5'];
    $cnic_7 = $_REQUEST['cnic_7'];
    $cnic_1 = $_REQUEST['cnic_1'];
    $cnic = $cnic_5 . "-" . $cnic_7 . "-" . $cnic_1;
    $country_code = $_REQUEST['country_code'];
    $sim_code = $_REQUEST['sim_code'];
    $number = $_REQUEST['phone_number'];
    $phone = $country_code . "-" . $sim_code . "-" . $number;
    $gender = $_REQUEST['gender'];
    $address = $_REQUEST['address'];
    $city = $_REQUEST['city'];
    $country = $_REQUEST['country'];
    $date = $_REQUEST['date'];
    $month = $_REQUEST['month'];
    $year = $_REQUEST['year'];
    $dob = $date . "/" . $month . "/" . $year;
    $lawyer_type = $_REQUEST['lawyer_type'];
    $specialization = $_REQUEST['specialization'];
    $experience_level = $_REQUEST['experience'];
    $case_done = $_REQUEST['case_done'];
    $highest_qualification = $_REQUEST['qualification'];
    $short_about = $_REQUEST['short_about'];
    $about_me = $_REQUEST['about_you'];
    $personal_statement = $_REQUEST['personal_statement'];

    $query = "INSERT INTO `lawyer_details`( `User_Id`, `first_name`, `last_name`, `lawyer_email`, `mobile_number`, `image`, `gender`, `dob`, `cnic`, `country`, `city`, `address`, `lawyer_type`, `lawyer_case_done`, `short_about`, `about_me`, `lawyer_personal_statement`, `highest_qualification`, `specialization`, `experience_level`) VALUES ('" . $_SESSION['id'] . "',:firstname,:lastname,'" . $_SESSION['email'] . "',:phone,:image,:gender,:dob,:cnic,:country,:city,:address,:lawyer_type,:case_done,:short_about,:about_me,:personal_statement,:highest,:specialization,:experience)";

    $pdo_statement = $pdo_con->prepare($query);
    $pdo_statement->bindValue(':firstname', $first_name, PDO::PARAM_STR);
    $pdo_statement->bindValue(':lastname', $last_name, PDO::PARAM_STR);
    $pdo_statement->bindValue(':phone', $phone, PDO::PARAM_STR);
    $pdo_statement->bindValue(':image', $image, PDO::PARAM_STR);
    $pdo_statement->bindValue(':cnic', $cnic, PDO::PARAM_STR);
    $pdo_statement->bindValue(':dob', $dob, PDO::PARAM_STR);
    $pdo_statement->bindValue(':gender', $gender, PDO::PARAM_STR);
    $pdo_statement->bindValue(':address', $address, PDO::PARAM_STR);
    $pdo_statement->bindValue(':city', $city, PDO::PARAM_STR);
    $pdo_statement->bindValue(':country', $country, PDO::PARAM_STR);
    $pdo_statement->bindValue(':highest', $highest_qualification, PDO::PARAM_STR);
    $pdo_statement->bindValue(':lawyer_type', $lawyer_type, PDO::PARAM_STR);
    $pdo_statement->bindValue(':specialization', $specialization, PDO::PARAM_STR);
    $pdo_statement->bindValue(':experience', $experience_level, PDO::PARAM_STR);
    $pdo_statement->bindValue(':case_done', $case_done, PDO::PARAM_STR);
    $pdo_statement->bindValue(':short_about', $short_about, PDO::PARAM_STR);
    $pdo_statement->bindValue(':about_me', $about_me, PDO::PARAM_STR);
    $pdo_statement->bindValue(':personal_statement', $personal_statement, PDO::PARAM_STR);
    $pdo_statement->execute();
  }




  ?>

  <section class="section profile mt-5 mb-5">
    
    <div class="container">

      <div class="row">

        <div class="col-xl-4">

          <div class="card" style="background-color: #D7B679">

            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <?php
              $query = "SELECT * FROM `lawyer_details` WHERE User_Id = '" . $_SESSION['id'] . "' limit 1  ";
              $pdo_statement = $pdo_con->prepare($query);
              $pdo_statement->execute();
              $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
              foreach ($result as $row) {  ?>
                <img width="200px" src="./Images/lawyer_images/<?php echo $row['image'] ?>" alt="Profile" class="rounded">
                <h2><?php echo $_SESSION['username'] ?></h2>
                <h3><?php echo $_SESSION['role'] ?></h3>
              <?php } ?>

              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>

            </div>

          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">

            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link " data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>

              <div class="tab-content pt-2">

                <!--Over View-->
                <div class="tab-pane show active fade profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>
                  <?php
                  $query = "SELECT * FROM `lawyer_details` WHERE User_Id = '" . $_SESSION['id'] . "' limit 1  ";
                  $pdo_statement = $pdo_con->prepare($query);
                  $pdo_statement->execute();
                  $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($result as $row) {
                  } ?>

                  <div class="row">
                    <div style="color:#D7B679 ; font-weight: bolder;" class="col-lg-3 col-md-4 label  ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['first_name']. " ".$row['last_name'] ?></div>
                  </div>

                  <div class="row">
                    <div style="color:#D7B679 ; font-weight: bolder;" class="col-lg-3 col-md-4 label">Contact No#</div>
                    <div  class="col-lg-9 col-md-8"><?php echo $row['mobile_number'] ?></div>
                  </div>

                  <div class="row">
                    <div style="color:#D7B679 ; font-weight: bolder;" class="col-lg-3 col-md-4 label">CNIC</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['cnic']?></div>
                  </div>

                  <div class="row">
                    <div style="color:#D7B679 ; font-weight: bolder;" class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['address'] ?></div>
                  </div>

                  <div class="row">
                    <div style="color:#D7B679 ; font-weight: bolder;" class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['country'] ?></div>
                  </div>

                  <div class="row">
                    <div style="color:#D7B679 ; font-weight: bolder;" class="col-lg-3 col-md-4 label">Gender</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['gender'] ?></div>
                  </div>

                  <div class="row">
                    <div style="color:#D7B679 ; font-weight: bolder;" class="col-lg-3 col-md-4 label">D.O.B</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['dob'] ?></div>
                  </div>

                  <div class="row">
                    <div style="color:#D7B679 ; font-weight: bolder;" class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['email'] ?></div>
                  </div>

                </div>

                <!--Profile Edit-->
                <div class="tab-pane  fade profile-edit pt-3" id="profile-edit">



                  <?php
                  $query = "SELECT * FROM `lawyer_details` WHERE User_Id = '" . $_SESSION['id'] . "' limit 1  ";
                  $pdo_statement = $pdo_con->prepare($query);
                  $pdo_statement->execute();
                  $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
                  if ($selectquery->rowCount() > 0) {


                    if ($result['User_Id'] == $_SESSION['id']) {
                        $_SESSION['Lawyerid'] = $result['User_Id'];
                       
                        $_SESSION['Cnic'] = $result['cnic'];
                       
                       
                    } }
                  foreach ($result as $row) {
                  } ?>

                  <!-- Profile Edit Form -->
                  <form method="post" enctype="multipart/form-data">
                    
                    <!--Picture-->
                    <div class="row mb-3">
                      
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                     
                      <div class="col-md-8 col-lg-9">
                        
                        <div class="pt-2">

                          <div class="btn btn-primary btn-sm" title="Upload new profile image">
                            <i class="bi bi-upload p-2">
                              <input class="form-control" name="image" value="<?php echo $row['image'] ?>" type="file">
                            </i>
                          </div>

                        </div>

                      </div>

                    </div>

                    <!--Names-->
                    <div class="row m-3">

                      <label class="col-md-2">First Name</label>
                      
                      <div class="col-md-4">
                        <input type="hidden" name="getcnic" value="<?php echo $row['cnic']?>">
                        <?php if ($row['first_name'] == "") { ?>
                          <input name="first_name" type="text" class="form-control" placeholder="First Name">
                        <?php } elseif ($row['first_name'] != "'") { ?>
                          <input name="first_name" type="text" class="form-control" value="<?php echo $row['first_name'] ?>">
                        <?php } ?>
                      </div>
                      
                      <label class="col-md-2">Last Name</label>
                      
                      <div class="col-md-4">
                        <?php if ($row['last_name'] == "") { ?>
                          <input name="last_name" type="text" class="form-control" placeholder="Last Name">

                        <?php } elseif ($row['last_name'] != "") { ?>
                          <input name="last_name" type="text" class="form-control" value="<?php echo $row['last_name'] ?>">

                        <?php } ?>
                      </div>

                    </div>

                    <h5>CNIC</h5>
                    <div class="row m-3">

                      <?php if ($row['cnic'] == "") { ?>
                        <label class="col-md-2">CNIC</label>
                        <div class="col-md-3">
                          <input name="cnic_5" type="text" class="form-control" style="width:80px" placeholder="12345">
                        </div>
                        <div class="col-md-3">
                          <input name="cnic_7" type="text" class="form-control" style="width:150px" placeholder="1234567">
                        </div>
                        <div class="col-md-3">
                          <input name="cnic_1" type="text" class="form-control" style="width:50px" placeholder="1">
                        </div>
                      <?php } elseif ($row['cnic'] != "") { ?>
                        <label class="col-md-2">CNIC</label>
                        <div class="col-md-10">
                          <input name="new_cnic" readonly type="text" class="form-control" style="width:100%" value="<?php echo $row['cnic'] ?>">
                        </div>
                      <?php } ?>


                    </div>

                    <h5>Contact</h5>

                    <div class="row m-3">
                      <?php if ($row['mobile_number'] == "") { ?>

                        <label class="col-md-2">Phone</label>
                        
                        <!--+92-->
                        <div class="col-md-3">
                          <input name="country_code" readonly value="+92" type="text" class="form-control" style="width:80px">
                        </div>

                        <!--Sim Code-->
                        <div class="col-md-3">

                          <select name="sim_code">
                            <option disabled selected>Sim Code</option>
                            <option value="311">311</option>
                            <option value="313">313</option>
                            <option value="333">333</option>
                            <option value="344">344</option>
                            <option value="342">342</option>
                          </select>

                        </div>

                        <!--Number-->
                        <div class="col-md-3">
                          <input name="phone_number" type="text" class="form-control" style="width:180px" placeholder="1234567">
                        </div>
                     
                        <?php } elseif ($row['mobile_number'] != "") { ?>

                        <label class="col-md-2">Phone</label>

                        <div class="col-md-10">
                          <input name="phone_number" type="text" class="form-control" style="width:100%" value="<?php echo $row['mobile_number'] ?>">
                        </div>

                      <?php } ?>
                    </div>

                    <h5>Gender</h5>

                    <div class="row m-3">
                      <label class="col-md-2">Gender</label>
                      
                      <div class="col-md-10">

                        <?php if ($row['gender'] == "") { ?>

                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Male">
                            <label class="form-check-label" for="">Male</label>
                          </div>

                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Female">
                            <label class="form-check-label" for="">Female</label>
                          </div>

                        <?php } elseif ($row['gender'] != "") { ?>

                          <?php if ($row['gender'] == 'Male') { ?>

                            <div class="form-check form-check-inline">
                              <input class="form-check-input" checked type="radio" name="gender" value="Male">
                              <label class="form-check-label" for="">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" value="Female">
                              <label class="form-check-label" for="">Female</label>
                            </div>

                          <?php } elseif ($row['gender'] == 'Female') { ?>

                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" value="Male">
                              <label class="form-check-label" for="">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                              <input class="form-check-input" checked type="radio" name="gender" value="Female">
                              <label class="form-check-label" for="">Female</label>
                            </div>

                        <?php } } ?>

                      </div>

                    </div>

                    <h5>Address</h5>

                     <!--Address-->
                    <div class="row m-3">
                      <label class="col-md-2">Address</label>

                      <div class="col-md-10">

                        <?php if ($row['address'] == "") { ?>

                          <input name="address" type="text" class="form-control" placeholder="Your Address">

                        <?php } elseif ($row['address'] != "") { ?>

                          <input name="address" value="<?php echo $row['address'] ?>" type="text" class="form-control" placeholder="Your Address">

                        <?php } ?>

                      </div>

                    </div>
                    
                    <!--City and Country-->
                    <div class="row m-3">

                      <label class="col-md-2">City</label>
                      
                      <div class="col-md-4">

                        <?php if ($row['city'] == "") { ?>

                          <select name="city">
                            <option selected disabled>Choose City</option>
                            <option value="Karachi">Karachi</option>
                            <option value="Hydrabad">Hydrabad</option>
                            <option value="Lahore">Lahore</option>
                            <option value="Sailkot">Sailkot</option>
                          </select>

                        <?php } elseif ($row['city'] != "") { ?>

                          <?php if ($row['city'] == 'Karachi') { ?>

                            <select name="city">
                              <option selected value="Karachi">Karachi</option>
                              <option value="Hydrabad">Hydrabad</option>
                              <option value="Lahore">Lahore</option>
                              <option value="Sailkot">Sailkot</option>
                              <option value="Islamabad">Islamabad</option>
                            </select>

                          <?php } elseif ($row['city'] == 'Lahore') { ?>

                            <select name="city">
                              <option selected value="Lahore">Lahore</option>
                              <option value="Karachi">Karachi</option>
                              <option value="Hydrabad">Hydrabad</option>
                              <option value="Sailkot">Sailkot</option>
                              <option value="Islamabad">Islamabad</option>
                            </select>

                          <?php } elseif ($row['city'] == 'Hydrabad') { ?>

                            <select name="city">
                              <option selected value="Hydrabad">Hydrabad</option>
                              <option value="Lahore">Lahore</option>
                              <option value="Karachi">Karachi</option>
                              <option value="Sailkot">Sailkot</option>
                              <option value="Islamabad">Islamabad</option>
                            </select>

                          <?php } elseif ($row['city'] == 'Sailkot') { ?>

                            <select name="city">
                              <option selected value="Sailkot">Sailkot</option>
                              <option value="Lahore">Lahore</option>
                              <option value="Karachi">Karachi</option>
                              <option value="Hydrabad">Hydrabad</option>
                              <option value="Islamabad">Islamabad</option>
                            </select>

                          <?php } elseif ($row['city'] == 'Islamabad') { ?>

                            <select name="city">
                              <option selected value="Islamabad">Islamabad</option>
                              <option value="Lahore">Lahore</option>
                              <option value="Karachi">Karachi</option>
                              <option value="Hydrabad">Hydrabad</option>
                              <option value="Sailkot">Sailkot</option>
                            </select>

                        <?php } } ?>

                      </div>

                      <label class="col-md-2">Country</label>
                      
                      <div class="col-md-4">

                        <select name="country">
                          <option selected value="Pakistan">Pakistan</option>
                        </select>

                      </div>

                    </div>

                    <h5>Date Of Birth</h5>

                    <div class="row m-3">

                      <?php if ($row['dob'] == "") { ?>

                        <label class="col-md-2">Date</label>

                        <div class="col-md-3">

                          <select name="date">
                            <option selected disabled>Choose Date</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                          </select>

                        </div>

                        <label class="col-md-2">Month</label>

                        <div class="col-md-3">

                          <select name="month">
                            <option selected disabled>Choose month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November ">November </option>
                            <option value="December">December</option>
                          </select>

                        </div>

                        <!--Year-->
                        <div class="row ">

                          <label class="col-md-2">Year</label>

                          <div class="col-md-10">

                            <select name="year">
                              <option selected disabled>Choose Year</option>
                              <option value="1999">1960</option>
                              <option value="1999">1961</option>
                              <option value="1999">1962</option>
                              <option value="1999">1963</option>
                              <option value="1999">1964</option>
                              <option value="1999">1965</option>
                              <option value="1999">1966</option>
                              <option value="1999">1967</option>
                              <option value="1999">1968</option>
                              <option value="1999">1969</option>
                              <option value="1999">1970</option>
                              <option value="1999">1971</option>
                              <option value="1999">1972</option>
                              <option value="1999">1973</option>
                              <option value="1999">1974</option>
                              <option value="1999">1975</option>
                              <option value="1999">1976</option>
                              <option value="1999">1977</option>
                              <option value="1999">1978</option>
                              <option value="1999">1979</option>
                              <option value="1999">1980</option>
                              <option value="1999">1981</option>
                              <option value="1999">1982</option>
                              <option value="1999">1983</option>
                              <option value="1999">1984</option>
                              <option value="1999">1985</option>
                              <option value="1999">1986</option>
                              <option value="1999">1987</option>
                              <option value="1999">1988</option>
                              <option value="1999">1989</option>
                              <option value="1990">1990</option>
                              <option value="1991">1991</option>
                              <option value="1992">1992</option>
                              <option value="1993">1993</option>
                              <option value="1994">1994</option>
                              <option value="1995">1995</option>
                              <option value="1996">1996</option>
                              <option value="1997">1997</option>
                              <option value="1998">1998</option>
                              <option value="1999">1999</option>
                              <option value="2000">2000</option>
                              <option value="2001">2001</option>
                              <option value="2002">2002</option>
                              <option value="2003">2003</option>
                              <option value="2004">2004</option>
                              <option value="2005">2005</option>
                              <option value="2006">2006</option>
                              <option value="2007">2007</option>
                              <option value="2008">2008</option>
                              <option value="2009">2009</option>
                              <option value="2010">2010</option>
                              <option value="2011">2011</option>
                              <option value="2012">2012</option>
                              <option value="2013">2013</option>
                              <option value="2014">2014</option>
                              <option value="2015">2015</option>
                            </select>

                          </div>

                        </div>

                       <?php } elseif ($row['dob'] != "") { ?>

                        <label class="col-md-2">Date Of Birth</label>

                        <div class="col-md-10">
                          <input name="new_date" type="text" class="form-control" style="width:100%" value="<?php echo $row['dob'] ?>">
                        </div>

                      <?php } ?>

                    </div>

                    <h5>Experience</h5>

                    <!-- Lawyer Type And Specialization -->
                    <div class="row m-3">

                      <label class="col-md-2">Lawyer Type</label>
                        
                      <div class="col-md-4">

                      <?php if ($row['lawyer_type'] == 'Criminal Laywer') { ?>

                        <select name="lawyer_type">
                          <option selected value="Criminal Laywer">Criminal Laywer</option>
                          <option value="Family Laywer">Family Laywer</option>
                          <option value="Property Laywer">Property Laywer</option>
                          <option value="Personal Laywer">Personal Laywer</option>
                          <option value="Divorce Laywer">Divorce Laywer</option>
                        </select>

                      <?php } elseif (($row['lawyer_type'] == 'Family Laywer')) { ?>

                        <select name="lawyer_type">
                          <option selected value="Family Laywer">Family Laywer</option>
                          <option value="Criminal Laywer">Criminal Laywer</option>
                          <option value="Property Laywer">Property Laywer</option>
                          <option value="Personal Laywer">Personal Laywer</option>
                          <option value="Divorce Laywer">Divorce Laywer</option>
                        </select>

                      <?php } elseif (($row['lawyer_type'] == 'Property Laywer')) { ?>

                        <select name="lawyer_type">
                          <option selected value="Property Laywer">Property Laywer</option>
                          <option value="Family Laywer">Family Laywer</option>
                          <option value="Criminal Laywer">Criminal Laywer</option>
                          <option value="Personal Laywer">Personal Laywer</option>
                          <option value="Divorce Laywer">Divorce Laywer</option>
                        </select>

                      <?php } elseif (($row['lawyer_type'] == 'Divorce Laywer')) { ?>

                        <select name="lawyer_type">
                          <option selected value="Divorce Laywer">Divorce Laywer</option>
                          <option value="Family Laywer">Family Laywer</option>
                          <option value="Criminal Laywer">Criminal Laywer</option>
                          <option value="Property Laywer">Property Laywer</option>
                          <option value="Personal Laywer">Personal Laywer</option>
                        </select>

                      <?php } elseif (($row['lawyer_type'] == 'Personal Laywer')) { ?>

                        <select name="lawyer_type">
                          <option selected value="Personal Laywer">Personal Laywer</option>
                          <option value="Family Laywer">Family Laywer</option>
                          <option value="Criminal Laywer">Criminal Laywer</option>
                          <option value="Property Laywer">Property Laywer</option>
                          <option value="Divorce Laywer">Divorce Laywer</option>
                        </select>

                      <?php } else { ?>

                        <select name="lawyer_type">
                          <option selected disabled>Choose Type</option>
                          <option value="Family Laywer">Family Laywer</option>
                          <option value="Criminal Laywer">Criminal Laywer</option>
                          <option value="Property Laywer">Property Laywer</option>
                          <option value="Divorce Laywer">Divorce Laywer</option>
                        </select>

                      <?php } ?>
                      </div>
                        
                      <label class="col-md-2">Specialization</label>
                        
                      <div class="col-md-4">

                      <?php if ($row['specialization'] == "") { ?>

                        <select name="specialization">
                          <option selected disabled>Choose Specialization</option>
                          <option value="Criminal Laywer">Criminal Laywer</option>
                          <option value="Family Laywer">Family Laywer</option>
                          <option value="Personal Laywer">Personal Laywer</option>
                          <option value="Property Laywer">Property Laywer</option>
                          <option value="Divorce Laywer">Divorce Laywer</option>
                        </select>

                      <?php } elseif ($row['specialization'] != "") { ?>

                        <?php if ($row['specialization'] == 'Criminal Laywer') { ?>

                          <select name="specialization">
                            <option selected value="Criminal Laywer">Criminal Laywer</option>
                            <option value="Family Laywer">Family Laywer</option>
                            <option value="Personal Laywer">Personal Laywer</option>
                            <option value="Property Laywer">Property Laywer</option>
                            <option value="Divorce Laywer">Divorce Laywer</option>
                          </select>

                        <?php } elseif ($row['specialization'] == 'Family Laywer') { ?>

                          <select name="specialization">
                            <option selected value="Family Laywer">Family Laywer</option>
                            <option value="Criminal Laywer">Criminal Laywer</option>
                            <option value="Personal Laywer">Personal Laywer</option>
                            <option value="Property Laywer">Property Laywer</option>
                            <option value="Divorce Laywer">Divorce Laywer</option>
                          </select>

                        <?php } elseif ($row['specialization'] == 'Personal Laywer') { ?>

                          <select name="specialization">
                            <option selected value="Personal Laywer">Personal Laywer</option>
                            <option value="Family Laywer">Family Laywer</option>
                            <option value="Criminal Laywer">Criminal Laywer</option>
                            <option value="Property Laywer">Property Laywer</option>
                            <option value="Divorce Laywer">Divorce Laywer</option>
                          </select>

                        <?php } elseif ($row['specialization'] == 'Property Laywer') { ?>

                          <select name="specialization">
                            <option selected value="Property Laywer">Property Laywer</option>
                            <option value="Personal Laywer">Personal Laywer</option>
                            <option value="Family Laywer">Family Laywer</option>
                            <option value="Criminal Laywer">Criminal Laywer</option>
                            <option value="Divorce Laywer">Divorce Laywer</option>
                          </select>

                        <?php } elseif ($row['specialization'] == 'Divorce Laywer') { ?>

                          <select name="specialization">
                            <option selected value="Divorce Laywer">Divorce Laywer</option>
                            <option value="Property Laywer">Property Laywer</option>
                            <option value="Personal Laywer">Personal Laywer</option>
                            <option value="Family Laywer">Family Laywer</option>
                            <option value="Criminal Laywer">Criminal Laywer</option>
                          </select>

                      <?php } } ?>

                      </div>

                    </div>

                    <!-- Case Done And Won -->
                    <div class="row m-3">

                      <label class="col-md-2">Case Done</label>

                      <div class="col-md-10">

                      <?php if ($row['lawyer_case_done'] == "") { ?>

                        <input name="case_done" type="text" class="form-control" placeholder="Case Done">

                      <?php } elseif ($row['lawyer_case_done'] != "") { ?>

                        <input name="case_done" type="text" class="form-control" value="<?php echo $row['lawyer_case_done'] ?>">

                      <?php } ?>

                      </div>

                    </div>
                    
                    <!-- Experience -->
                    <div class="row m-3">

                      <label class="col-md-2">Experience</label>

                      <div class="col-md-10">
                        <?php if ($row['experience_level'] == "") { ?>

                        <select name="experience">
                          <option selected disabled>Choose Experience</option>
                          <option value="2 to 5 years">2 to 5 years</option>
                          <option value="5 to 10 years">5 to 10 years</option>
                          <option value="10 to 15 years">10 to 15 years</option>
                          <option value="15 to 20 years">15 to 20 years</option>
                        </select>

                        <?php } elseif ($row['experience_level'] != "") { ?>

                        <?php if ($row['experience_level'] == '2 to 5 years') { ?>


                          <select name="experience">
                            <option selected value="2 to 5 years">2 to 5 years</option>
                            <option value="5 to 10 years">5 to 10 years</option>
                            <option value="10 to 15 years">10 to 15 years</option>
                            <option value="15 to 20 years">15 to 20 years</option>
                          </select>

                        <?php } elseif ($row['experience_level'] == '5 to 10 years') { ?>

                          <select name="experience">
                            <option selected value="5 to 10 years">5 to 10 years</option>
                            <option value="2 to 5 years">2 to 5 years</option>
                            <option value="10 to 15 years">10 to 15 years</option>
                            <option value="15 to 20 years">15 to 20 years</option>
                          </select>

                        <?php } elseif ($row['experience_level'] == '10 to 15 years') { ?>

                          <select name="experience">
                            <option selected value="10 to 15 years">10 to 15 years</option>
                            <option value="2 to 5 years">2 to 5 years</option>
                            <option value="5 to 10 years">5 to 10 years</option>
                            <option value="15 to 20 years">15 to 20 years</option>
                          </select>

                        <?php } elseif ($row['experience_level'] == '15 to 20 years') { ?>

                          <select name="experience">
                            <option selected value="15 to 20 years">15 to 20 years</option>
                            <option value="10 to 15 years">10 to 15 years</option>
                            <option value="2 to 5 years">2 to 5 years</option>
                            <option value="5 to 10 years">5 to 10 years</option>
                          </select>

                        <?php } } ?>
                      
                      </div>

                    </div>

                    <h5>Qualification</h5>

                    <div class="row m-3">

                     <label class="col-md-2">Qualification</label>

                      <div class="col-md-10">

                       <?php if ($row['highest_qualification'] == "") { ?>

                        <select name="qualification">
                          <option selected disabled>Choose Qualification</option>
                          <option value="Masters">Masters</option>
                          <option value="LLB">LLB</option>
                          <option value="LLM">LLM</option>
                        </select>

                       <?php } elseif ($row['highest_qualification'] != "") { ?>

                        <?php if ($row['highest_qualification'] == 'LLB') { ?>

                          <select name="qualification">
                            <option selected value="LLB">LLB</option>
                            <option value="Masters">Masters</option>
                            <option value="LLM">LLM</option>
                          </select>

                        <?php } elseif ($row['highest_qualification'] == 'Masters') { ?>
                          
                          <select name="qualification">
                            <option selected value="Masters">Masters</option>
                            <option value="LLB">LLB</option>
                            <option value="LLM">LLM</option>
                          </select>

                        <?php } elseif ($row['highest_qualification'] == 'LLM') { ?>

                          <select name="qualification">
                            <option selected value="LLM">LLM</option>
                            <option value="Masters">Masters</option>
                            <option value="LLB">LLB</option>
                          </select>

                        <?php } } ?>
                      </div>

                    </div>

                   <h5>About Yourself</h5>

                   <!--Short About-->
                    <div class="row m-3">

                      <label class="col-md-2">Short About</label>

                      <div class="col-md-10">

                      <?php if ($row['short_about'] == "") { ?>

                        <input type="text" name="short_about" placeholder="Short About" class="form-control">

                      <?php } elseif ($row['short_about'] != "") { ?>

                        <input type="text" name="short_about" value="<?php echo $row['short_about'] ?>" class="form-control">

                      <?php } ?>

                      </div>

                    </div>

                    <!--About Me-->
                    <div class="row m-3">

                      <label class="col-md-2">About Me</label>

                      <div class="col-md-10">

                        <?php if ($row['about_me'] == "") { ?>

                          <input type="text" name="about_you" placeholder="About me" class="form-control">

                        <?php } elseif ($row['about_me'] != "") { ?>

                          <input type="text" name="about_you" value="<?php echo $row['about_me'] ?>" class="form-control">

                        <?php } ?>
                      
                     </div>

                    </div>

                    <!--Personal statement-->
                   <div class="row m-3">

                    <label class="col-md-2">Personal statement</label>

                    <div class="col-md-10">

                      <?php if ($row['lawyer_personal_statement'] == "") { ?>

                        <input type="text" name="personal_statement" placeholder="Personal Statement" class="form-control">

                      <?php } elseif ($row['lawyer_personal_statement'] != "") { ?>

                        <input type="text" name="personal_statement" value="<?php echo $row['lawyer_personal_statement'] ?>" 
                        class="form-control">

                      <?php } ?>

                    </div>

                   </div>
                    
                    <!--Submit Button-->
                    <div class="text-center">
                      <button type="submit" name="sumbit" class="btn" style="background-color: #D7B679;">Submit</button>
                      <a href="edit_profile.php?id=<?php echo $row['Id']?>" style="background-color: #D7B679;" class="btn">Edit Your Profile</a>
                    </div>

                  </form>
                  <!-- End Profile Edit Form -->

                </div>

                <!--Change Password-->        
                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                  <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="currentPassword">
                  </div>
                 </div>

                  <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="newpassword" type="password" class="form-control" id="newPassword">
                  </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                 </div>

                  <div class="text-center">
                   <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                   </form> <!--End Change Password Form-->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>

<?php } ?>

<?php include "include/footer.php" ?>