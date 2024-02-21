<?php
$title = "Lawyers Website - Practice Areas";
$activepage = 'practice_areas';
$pagename = 'Practice Areas';
$present_page = 'Practice Areas';
$page = 'practice_areas.php';
include_once "include/header.php"

?>

<style>
    
    .practice-single:hover{
        color:  white !important;
    }
   
    
</style>


<!-- Breadcrum_Start -->
<?php include_once "include/Website_sections/website_breadcrum_section.php" ?>
<!-- Breadcrum_End -->
<!-- Practice_Areas Start -->
<div class="practice-area-section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="section-title1 text-center">
                    <h2>Practice Area</h2>
                    <p>In consequat tincidunt turpis sit amet imperdiet. Praesent Class officelan nonatoureanor mauris laoreet, iaculis libero quis.Curabitur et tempus eri consequat tincidunt.</p>
                </div>
            </div>
        </div>
       
        <div class="row justify-content-center g-4">
        <?php

$show = "SELECT * FROM `practice_areas` ";
$pdo_statement = $pdo_con->prepare($show);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

if ($pdo_statement->rowCount() > 0) {
    foreach ($result as $row) { ?>
    
             <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="practice-single  wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                    <div class="header">
                   
                        <div  class="icon-area d-flex justify-content-center custom_icon" style="font-size: 50px;"  > 
                         
                            <?php echo $row['icon'] ?>
                            
                        </div>
                        <h4 class="text-center">  <?php echo $row['name'] ?></h4>
                    </div>
                    <div class="body">
                        <p><?php echo $row['description'] ?></p>

                       

                    </div>
                </div>
            </div> 
            <?php  }
                                }
                                ?>
         

           
        </div>
    </div>
</div>

<!-- Practice_Areas Start -->




<?php include "include/footer.php" ?>