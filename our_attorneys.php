<?php
$title = "Lawyers Website - Attorneys";
$activepage = 'attorneys';
$pagename = 'Our Attorneys';
$present_page = 'Our Attorneys';
$page = 'our_attorneys.php';
include_once "include/header.php"

?>

<!-- Breadcrum_Start -->

<?php include_once "include/Website_sections/website_breadcrum_section.php" ?>

<!-- Breadcrum_End -->

<!-- Attorneys_Start -->

<div class="team-section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center mb-60">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10">
                <div class="section-title2 text-center">
                    <span>Our Attorneys</span>
                    <h2>Find Our Intellectual Lawyer for you.</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row   mb-60">
            <?php
            $show = "SELECT * FROM `lawyer_details` ";
            $pdo_statement = $pdo_con->prepare($show);
            $pdo_statement->execute();
            $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

            if ($pdo_statement->rowCount() > 0) {
                foreach ($result as $row) {  ?>


                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-10  wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                        <div class="attorney-single sibling2">
                            <img src="./Images/lawyer_images/<?php echo $row['image'] ?>" class="casestudy1" alt="image">
                            <div class="content">
                                <h4><a href="lawyer_details.php?id=<?php echo $row['User_Id'] ?>"><?php echo $row['first_name'] . " " . $row['last_name'] ?></a></h4>
                                <p style="color: #D7B679; font-weight: bolder;"><?php echo $row['lawyer_type'] ?></p>
                                <h5 class="text-white mt-2"><?php echo $row['short_about'] ?></h5>
                            </div>
                        </div>
                    </div>

            <?php }
            } ?>

        </div>

        <!-- <div class="row">
            <div class="col-12 text-center">
                <a href="team.html" class="eg-btn capsule btn--outline sibling3 btn--md load-btn">Load More<svg width="20" height="16" viewBox="0 0 22 13" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.9805 6.64708C21.955 6.74302 20.6834 7.78829 18.0766 9.85862C13.9311 13.156 14.0201 13.0954 13.5751 12.949C13.1809 12.8177 13.0219 12.5097 13.1809 12.1814C13.2127 12.1057 14.6369 10.9342 16.3408 9.5809L19.4309 7.11669V5.90479L16.3091 3.41534C14.23 1.75907 13.1682 0.885493 13.1427 0.789551C13.041 0.466377 13.2635 0.143203 13.6577 0.0472607C13.7595 0.0270623 13.8485 0.00181433 13.8612 0.00181433C14.0201 -0.0385824 14.8467 0.582518 18.1148 3.18306C20.6898 5.23824 21.955 6.27846 21.9805 6.36935C22.0059 6.45015 22.0059 6.57134 21.9805 6.64708Z"></path>
                        <path d="M17.4313 5.90479V7.11669L2.71236 7.10659C2.27365 7.10608 1.84766 7.10558 1.43438 7.10507C1.19278 7.10507 0.954985 7.10457 0.721643 7.10457C0.320448 7.09396 0 6.83189 0 6.51074C0 6.34662 0.0839268 6.19817 0.218718 6.09061C0.349695 5.98659 0.528993 5.92044 0.728001 5.9169L1.23283 5.9164L2.706 5.91488L17.4313 5.90479Z"></path>
                    </svg>
                </a>
            </div>
        </div>  -->
    </div>
</div>

<!-- Attorneys_End -->




<?php include "include/footer.php" ?>