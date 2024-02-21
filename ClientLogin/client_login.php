<?php
session_start();
include "../include/connection.php";

if (isset($_REQUEST['btn_login'])) {
    $email = $_REQUEST['cemail'];
    $password = $_REQUEST['cpass'];
    $selectquery = $pdo_con->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
    $selectquery->execute([$email, $password]);
    $row = $selectquery->fetch(PDO::FETCH_ASSOC);
    if ($selectquery->rowCount() > 0) {


        if ($row['user_role'] == "Client") {
            
            
            $_SESSION['id'] = $row['id'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['country'] = $row['country'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['firstname'] = $row['first_name'];
            $_SESSION['lastname'] = $row['last_name'];
            $_SESSION['role'] = $row['user_role'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['contact']=$row['mobile_number'];
            $_SESSION['cnic']=$row['cnic'];
            $_SESSION['city']=$row['city'];
            $_SESSION['dob'] = $row['dob'];
            $_SESSION['gender'] = $row['gender'];
            header("Location:../index.php");
        } else {
            $message = "<div class='alert alert-danger'>Please Register First</div>";

        }
    } else {
        $message = "<div class='alert alert-danger'>Please Enter Correct Email And Password</div>";
    }
}




?>

<?php if (isset($_SESSION['role']) == "Client") {

    header("Location:../index.php");
} else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Lawyers Website - Client Login</title>
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
                        <div class="col-lg-4 mx-auto ">
                            <div style="background-color: #151515;" class="auth-form-light text-left py-5 px-4 px-sm-5 ">
                                <div class="brand-logo text-center">
                                    <img src="./assets/images/header3-logo.svg" alt="logo">
                                </div>
                                <h3 class="text-center">Client Login</h3>
                                <h6 class="font-weight-light mt-3">Sign in to continue.</h6>
                                <form class="pt-3 " method="post">
                                    <div class="form-group">
                                        <input name="cemail" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter Your Email">
                                    </div>
                                    <div class="form-group">
                                        <input name="cpass" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Enter Your Password">
                                    </div>
                                    <div class="mt-3">
                                        <button name="btn_login" type="submit" style="background-color:  #D7B679;" class="btn btn-block  btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                                    </div>
                                    <div class="form-group mt-3">
                                        <?php
                                        if (isset($message)) { ?>
                                            <h4 class="text-center"><?php echo $message ?></h4>
                                        <?php }
                                        ?>
                                    </div>
                                    <div class="my-2 d-flex justify-content-between align-items-center">

                                        <a href="client_forgetpassword.php" class="auth-link text-white">Forgot password?</a>
                                    </div>

                                    <div class="text-center mt-4 font-weight-light">
                                        Don't have an account? <a href="client_register.php" class="" style="color:  #D7B679;">Create</a>
                                    </div>
                                </form>
                                <div class="text-center mt-4 font-weight-light">
                                    <a href="../index.php" class="" style="color:  #D7B679;">Back To HomePage</a>
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