<?php include "../connection.php";

include './includes/header.php';
?>

<?php
if (isset($_REQUEST['btn_Update'])) {

    $id1=$_REQUEST['uid'];
    $name=$_REQUEST['case'];
    $icon=$_REQUEST['icon'];
    $description=$_REQUEST['description'];
    $update = "UPDATE `practice_areas` SET `name`=:casename,`icon`=:icon,`description`=:practice_description WHERE `id` = $id1";
    $pdo_statement = $pdo_con->prepare($update);
    $pdo_statement->bindValue(':casename',$name,PDO::PARAM_STR);
    $pdo_statement->bindValue(':icon',$icon,PDO::PARAM_STR);
    $pdo_statement->bindValue(':practice_description',$description,PDO::PARAM_STR);
    $pdo_statement->execute();
    

?>
<script>
    window.location.href="http://localhost/lawyerwebsite/Admin/Dashboard/practice_area_show.php";
</script>

<?php  } ?>










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
                        <li class="breadcrumb-item active text-dark">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-12 g-3">
      <h3 style="color: #D7B679; font-weight:bold"> </h3>
      <form class="row g-3" method="post">
      <?php
  
  $id = $_GET['id'];

  $show = "SELECT * FROM `practice_areas` where `id` = $id  ";
  $pdo_statement = $pdo_con->prepare($show);
  $pdo_statement->execute();
  $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

  if ($pdo_statement->rowCount() > 0) {
      foreach ($result as $row) { ?>


        <div class="col-md-12">
            <input  type="hidden" name='uid' value="<?php echo $row['id']?>" >
          <label for="inputState" class="form-label">Case Name</label>
          <select id="inputState" name="case"  class="form-select">
            <?php if ($row['name'] == "Criminal Law") {?>
            <option selected value="Criminal Law">Criminal Law</option>
            <option value="Property Law">Property Law</option>
           <?php } elseif ($row['name'] == "Property Law") {?>
            <option selected value="Property Law">Property Law</option>
            <option value="Criminal Law">Criminal Law</option>
           <?php } ?>

          </select>
        </div>

        <div class="col-md-12">
          <label for="inputState" class="form-label">Icon</label>
          <select id="inputState" name="icon" class="form-select">
          <?php if ($row['icon'] == "<i class='fas fa-briefcase'></i>") {?>
            <option selected value="<i class='fas fa-briefcase'></i>">Briefcase</option>
            <option value="<i class='fas fa-landmark'></i>">Landmark</option>
          <?php } elseif ($row['icon'] == "<i class='fas fa-landmark'></i>") {?>
            <option selected value="<i class='fas fa-landmark'></i>">Landmark</option>
            <option  value="<i class='fas fa-briefcase'></i>">Briefcase</option>
         <?php } ?>
          </select>
        </div>
        <div class="col-md-12">
          <label for="inputEmail5" class="form-label">Description</label>
          <input type="text" value="<?php echo $row['description']?>" name="description" class="form-control" id="inputEmail5">
        </div>
        <div class="mt-4">
          <button type="submit" name="btn_Update" class="btn" style="background-color: #D7B679;">Update</button>
        </div>

        <?php  }
                    }
                    ?>


    </form>
    </div>
  </div>
</div>



<?php include './includes/footer.php';
?>