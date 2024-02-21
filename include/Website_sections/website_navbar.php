<style>
    .bg_ak {
        background-color: #151515;
    }

    header.style-4 .nav-right {
        background-color: #151515;

    }

    .dropdown-menu[data-bs-popper] {
        left: -31px !important;
    }

    .dropdown-menu {
        min-width: 8rem;
        background-color: #151515;

    }

    .dropdown-item:hover {
        background-color: #151515;
        color: #D7B679;
    }

    .dropdown-item {
        color: white;
        text-align: center;
    }
</style>

<!--  php start -->
<?php

include "include../connection.php";
error_reporting(0);
$selectquery = $pdo_con->prepare("SELECT * FROM `users` WHERE username='" . $_SESSION['username'] . "' ");
$selectquery->execute();
while (
    $row = $selectquery->fetch(PDO::FETCH_ASSOC)
) {
    $status = $row['status'];
    if ($status == "0") { ?>

        <script type="text/javascript">
            window.location.href = "logout.php";
        </script>

<?php   }
} ?>


<!--  php end -->

<!-- Navbar_Start -->



<header class="header-area style-4 bg_ak">

    <?php if (isset($_SESSION['role']) == "") { ?>
        <div class="nav-left">
            <div class="header-logo">
                <a href="index.php"><img alt="image" src="User/assets/images/icons/header3-logo.svg"></a>
            </div>
            <div class="main-nav mx-auto">
                <div class="mobile-logo-area d-xl-none d-flex justify-content-between align-items-center">
                    <div class="mobile-logo-wrap ">
                        <a href="index.php"><img alt="image" src="User/assets/images/icons/header1-logo.svg"></a>
                    </div>
                    <div class="menu-close-btn">
                        <i class="bi bi-x-lg text-white"></i>
                    </div>
                </div>

                <!-- Navlinks -->

                <ul class="menu-list">


                    <li><a class="<?php if ($activepage == 'index') {
                                        echo 'active';
                                    } ?>" href="index.php">Home</a></li>
                    <li><a class="<?php if ($activepage == 'about') {
                                        echo 'active';
                                    } ?>" href=" about.php">About Us</a></li>
                    <li><a class="<?php if ($activepage == 'practice_areas') {
                                        echo 'active';
                                    } ?>" href=" practice_areas.php">Practice Areas</a></li>
                    <li><a class="<?php if ($activepage == 'attorneys') {
                                        echo 'active';
                                    } ?>" href=" our_attorneys.php">Attorneys</a></li>

                    <li><a class="<?php if ($activepage == 'contact us') {
                                        echo 'active';
                                    } ?>" href="contact_us.php">Contact Us</a></li>
                    <li class="menu-item-has-children">
                        <a href="##">Login</a><i class='bi bi-chevron-down dropdown-icon'></i>
                        <ul class="sub-menu">
                            <li><a href="LawyerLogin/Lawyer_login.php">Lawyer Login</a></li>
                            <li><a href="ClientLogin/client_login.php">Client Login</a></li>

                        </ul>
                    </li>

                    <li class="menu-item-has-children">
                        <a href="##">Registration</a><i class='bi bi-chevron-down dropdown-icon'></i>
                        <ul class="sub-menu">
                            <li><a href="LawyerLogin/Lawyer_register.php">Register As Lawyer</a></li>
                            <li><a href="ClientLogin/client_register.php">Register As Client</a></li>

                        </ul>
                    </li>



                </ul>

                <!-- Navlinks End -->




            </div>


            <div class="mobile-menu-btn d-xl-none d-block">
                <i class="bi bi-list text-white"></i>
            </div>
        </div>




    <?php } elseif ($_SESSION['role'] == "Lawyer") { ?>
        <div class="nav-left">
            <div class="header-logo">
                <a href="index.php"><img alt="image" src="User/assets/images/icons/header3-logo.svg"></a>
            </div>
            <div class="main-nav mx-auto">
                <div class="mobile-logo-area d-xl-none d-flex justify-content-between align-items-center">
                    <div class="mobile-logo-wrap ">
                        <a href="index.php"><img alt="image" src="User/assets/images/icons/header1-logo.svg"></a>
                    </div>
                    <div class="menu-close-btn">
                        <i class="bi bi-x-lg text-white"></i>
                    </div>
                </div>

                <!-- Navlinks -->

                <ul class="menu-list">


                    <li><a class="<?php if ($activepage == 'index') {
                                        echo 'active';
                                    } ?>" href="index.php">Home</a></li>
                    <li><a class="<?php if ($activepage == 'about') {
                                        echo 'active';
                                    } ?>" href=" about.php">About Us</a></li>
                    <li><a class="<?php if ($activepage == 'practice_areas') {
                                        echo 'active';
                                    } ?>" href=" practice_areas.php">Practice Areas</a></li>
                    <li><a class="<?php if ($activepage == 'attorneys') {
                                        echo 'active';
                                    } ?>" href=" our_attorneys.php">Attorneys</a></li>

                    <li><a class="<?php if ($activepage == 'contact us') {
                                        echo 'active';
                                    } ?>" href="contact_us.php">Contact Us</a></li>
                    <li><a class="<?php if ($activepage == 'contact us') {
                                        echo 'active';
                                    } ?>" href="lawyer_appoinmet.php">My Appoinment</a></li>



                    <li><a href="logout.php">logout</a></li>


                </ul>

                <!-- Navlinks End -->




            </div>


            <div class="mobile-menu-btn d-xl-none d-block">
                <i class="bi bi-list text-white"></i>
            </div>
        </div>
        <div class="nav-right">
            <nav class="navbar navbar-expand-lg  ">
                <div class="container-fluid">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                            <li class="mt-3" style="color: #D7B679 ; text-align: center; font-weight: bolder; cursor: pointer;"><?php echo $_SESSION['username']  ?></li>
                            <li class="nav-item dropdown ">
                                <?php
                                $query = "SELECT * FROM `users` WHERE username = '" . $_SESSION['username'] . "' limit 1  ";
                                $pdo_statement = $pdo_con->prepare($query);
                                $pdo_statement->execute();
                                $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) { ?>
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="./Images/lawyer_images/<?php echo $row['image'] ?>" class="rounded-circle" width="50px" alt="image">
                                    </a>
                                <?php }
                                ?>


                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <li style="color: #D7B679 ; text-align: center; font-weight: bolder; cursor: pointer;"><?php echo $_SESSION['role']  ?></li>
                                    <li><a class="dropdown-item" href="Lawyer_profile.php">Profile</a></li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>

                                </ul>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>
        </div>
    <?php   } elseif ($_SESSION['role'] == "Client") { ?>
        <div class="nav-left">
            <div class="header-logo">
                <a href="index.php"><img alt="image" src="User/assets/images/icons/header3-logo.svg"></a>
            </div>
            <div class="main-nav mx-auto">
                <div class="mobile-logo-area d-xl-none d-flex justify-content-between align-items-center">
                    <div class="mobile-logo-wrap ">
                        <a href="index.php"><img alt="image" src="User/assets/images/icons/header1-logo.svg"></a>
                    </div>
                    <div class="menu-close-btn">
                        <i class="bi bi-x-lg text-white"></i>
                    </div>
                </div>

                <!-- Navlinks -->

                <ul class="menu-list">


                    <li><a class="<?php if ($activepage == 'index') {
                                        echo 'active';
                                    } ?>" href="index.php">Home</a></li>
                    <li><a class="<?php if ($activepage == 'about') {
                                        echo 'active';
                                    } ?>" href=" about.php">About Us</a></li>
                    <li><a class="<?php if ($activepage == 'practice_areas') {
                                        echo 'active';
                                    } ?>" href=" practice_areas.php">Practice Areas</a></li>
                    <li><a class="<?php if ($activepage == 'attorneys') {
                                        echo 'active';
                                    } ?>" href=" our_attorneys.php">Attorneys</a></li>

                    <li><a class="<?php if ($activepage == 'contact us') {
                                        echo 'active';
                                    } ?>" href="contact_us.php">Contact Us</a></li>
                    <li><a class="<?php if ($activepage == 'contact us') {
                                        echo 'active';
                                    } ?>" href="client_appoinment.php">My Appoinment</a></li>



                    <li><a href="logout.php">logout</a></li>


                </ul>

                <!-- Navlinks End -->




            </div>


            <div class="mobile-menu-btn d-xl-none d-block">
                <i class="bi bi-list text-white"></i>
            </div>
        </div>
        <div class="nav-right">
            <nav class="navbar navbar-expand-lg  ">
                <div class="container-fluid">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                            <li class="mt-3" style="color: #D7B679 ; text-align: center; font-weight: bolder; cursor: pointer;"><?php echo $_SESSION['username']  ?></li>
                            <li class="nav-item dropdown ">

                                <?php
                                $query = "SELECT * FROM `users` WHERE username = '" . $_SESSION['username'] . "' limit 1  ";
                                $pdo_statement = $pdo_con->prepare($query);
                                $pdo_statement->execute();
                                $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) { ?>
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="./Images/client_images/<?php echo $row['image'] ?>" class="rounded-circle" width="50px" alt="image">
                                    </a>
                                <?php }
                                ?>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <li style="color: #D7B679 ; text-align: center; font-weight: bolder; cursor: pointer;"><?php echo $_SESSION['role']  ?></li>
                                    <li class="text-white text-center"><a href="Client_profile.php">Profile</a></li>

                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>

                                </ul>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>
        </div>



    <?php } elseif ($_SESSION['role'] == "Admin") { ?>
        <div class="nav-left">
            <div class="header-logo">
                <a href="index.php"><img alt="image" src="User/assets/images/icons/header3-logo.svg"></a>
            </div>
            <div class="main-nav mx-auto">
                <div class="mobile-logo-area d-xl-none d-flex justify-content-between align-items-center">
                    <div class="mobile-logo-wrap ">
                        <a href="index.php"><img alt="image" src="User/assets/images/icons/header1-logo.svg"></a>
                    </div>
                    <div class="menu-close-btn">
                        <i class="bi bi-x-lg text-white"></i>
                    </div>
                </div>

                <!-- Navlinks -->

                <ul class="menu-list">


                    <li><a class="<?php if ($activepage == 'index') {
                                        echo 'active';
                                    } ?>" href="index.php">Home</a></li>
                    <li><a class="<?php if ($activepage == 'about') {
                                        echo 'active';
                                    } ?>" href=" about.php">About Us</a></li>
                    <li><a class="<?php if ($activepage == 'practice_areas') {
                                        echo 'active';
                                    } ?>" href=" practice_areas.php">Practice Areas</a></li>
                    <li><a class="<?php if ($activepage == 'attorneys') {
                                        echo 'active';
                                    } ?>" href=" our_attorneys.php">Attorneys</a></li>

                    <li><a class="<?php if ($activepage == 'contact us') {
                                        echo 'active';
                                    } ?>" href="contact_us.php">Contact Us</a></li>



                    <li><a href="logout.php">logout</a></li>


                </ul>

                <!-- Navlinks End -->




            </div>


            <div class="mobile-menu-btn d-xl-none d-block">
                <i class="bi bi-list text-white"></i>
            </div>
        </div>
        <div class="nav-right">
            <nav class="navbar navbar-expand-lg  ">
                <div class="container-fluid">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                            <li class="mt-3" style="color: #D7B679 ; text-align: center; font-weight: bolder; cursor: pointer;"><?php echo $_SESSION['username']  ?></li>
                            <li class="nav-item dropdown ">

                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="User/assets/images/face22.jpg" class="rounded-circle" width="50px" alt="image">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <li style="color: #D7B679 ; text-align: center; font-weight: bolder; cursor: pointer;"><?php echo $_SESSION['role']  ?></li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>

                                </ul>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>
        </div>



    <?php } ?>





</header>


<!-- Navbar_end -->