<?php
$title = "Lawyers Website - Book Appoinment";
$activepage = 'Book Appoinment';
$pagename = 'Book Appoinment';
$present_page = 'Appoinment';
$page = 'appoinment.php';
include "include/header.php";
include "include/connection.php";
session_start();
?>




<?php
if (isset($_REQUEST['appoinment'])) {
    $Lawyer_name = $_REQUEST['L_name'];
    $case_type = $_REQUEST['case_type'];
    $date = $_REQUEST['date'];
    $time = $_REQUEST['time'];
    $lawyer_id = $_GET['id'];
    $status = "Case Pending";


    $insert = "INSERT INTO `appoinments`( `Lawyer_Id`, `Lawyer_name`, `Case_type`, `Client_Id`, `Client_name`, `Client_phone`, `Client_email`, `Client_cnic`, `Date`, `Time`,`Status`) VALUES ('" . $lawyer_id . "',:L_name,:case,'" . $_SESSION['id'] . "','" . $_SESSION['username'] . "','" . $_SESSION['contact'] . "','" . $_SESSION['email'] . "','" . $_SESSION['cnic'] . "',:date,:time,'".$status."')";

    $pdo_statement = $pdo_con->prepare($insert);
    $pdo_statement->bindValue(':L_name',$Lawyer_name,PDO::PARAM_STR);
    $pdo_statement->bindValue(':case', $case_type, PDO::PARAM_STR);
    $pdo_statement->bindValue(':date', $date, PDO::PARAM_STR);
    $pdo_statement->bindValue(':time', $time, PDO::PARAM_STR);
    $pdo_statement->execute();

?>
    <script>
        alert("Appoinment Added Successfully");
    </script>
<?php }
?>











<style>
    .Detail {
        color: #d7b679;
        margin-top: 2rem;
    }
</style>

<!-- Breadcrum_Start -->
<?php include_once "include/Website_sections/website_breadcrum_section.php" ?>
<!-- Breadcrum_End -->



<div class="container">
    <form method="post">
        <div class="row">
            <div class="col-md-12">
                <h2 class="Detail">Lawyer Detail:</h2>
                <?php
                $id = $_GET['id'];
                $show = "SELECT * FROM `lawyer_details` where `User_Id` = $id";
                $pdo_statement = $pdo_con->prepare($show);
                $pdo_statement->execute();
                $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

                if ($pdo_statement->rowCount() > 0) {
                    foreach ($result as $row) {  ?>
                        <div class="form-group row m-3">
                            <label class="col-sm-2 col-form-label col-form-label">Lawyer Name</label>
                            <div class="col-sm-4">
                                <input type="hidden" name="id" value="<?php echo $row['User_Id'] ?>">
                                <input type="text" readonly name="L_name" class="form-control" value="<?php echo $row['first_name'] . " " . $row['last_name'] ?>">
                            </div>
                            <label class="col-sm-2 col-form-label col-form-label">Lawyer Phone</label>
                            <div class="col-sm-4">
                                <input type="email" readonly name="L_phone" class="form-control form-control-sm" value="<?php echo $row['mobile_number'] ?>">
                            </div>
                        </div>
                        <div class="form-group row m-3">
                            <label class="col-sm-2 col-form-label col-form-label">Lawyer Email</label>
                            <div class="col-sm-4">
                                <input type="email" readonly name="L_email" class="form-control form-control-sm" value="<?php echo $row['lawyer_email'] ?>">
                            </div>
                            <label class="col-sm-2 col-form-label col-form-label">Lawyer CNIC</label>
                            <div class="col-sm-4">
                                <input type="email" readonly name="L_cnic" class="form-control form-control-sm" value="<?php echo $row['cnic'] ?>">
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="Detail">Client Detail:</h2>

                <?php

                $show = "SELECT * FROM `users` WHERE user_role = 'Client' AND id = '" . $_SESSION['id'] . "' limit 1";
                $pdo_statement = $pdo_con->prepare($show);
                $pdo_statement->execute();
                $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

                if ($pdo_statement->rowCount() > 0) {
                    foreach ($result as $row) { ?>
                        <div class="form-group row m-3">

                            <label class="col-sm-2 col-form-label col-form-label">Client Name</label>
                            <div class="col-sm-4">
                                <input type="email" readonly name="C_name" class="form-control form-control-sm" value="<?php echo $row['username'] ?>">
                            </div>
                            <label class="col-sm-2 col-form-label col-form-label">Client Phone</label>
                            <div class="col-sm-4">
                                <input type="email" readonly name="C_phone" class="form-control form-control-sm" value="<?php echo $row['mobile_number'] ?>">
                            </div>
                        </div>
                        <div class="form-group row m-3">
                            <label class="col-sm-2 col-form-label col-form-label">Client Email</label>
                            <div class="col-sm-4">
                                <input type="email" readonly name="C_email" class="form-control form-control-sm" value="<?php echo $row['email'] ?>">
                            </div>
                            <label class="col-sm-2 col-form-label col-form-label">Client CNIC</label>
                            <div class="col-sm-4">
                                <input type="email" readonly name="C_cnic" class="form-control form-control-sm" value="<?php echo $row['cnic'] ?>">
                            </div>
                        </div>
                        <div class="form-group row m-3">
                            <label class="col-sm-2 col-form-label col-form-label">Appoinment Date</label>
                            <div class="col-sm-4">
                                <input type="date" name="date" class="form-control">
                            </div>
                            <label class="col-sm-2 col-form-label col-form-label">Time</label>
                            <div class="col-sm-4">
                                <input type="time" name="time" class="form-control " value="<?php echo $row[''] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label col-form-label">Case Type</label>
                            <div class="col-sm-10">
                                <select name="case_type">
                                    <option disabled selected>Choose Case Type</option>
                                    <option value="Criminal Case">Criminal Case</option>
                                    <option value="Property Case">Property Case</option>
                                    <option value="Divorce Case">Divorce Case</option>
                                </select>
                            </div>
                        </div>
                <?php }
                } ?>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="Book Appoinment" name="appoinment" class="btn m-5" style="width: 100%; background-color:#d7b679;">
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>





<?php include "include/footer.php" ?>