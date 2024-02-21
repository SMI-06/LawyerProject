<?php session_start()?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php if (isset($title)) {
   echo $title;
} else{
    echo "Lawyers Website";
} ?></title>
<link rel="icon" href="User/assets/images/icons/logo-icon.svg" type="image/gif" sizes="20x20">
<link rel="stylesheet" href="User/assets/css/animate.css">

<link rel="stylesheet" href="User/assets/css/all.css">

<link rel="stylesheet" href="User/assets/css/bootstrap.min.css">

<link rel="stylesheet" href="User/assets/css/boxicons.min.css">

<link rel="stylesheet" href="User/assets/css/bootstrap-icons.css">

<link rel="stylesheet" href="User/assets/css/jquery-ui.css">

<link rel="stylesheet" href="User/assets/css/swiper-bundle.css">
<link rel="stylesheet" href="User/assets/css/slick-theme.css">
<link rel="stylesheet" href="User/assets/css/slick.css">

<link rel="stylesheet" href="User/assets/css/nice-select.css">

<link rel="stylesheet" href="User/assets/css/magnific-popup.css">

<link rel="stylesheet" href="User/assets/css/odometer.css">

<link rel="stylesheet" href="User/assets/css/style.css">
</head>
<body>

<div class="egns-preloader">
<div class="container">
<div class="row d-flex justify-content-center">
<div class="col-6">
<div class="circle-border">
<div class="moving-circle"></div>
<div class="moving-circle"></div>
<div class="moving-circle"></div>
<svg width="180px" height="150px" viewBox="0 0 187.3 93.7" preserveAspectRatio="xMidYMid meet" style="left: 50%; top: 50%; position: absolute; transform: translate(-50%, -50%) matrix(1, 0, 0, 1, 0, 0);">
<path stroke="#D90A2C" id="outline" fill="none" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" />
<path id="outline-bg" opacity="0.05" fill="none" stroke="#959595" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" />
</svg>
</div>
</div>
</div>
</div>
</div>

<?php include "include/Website_sections/website_navbar.php" ?>
