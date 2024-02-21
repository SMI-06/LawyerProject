<?php 
include 'includes/header.php';
?>
<?php
 if (isset($_GET['type']) && $_GET['type'] != "") {
    $type = $_GET['type'];
    $id = $_GET['id'];
    if ($type == 'delete') {
        $delete = "DELETE FROM `users` WHERE `id` = $id  ";
        $pdo_statement = $pdo_con->prepare($delete);
        $pdo_statement->execute();
?>
        <!-- <script type="text/javascript">
            alert("Client has been Delete!!!");
            
        </script> -->

        <script>
            window.location.href=("http://localhost/lawyerwebsite/Admin/Dashboard/Contact_us_messages.php")
        </script>

<?php  }
} ?>

<div class="container">
    <div class="row">
        <div style="background-color: #D7B679; border-radius: 10px;" class="col-md-12">
            <div class="pagetitle mt-2 ">
                <h1 class="text-dark">Dashboard</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-dark" href="index.php">Home</a></li>
                        <li class="breadcrumb-item active text-dark">Appoinments</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Lawyer Id</th>
                        <th scope="col">Lawyer Name</th>
                        <th scope="col">Case Type</th>
                        <th scope="col">Client Id</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Client Phone</th>
                        <th scope="col">Client Email</th>
                        <th scope="col">Client Cnic</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $show = "SELECT * FROM `appoinments` ";
                    $pdo_statement = $pdo_con->prepare($show);
                    $pdo_statement->execute();
                    $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

                    if ($pdo_statement->rowCount() > 0) {
                        foreach ($result as $row) { ?>
                            <tr>
                                <td><?php echo $row['Id'] ?></td>
                                <td><?php echo $row['Lawyer_Id'] ?></td>
                                <td><?php echo $row['Lawyer_name'] ?></td>
                                <td><?php echo $row['Case_type'] ?></td>
                                <td><?php echo $row['Client_Id'] ?></td>
                                <td><?php echo $row['Client_name'] ?></td>
                                <td><?php echo $row['Client_phone'] ?></td>
                                <td><?php echo $row['Client_email'] ?></td>
                                <td><?php echo $row['Client_cnic'] ?></td>
                                <td><?php echo $row['Date'] ?></td>
                                <td><?php echo $row['Time'] ?></td>
                                <td><?php echo $row['Status'] ?></td>
                                <td><button name="btn_delete" class="btn" style="background-color: #D7B679;">
                                        <?php echo "<a class='badge badge-danger' href='?type=delete&id=" . $row['id'] . "'>Delete</a>&nbsp;"; ?>
                                    </button></td>


                            </tr>




                    <?php  }
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</div>












<?php include 'includes/footer.php'; ?>

