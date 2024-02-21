<?php include './includes/header.php';
include "../connection.php";

?>
<?php
 if (isset($_GET['type']) && $_GET['type'] != "") {
    $type = $_GET['type'];
    $id = $_GET['id'];
    if ($type == 'delete') {
        $delete = "DELETE FROM `contact_us` WHERE `id` = $id  ";
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
                        <li class="breadcrumb-item active text-dark">Messages</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group mt-3">
                <?php
                if (isset($message)) { ?>
                    <h4 class="text-center"><?php echo $message ?></h4>
                <?php }
                ?>
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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">Message</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $show = "SELECT * FROM `contact_us` ";
                    $pdo_statement = $pdo_con->prepare($show);
                    $pdo_statement->execute();
                    $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

                    if ($pdo_statement->rowCount() > 0) {
                        foreach ($result as $row) { ?>
                            <tr>

                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['Name'] ?></td>
                                <td><?php echo $row['Email'] ?></td>
                                <td><?php echo $row['Phone_no'] ?></td>
                                <td><?php echo $row['Message'] ?></td>
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



<?php include './includes/footer.php'; ?>