<?php
$title = "Lawyers Website - Lawyer Details";
$activepage = 'lawyer_details';
$pagename = 'Lawyer Details';
$present_page = 'Lawyer Details';
$page = 'lawyer_details.php';
include "include/header.php";
include "include/connection.php";
?>

<!-- Breadcrum_Start -->
<?php include_once "include/Website_sections/website_breadcrum_section.php" ?>
<!-- Breadcrum_End -->



<?php
$id = $_GET['id'];
$show = "SELECT * FROM `lawyer_details` WHERE `User_Id` = $id";
$pdo_statement = $pdo_con->prepare($show);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

if ($pdo_statement->rowCount() > 0) {
    foreach ($result as $row) {  ?>
        <div class="lawyer-details-section pt-120 pb-120">
            <div class="container">
                <div class="lawyer-info">
                    <div class="row justify-content-center gy-5">
                        <div class="col-xl-5 text-xl-start text-center">
                            <img src="./Images/lawyer_images/<?php echo $row['image'] ?>" class="img-fluid rounded-2" alt="image">
                        </div>
                        <div class="col-xl-7">
                            <div class="lawyer-profile text-xl-start text-center">
                                <input type="hidden" value="<?php echo $row['User_Id'] ?>">
                                <h2><?php echo $row['first_name'] . " " . $row['last_name'] ?></h2>
                                <span><?php echo $row['lawyer_type'] ?></span>
                                <p class="para" ><?php echo $row['about_me'] ?></p>
                                <!-- <div class="lawyer-counter">
                                    <div class="row g-4 d-flex justify-content-xl-start justify-content-center">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-start d-flex justify-content-xl-start justify-content-center">
                                            <div class="lawyer-counter-single">
                                                <div class="coundown d-flex flex-column">
                                                    <h3 class="odometer" data-odometer-final="50">5</h3>
                                                    <h5>Case Won</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-start d-flex justify-content-xl-start justify-content-center">
                                            <div class="lawyer-counter-single">
                                                <div class="coundown d-flex flex-column">
                                                    <h3 class="odometer" data-odometer-final="15">1</h3>
                                                    <h5>Case Lost</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-start d-flex justify-content-xl-start justify-content-center">
                                            <div class="lawyer-counter-single">
                                                <div class="coundown d-flex flex-column">
                                                    <h3 class="odometer" data-odometer-final="150">10</h3>
                                                    <h5>Happy Client</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 text-start d-flex justify-content-xl-start justify-content-center">
                                            <div class="lawyer-counter-single">
                                                <div class="coundown d-flex flex-column">
                                                    <h3 class="odometer" data-odometer-final="10">1</h3>
                                                    <h5>Case Pending</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="lawyer-short-details">
                                    <h4>Short Details</h4>
                                    <ul class="details-list">
                                        <li>
                                            <span>Position: </span>
                                            <h5><?php echo $row['lawyer_type'] ?></h5>
                                        </li>
                                        <li>
                                            <span>Experience: </span>
                                            <h5><?php echo $row['experience_level'] ?></h5>
                                        </li>
                                        <li>
                                            <span>Email: </span>
                                            <h5><?php echo $row['lawyer_email'] ?></h5>
                                        </li>
                                        <li>
                                            <span>Practice Area:</span>
                                            <h5>Family Lawyer, Personal Injury</h5>
                                        </li>
                                        <li>
                                            <span>Address:</span>
                                            <h5><?php echo $row['address'] . ', ' . $row['city'] . ', ' . $row['country']?></h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="nav flex-lg-column flex-md-row nav-pills gap-lg-4 gap-3 justify-content-lg-start justify-content-center align-items-center wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Education</button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">Specialization</button>
                            <button class="nav-link" id="v-pills-order-tab" data-bs-toggle="pill" data-bs-target="#v-pills-order" type="button" role="tab" aria-controls="v-pills-order" aria-selected="true">Achivement</button>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active text-lg-start text-center" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
                                <h3 class="lawyer-edu-title">General Education</h3>
                                <ul class="lawyer-edu-list">
                                    <li><?php echo $row['highest_qualification']?></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade text-lg-start text-center" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <h3 class="lawyer-edu-title">Specialization</h3>
                                <ul class="lawyer-edu-list">
                                    <li><?php echo $row['specialization']?></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade text-lg-start text-center" id="v-pills-order" role="tabpanel" aria-labelledby="v-pills-order-tab">
                                <h3 class="lawyer-edu-title">Court Practice</h3>
                                <ul class="lawyer-edu-list">
                                    <li><h4>Case Won</h4><?php echo $row['lawyer_case_done']?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ">
                        <a href="appoinment.php?id=<?php echo $row['User_Id']?>"><input type="submit" value="Book Appoinment" class="btn" style="width: 100%; border:none; font-size:120%; background-color:#CA9457; "></a>
                    </div>
                </div>
            </div>
        </div>
<?php }
} ?>


<?php include "include/footer.php" ?>