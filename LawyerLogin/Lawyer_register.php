<?php
session_start();
include "../include/connection.php";
$role = "Lawyer";
if (isset($_REQUEST['btn_register'])) {
    $username = $_REQUEST['lusername'];
    $email = $_REQUEST['lemail'];
    $password = $_REQUEST['lpassword'];
    $confirm_password = $_REQUEST['lconfirm_password'];

    $email_check = $pdo_con->prepare("SELECT * FROM `users` WHERE `email` = ?");
    $email_check->execute([$email]);
    $duplicate = $pdo_con->prepare("SELECT * FROM `users` WHERE `username` = ? and `status` = '1'");
    $duplicate->execute([$username]);

    if ($duplicate->rowCount() > 0) {

        $message = "<div class='alert alert-danger'> Username already Exist.</div>";
    } else if ($email_check->rowCount() > 0) {

        $message = "<div class='alert alert-danger'> Email already Exist.</div>";
    } else {
        if ($username == "" || $email == "" || $password == "" || $confirm_password == "") {
            $message = "<div class='alert alert-danger'>*All fields are required.</div>";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = "<div class='alert alert-danger'>All fields are required.</div>";
            } else if ($password !== $confirm_password) {
                $message = "<div class='alert alert-danger'>Password and confirm password do not match.</div>";
            } else {
                $insert = "INSERT INTO `users`( `username`, `email`, `password`, `user_role`,`status`) VALUES (:username,:email,:pass,:userrole,:userstatus)";
                $pdo_statement = $pdo_con->prepare($insert);
                $pdo_statement->bindValue(':username', $username, PDO::PARAM_STR);
                $pdo_statement->bindValue(':email', $email, PDO::PARAM_STR);
                $pdo_statement->bindValue(':pass', $password, PDO::PARAM_STR);
                $pdo_statement->bindValue(':userrole', $role, PDO::PARAM_STR);
                $pdo_statement->bindValue(':userstatus', 1);
                $pdo_statement->execute();
                $message = "<div class='alert alert-success'>Lawyer Registeration successfully completed.</div>";
            }
        }
    }
}


?>

<?php if (isset($_SESSION['role']) == "Lawyer") {

    header("Location:../index.php");
} else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Lawyers Website - Lawyer Register</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="./assets/vendors/feather/feather.css">
        <link rel="stylesheet" href="./assets/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="./assets/css/vertical-layout-light/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="./assets/images/logo-icon.svg" />
    </head>

    <body>
        <div class="container-scroller text-white">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div style="background-color:  #D7B679;" class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div style="background-color: #151515;" class="auth-form-light text-left py-5 px-4 px-sm-5">
                                <div class="brand-logo text-center">
                                    <img src="./assets/images/header3-logo.svg" alt="logo">
                                </div>
                                <h3 class="text-center">Lawyer Registeration</h3>


                                <form class="pt-3" method="post">
                                    <div class="form-group">
                                        <input name="lusername" type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input name="lemail" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                                    </div>



                                    <div class="form-group">
                                        <input name="lpassword" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input name="lconfirm_password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm Password">
                                    </div>

                                    <div class="mt-3">
                                        <button style="background-color:  #D7B679;" name="btn_register" type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light">
                                        Already have an account? <a href="Lawyer_login.php" class="" style="color:  #D7B679;">Login</a>
                                    </div>
                                    <div class="form-group mt-3">
                                        <?php
                                        if (isset($message)) { ?>
                                            <h4 class="text-center"><?php echo $message ?></h4>
                                        <?php }
                                        ?>
                                    </div>
                                </form>
                                <div class="text-center mt-4 font-weight-light">
                                    <a target="_blank" href="../index.php" class="" style="color:  #D7B679;">Back To HomePage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="./assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="./assets/js/off-canvas.js"></script>
        <script src="./assets/js/hoverable-collapse.js"></script>
        <script src="./assets/js/template.js"></script>
        <script src="./assets/js/settings.js"></script>
        <script src="./assets/js/todolist.js"></script>
        <!-- endinject -->
    </body>

    </html>


<?php } ?>