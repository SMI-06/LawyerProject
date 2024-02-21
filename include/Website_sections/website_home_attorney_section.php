<div class="attorneys-section pt-120 pb-120">
    <div class="container-fluid">
        <div class="row">
            <div class="section-title-area sibling2">
                <div class="marquee">
                    <div>
                        <span>Creative Team</span>
                        <span>Creative Team</span>
                    </div>
                </div>
                <div class="section-title sibling2">
                    <span>CREATIVE TEAM</span>
                    <h2>We have the most experienced lawyers.</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">


            <?php
            $show = "SELECT * FROM `lawyer_details` ORDER BY `lawyer_details`.`lawyer_case_done` DESC";
            $pdo_statement = $pdo_con->prepare($show);
            $pdo_statement->execute();
            $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

            if ($pdo_statement->rowCount() > 0) {
                foreach ($result as $row) {  ?>
                    <div class="col-md-3">

                        <div class="attorney-single ">
                            <img src="./Images/lawyer_images/<?php echo $row['image'] ?>" class="casestudy1" alt="image">
                            <div class="content">
                                <h5 style="background-color: #d7b679a8; border-radius: 5px ;color: white; font-weight: bolder;"><?php echo $row['lawyer_case_done'] ?> Case Won</h5>

                                <h4><a href="lawyer_details.php?id=<?php echo $row['User_Id'] ?>"><?php echo $row['first_name'] . " " . $row['last_name'] ?></a></h4>
                                <p style="color: #D7B679; font-weight: bolder;"><?php echo $row['lawyer_type'] ?></p>
                                <h5 class="text-white mt-2"><?php echo $row['short_about'] ?></h5>
                            </div>

                        </div>
                    </div>
            <?php }
            } ?>


        </div>
    </div>
</div>