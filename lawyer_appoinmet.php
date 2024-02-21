<?php
$title = "Lawyers Website - Client Appoinments";
$activepage = 'Client Appoinments';
$pagename = 'Client Appoinments';
$present_page = 'Client Appoinments';
$page = 'client_appoinment.php';
include "include/header.php";
include "include/connection.php";
session_start();
?>


<style>
    .apoinment{
        color: #CA9457;
        font-size: 50px;
        text-align: center;
    }
</style>
<?php

?>
<!-- Breadcrum_Start -->
<?php include_once "include/Website_sections/website_breadcrum_section.php" ?>
<!-- Breadcrum_End -->



<div class="container mt-5 mb-5">
    <div class="row ">
        <div class="col-md-12 mt-5 mb-5">
            <h3 class="apoinment">Appoinment Booked</h3>
            <table class="table table-hover table-striped table-inverse table-responsive m-5 text-center">
                <thead style="background-color: black; color: white;" class="thead-inverse">
                    <tr>
                    <th>Lawyer ID</th>
                    <th>Lawyer Name</th>
                        <th>Client ID</th>
                        <th>Case Type</th>
                        <th>Client Name</th>
                        <th>Client Phone</th>
                        <th>Client Email</th>
                        <th>Client Cnic</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Case Status</th>
                    </tr>
                    </thead>
                    <tbody  style="background-color: #CA9457;">
                        <?php
                       
                        $show = "SELECT * FROM `appoinments` where Lawyer_id =  '".$_SESSION['id']."' ";
                        $pdo_statement = $pdo_con->prepare($show);
                        $pdo_statement->execute();
                        $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
                        
                        if ($pdo_statement->rowCount() > 0) {
                            foreach ($result as $row) {  ?>
                        
                        <tr class="fw-bolder">
                            <td scope="row"><?php echo $row['Lawyer_Id']?></td>
                            <td><?php echo $row['Lawyer_name']?></td>
                            <td><?php echo $row['Client_Id']?></td>
                            <td><?php echo $row['Case_type']?></td>
                            <td><?php echo $row['Client_name']?></td>
                            <td><?php echo $row['Client_phone']?></td>
                            <td><?php echo $row['Client_email']?></td>
                            <td><?php echo $row['Client_cnic']?></td>
                            <td><?php echo $row['Date']?></td>
                            <td><?php echo $row['Time']?></td>
                            <td class="bg-danger text-white " style="font-weight: bold;"><?php echo $row['Status']?></td>
                          

                        </tr>
                        <?php 
                        }} 
                        ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>













<?php include "include/footer.php" ?>