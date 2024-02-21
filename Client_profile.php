<?php
include "include/connection.php";
include "include/header.php";
session_start();
?>

<?php if (isset($_SESSION['role']) == "Client") { ?>

    <?php
    if (isset($_REQUEST['Save_data'])) {
        $client_image = $_FILES['client_image']['name'];
        $temp_name = $_FILES['client_image']['tmp_name'];
        $destination = "Images/client_images/" . $client_image;
        move_uploaded_file($temp_name, $destination);
        $firstname = $_REQUEST['first_name'];
        $lastname = $_REQUEST['last_name'];
        $phone_code = $_REQUEST['code'];
        $phone_sim_code = $_REQUEST['sim_code'];
        $phone_number = $_REQUEST['number'];
        $contact = $phone_code . "-" . $phone_sim_code . "-" . $phone_number;
        $cnic_digit_5 = $_REQUEST['cnic_5'];
        $cnic_digit_7 = $_REQUEST['cnic_7'];
        $cnic_digit_1 = $_REQUEST['cnic_1'];
        $cnic = $cnic_digit_5 . "-" . $cnic_digit_7 . "-" . $cnic_digit_1;
        $address = $_REQUEST['address'];
        $city = $_REQUEST['city'];
        $country = $_REQUEST['country'];
        $gender = $_REQUEST['gender'];
        $date = $_REQUEST['date'];
        $month = $_REQUEST['month'];
        $year = $_REQUEST['year'];
        $dob = $date . "-" . $month . "-" . $year;
        $newmobile = $_REQUEST['mobile_number'];
        $newcnic = $_REQUEST['cnic'];
        $newdob = $_REQUEST['dob'];

        // $firstname == "" || $lastname == "" || $phone_code == "" || $phone_sim_code == "" || $phone_number == "" || $cnic_digit_5 == "" || $cnic_digit_7 == "" || $cnic_digit_1 == "" || $address == "" || $city == "" || $country == "" || $gender == "" || $date == "" || $month == ""  || $year == ""

        if ($firstname == "" || $lastname == "" || $address == "" || $city == "" || $country == "" || $gender == "") {

            $error = "Please Fill All Records";
        } else if (isset($_SESSION['cnic']) == $row['cnic']) {
            $query = "UPDATE `users` SET `image`=:clientimage,`first_name`=:firstname,`last_name`=:lastname,`gender`=:gender,`dob`=:dob,`cnic`=:cnic,`country`=:country,`city`=:city,`address`=:clientaddress,`mobile_number`=:phone  WHERE  username='" . $_SESSION['username'] . "' limit 1  ";
            $pdo_statement = $pdo_con->prepare($query);
            $pdo_statement->bindValue(':clientimage', $client_image, PDO::PARAM_STR);
            $pdo_statement->bindValue(':firstname', $firstname, PDO::PARAM_STR);
            $pdo_statement->bindValue(':lastname', $lastname, PDO::PARAM_STR);
            $pdo_statement->bindValue(':gender', $gender, PDO::PARAM_STR);
            $pdo_statement->bindValue(':dob', $newdob, PDO::PARAM_STR);
            $pdo_statement->bindValue(':cnic', $newcnic, PDO::PARAM_STR);
            $pdo_statement->bindValue(':country', $country, PDO::PARAM_STR);
            $pdo_statement->bindValue(':city', $city, PDO::PARAM_STR);
            $pdo_statement->bindValue('clientaddress', $address, PDO::PARAM_STR);
            $pdo_statement->bindValue(':phone', $newmobile, PDO::PARAM_STR);
            $pdo_statement->execute();

    ?>
            <script>
                alert("Record updated successfully");
                window.location.href = "http://localhost:88/lawyerwebsite/Client_profile.php";
            </script>

    <?php  } else if (isset($_SESSION['cnic']) != $row['cnic']) {
            $query = "UPDATE `users` SET `image`=:clientimage,`first_name`=:firstname,`last_name`=:lastname,`gender`=:gender,`dob`=:dob,`cnic`=:cnic,`country`=:country,`city`=:city,`address`=:clientaddress,`mobile_number`=:phone  WHERE  username='" . $_SESSION['username'] . "' limit 1  ";
            $pdo_statement = $pdo_con->prepare($query);
            $pdo_statement->bindValue(':clientimage', $client_image, PDO::PARAM_STR);
            $pdo_statement->bindValue(':firstname', $firstname, PDO::PARAM_STR);
            $pdo_statement->bindValue(':lastname', $lastname, PDO::PARAM_STR);
            $pdo_statement->bindValue(':gender', $gender, PDO::PARAM_STR);
            $pdo_statement->bindValue(':dob', $dob, PDO::PARAM_STR);
            $pdo_statement->bindValue(':cnic', $cnic, PDO::PARAM_STR);
            $pdo_statement->bindValue(':country', $country, PDO::PARAM_STR);
            $pdo_statement->bindValue(':city', $city, PDO::PARAM_STR);
            $pdo_statement->bindValue('clientaddress', $address, PDO::PARAM_STR);
            $pdo_statement->bindValue(':phone', $contact, PDO::PARAM_STR);
            $pdo_statement->execute();
            $success = "Record Added Successfully";
        }
    }



    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <?php if (isset($error)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Warning !!!</strong> <?php echo $error ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php } elseif (isset($success)) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congrats ❤</strong> <?php echo $success ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php  } ?>
            </div>
        </div>
    </div>
    <section class="section profile mt-5 mb-5">
        <div class="container">
            <div class="row mb-">
                <div class="col-xl-4">

                    <div class="card" style="background-color: #D7B679">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <?php
                            $query = "SELECT * FROM `users` WHERE username = '" . $_SESSION['username'] . "' limit 1  ";
                            $pdo_statement = $pdo_con->prepare($query);
                            $pdo_statement->execute();
                            $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) { ?>
                                <img src="./Images/client_images/<?php echo $row['image'] ?>" alt="Profile" width="250px" class=" rounded-circle">
                                <h2><?php echo $_SESSION['username'] ?></h2>
                                <h3><?php echo $_SESSION['role'] ?></h3>

                            <?php }
                            ?>


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
                                    <button class="nav-link " data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link active " data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                                </li>



                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                                </li>




                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade profile-overview" id="profile-overview">

                                    <h5 class="card-title mt-4">Profile Details</h5>

                                    <div class="row">
                                        <div style="color:#D7B679 ; font-weight: bolder;" class="col-lg-3 col-md-4 label  ">Full Name</div>
                                        <div style=" font-weight: bolder;" class="col-lg-9 col-md-8"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div style="color:#D7B679 ; font-weight: bolder;" class="col-lg-3 col-md-4 label">Contact No#</div>
                                        <div style=" font-weight: bolder;" class="col-lg-9 col-md-8"><?php echo $_SESSION['contact'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div style="color:#D7B679 ; font-weight: bolder;" class="col-lg-3 col-md-4 label">CNIC</div>
                                        <div style=" font-weight: bolder;" class="col-lg-9 col-md-8"><?php echo $_SESSION['cnic'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div style="color:#D7B679 ; font-weight: bolder;" class="col-lg-3 col-md-4 label">Address</div>
                                        <div style=" font-weight: bolder;" class="col-lg-9 col-md-8"><?php echo $_SESSION['address'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div style="color:#D7B679 ; font-weight: bolder;" class="col-lg-3 col-md-4 label">Country</div>
                                        <div style=" font-weight: bolder;" class="col-lg-9 col-md-8"><?php echo $_SESSION['country'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div style="color:#D7B679 ; font-weight: bolder;" class="col-lg-3 col-md-4 label">Gender</div>
                                        <div style=" font-weight: bolder;" class="col-lg-9 col-md-8"><?php echo $_SESSION['gender'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div style="color:#D7B679 ; font-weight: bolder;" class="col-lg-3 col-md-4 label">D.O.B</div>
                                        <div style=" font-weight: bolder;" class="col-lg-9 col-md-8"><?php echo $_SESSION['dob'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div style="color:#D7B679 ; font-weight: bolder;" class="col-lg-3 col-md-4 label">Email</div>
                                        <div style=" font-weight: bolder;" class="col-lg-9 col-md-8"><?php echo $_SESSION['email'] ?></div>
                                    </div>

                                </div>

                                <div class="tab-pane fade show active  profile-edit pt-3 " id="profile-edit">

                                    <div class="accordion " id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Accordion Item #1
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show pb-5" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="container mt-3">
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <?php
                                                            $query = "SELECT * FROM `users` WHERE username = '" . $_SESSION['username'] . "' limit 1  ";
                                                            $pdo_statement = $pdo_con->prepare($query);
                                                            $pdo_statement->execute();
                                                            $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach ($result as $row) { ?>

                                                                <!-- Profile Edit Form -->
                                                                <form method="post" enctype="multipart/form-data">
                                                                    <div class="row mb-3">
                                                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                                                        <div class="col-md-8 col-lg-9">
                                                                            <!-- <img src="assets/img/profile-img.jpg" alt="Profile"> -->
                                                                            <div class="pt-2">


                                                                                <div class="btn btn-primary btn-sm" title="Upload new profile image">

                                                                                    <i class="bi bi-upload p-2">
                                                                                        <input class="form-control" value="<?php echo $row['image'] ?>" type="file" name="client_image">
                                                                                    </i>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3 ">
                                                                        <input type="hidden" value="<?php $row['id'] ?>" name="cid">
                                                                        <div class="col-md-6 mt-3 d-flex justify-content-center align-items-center">
                                                                            <label class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                                                            <div class="col-md-8 col-lg-9">
                                                                                <input value="<?php echo $row['first_name'] ?>" name="first_name" type="text" class="form-control" value="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mt-3 d-flex justify-content-center align-items-center">
                                                                            <label class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                                                            <div class="col-md-8 col-lg-9">
                                                                                <input value="<?php echo $row['last_name'] ?>" name="last_name" type="text" class="form-control" value="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row ">
                                                                        <?php
                                                                        if (isset($_SESSION['contact']) == $row['mobile_number']) { ?>

                                                                            <div class="col-md-12">
                                                                                <label for="">Contact Number</label>
                                                                                <input value="<?php echo $row['mobile_number'] ?>" class="form-control" type="text" name="mobile_number">
                                                                            </div>

                                                                        <?php } else {
                                                                        ?>
                                                                            <div class="col-md-4">
                                                                                <label class="col-md-4 col-lg-3 col-form-label"> Code</label>
                                                                                <div class="col-md-8">
                                                                                    <input name="code" readonly type="text" class="form-control" value="+92">
                                                                                    <!-- <select name="C_code" class="form-control">
                                                                                <option selected value="92">92</option>
                                                                            </select> -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="col-md-4 col-form-label">Sim Code</label>
                                                                                <div class="col-md-8 col-lg-9">
                                                                                    <select name="sim_code" class="form-control">
                                                                                        <option selected disabled>Choose Sim Code...</option>
                                                                                        <option value="311">311</option>
                                                                                        <option value="313">313</option>
                                                                                        <option value="333">333</option>
                                                                                        <option value="344">344</option>
                                                                                        <option value="342">342</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="col-md-4 col-form-label">Number</label>
                                                                                <div class="col-md-8 col-lg-9">
                                                                                    <input name="number" type="text" class="form-control" value="">
                                                                                </div>
                                                                            </div>

                                                                        <?php } ?>
                                                                    </div>

                                                                    <?php if (isset($_SESSION['cnic']) == $row['cnic']) { ?>
                                                                        <label for="">Cnic</label>
                                                                        <input name="cnic" class="form-control" value="<?php echo $row['cnic'] ?>" type="text">
                                                                    <?php } else { ?>
                                                                        <div class="row mb-3">
                                                                            <div class="col-md-3">
                                                                                <label class="col-md-4 col-lg-3 col-form-label">Code</label>
                                                                                <div class="col-md-8 ">
                                                                                    <input name="cnic_5" type="text" class="form-control" value="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label class="col-md-4 col-lg-3 col-form-label">CNIC</label>
                                                                                <div class="col-md-8 ">
                                                                                    <input name="cnic_7" type="text" class="form-control" value="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <label class="col-md-4 col-lg-3 col-form-label">CNIC</label>
                                                                                <div class="col-md-8 ">
                                                                                    <input name="cnic_1" type="text" class="form-control" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    <?php } ?>


                                                                    <div class="row mb-3">
                                                                        <div class="col-md-12">
                                                                            <label class="col-md-4 col-lg-3 col-form-label">Address</label>
                                                                            <div class="col-md-12">
                                                                                <input name="address" type="text" class="form-control" value="<?php echo $row['address'] ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row ">
                                                                        <div class="col-md-4">
                                                                            <label class="col-md-4 col-lg-3 col-form-label">City</label>
                                                                            <div class="col-md-8 col-lg-9">
                                                                                <select name="city" class="form-control">
                                                                                    <?php
                                                                                    if (isset($_SESSION['city']) == $row['city']) {

                                                                                        if ($row['city'] == "Karachi") { ?>

                                                                                            <option selected value="Karachi">Karachi</option>
                                                                                            <option value="Lahore">Lahore</option>
                                                                                            <option value="Islamabad">Islamabad</option>

                                                                                        <?php } elseif ($row['city'] == "Lahore") { ?>

                                                                                            <option selected value="Lahore">Lahore</option>
                                                                                            <option value="Karachi">Karachi</option>
                                                                                            <option value="Islamabad">Islamabad</option>

                                                                                        <?php } elseif ($row['city'] == "Islamabad") { ?>

                                                                                            <option selected value="Islamabad">Islamabad</option>
                                                                                            <option value="Karachi">Karachi</option>
                                                                                            <option value="Lahore">Lahore</option>

                                                                                        <?php }
                                                                                    } else { ?>
                                                                                        <option selected disabled>Choose City..</option>
                                                                                        <option value="Karachi">Karachi</option>
                                                                                        <option value="Lahore">Lahore</option>
                                                                                        <option value="Islamabad">Islamabad</option>

                                                                                    <?php }
                                                                                    ?>




                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label class="col-md-4 col-lg-3 col-form-label">Country</label>
                                                                            <div class="col-md-8 col-lg-9">
                                                                                <select name="country" class="form-control">
                                                                                    <option selected value="Pakistan">Pakistan</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label class="col-md-6 col-form-label">Gender</label>
                                                                            <div class="col-md-8 col-lg-9">
                                                                                <div class="form-check form-check-inline">
                                                                                    <?php
                                                                                    if (isset($_SESSION['gender']) != $row['gender']) { ?>
                                                                                        <label class="form-check-label">
                                                                                            <input class="form-check-input" type="radio" name="gender" value="Male"> Male
                                                                                        </label>
                                                                                        <label class="form-check-label" style="margin-left: 40px;">
                                                                                            <input class="form-check-input" type="radio" name="gender" value="Female"> Female
                                                                                        </label>

                                                                                    <?php } else if (isset($row['gender']) == "Male") { ?>
                                                                                        <label class="form-check-label">
                                                                                            <input checked class="form-check-input" type="radio" name="gender" value="Male"> Male
                                                                                        </label>
                                                                                        <label class="form-check-label" style="margin-left: 40px;">
                                                                                            <input class="form-check-input" type="radio" name="gender" value="Female"> Female
                                                                                        </label>

                                                                                    <?php   } else if (isset($row['gender']) == "Female") { ?>
                                                                                        <label class="form-check-label">
                                                                                            <input class="form-check-input" type="radio" name="gender" value="Male"> Male
                                                                                        </label>
                                                                                        <label class="form-check-label" style="margin-left: 40px;">
                                                                                            <input checked class="form-check-input" type="radio" name="gender" value="Female"> Female
                                                                                        </label>

                                                                                    <?php }
                                                                                    ?>



                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row ">
                                                                        <?php
                                                                        if (isset($_SESSION['dob']) == $row['dob']) { ?>
                                                                            <label for="">Date of Birth</label>
                                                                            <input class="form-control" value="<?php echo $row['dob'] ?>" type="text" name="dob" id="">

                                                                        <?php } else {
                                                                        ?>
                                                                            <div class="col-md-4">
                                                                                <label class="col-md-4 col-lg-3 col-form-label">Date</label>
                                                                                <div class="col-md-8 col-lg-9">
                                                                                    <select name="date" class="form-control">
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
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="col-md-4 col-form-label">Month</label>
                                                                                <div class="col-md-8 col-lg-9">
                                                                                    <select name="month" class="form-control">
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
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="col-md-4 col-form-label">Year</label>
                                                                                <div class="col-md-8 col-lg-9">
                                                                                    <select name="year" class="form-control">
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
                                                                        <?php } ?>

                                                                    </div>


                                                                    <div class="row mb-3">


                                                                    </div>
                                                                    <div class="text-center">
                                                                        <button type="submit" style="background-color: #D7B679" name="Save_data" class="btn">Save</button>
                                                                    </div>
                                                                </form><!-- End Profile Edit Form -->

                                                            <?php  }
                                                            ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>



                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <!-- <?php

                                            $pass = $_REQUEST['password'];
                                            $ID = $_SESSION['id'];
                                            $npass = $_REQUEST['newpassword'];
                                            $rnpass = $_REQUEST['renewpassword'];



                                            if (isset($_SESSION['password']) != $pass) {
                                            ?>
                                        <script>
                                            alert("Current Pasword Does Not Match...!");
                                        </script>
                                    <?php  } elseif ($npass != $rnpass) {
                                    ?>
                                        <script>
                                            alert("New Pasword Does Not Match...!");
                                        </script>
                                    <?php
                                            } else {

                                                $passquery = "UPDATE `users` SET `password`='$npass' WHERE `id` = $ID";
                                                $pdo_statement = $pdo_con->prepare($passquery);
                                                $pdo_statement->execute();
                                    ?>
                                        <script>
                                            alert("Password Changed Successfully");
                                        </script>
                                    <?php  }
                                    ?> -->
                                    <form method="POST">

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
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!--End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php } elseif (isset($_SESSION['role']) != "Client") { ?>
    <script>
        window.location.href = "http://localhost/lawyerwebsite/ClientLogin/Client_login.php";
    </script>
<?php } ?>

<?php include "include/footer.php" ?>