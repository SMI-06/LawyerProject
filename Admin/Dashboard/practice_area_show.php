<?php include "../connection.php";

include './includes/header.php';
?>
<?php
if (isset($_GET['type']) && $_GET['type'] != "") {
    $type = $_GET['type'];
    $id = $_GET['id'];
    if ($type == 'delete') {
        $delete = "DELETE FROM `practice_areas` WHERE `id` = $id ";
        $pdo_statement = $pdo_con->prepare($delete);
        $pdo_statement->execute();
    ?>
    <script type="text/javascript">
           alert("Record Delete")
           window.location.href=("http://localhost/lawyerwebsite/Admin/Dashboard/practice_area_show.php");
    </script>

    <?php }
}
?>















<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />


<div class="container">
    <div class="row">
        <div style="background-color: #D7B679; border-radius: 10px;" class="col-md-12">
            <div class="pagetitle mt-2 ">
                <h1 class="text-dark">Dashboard</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-dark" href="index.php">Home</a></li>
                        <li class="breadcrumb-item active text-dark">Practice areas</li>
                        <li class="breadcrumb-item active text-dark">Show</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Case Name</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $show = "SELECT * FROM `practice_areas` ";
                    $pdo_statement = $pdo_con->prepare($show);
                    $pdo_statement->execute();
                    $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

                    if ($pdo_statement->rowCount() > 0) {
                        foreach ($result as $row) { ?>
                            <tr>

                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['icon'] ?></td>
                                <td><?php echo $row['description'] ?></td>
                                <td><button name="btn_delete" class="btn" style="background-color: #D7B679;">
                                        <?php echo "<a class='badge badge-danger' href='?type=delete&id=" . $row['id'] . "'>Delete</a>&nbsp;";?> </button>
                                        
                                         
                                        <button name="btn_edit" class="btn" style="background-color: #D7B679;">
                                        <a href="practice_area_edit.php?id=<?php echo $row['id'] ?>" class="badge badge-success">Edit</a>
                                    </button>

                            </tr>




                    <?php  }
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include './includes/footer.php';
?>