<?php include "../connection.php";

include './includes/header.php';

if (isset($_REQUEST['btn_submit'])) {
  $case = $_REQUEST['case'];
  $icon = $_REQUEST['icon'];
  $description = $_REQUEST['description'];
}
if ($case == "" || $icon == "" || $description == "") {
  $message = "<div class='alert alert-danger'>*All fields are required.</div>";
} else {
  $insert = "INSERT INTO `practice_areas`(`name`, `icon`, `description`) VALUES (:Casename,:icon,:description)";
  $pdo_statement = $pdo_con->prepare($insert);
  $pdo_statement->bindValue(':Casename', $case, PDO::PARAM_STR);
  $pdo_statement->bindValue(':icon', $icon, PDO::PARAM_STR);
  $pdo_statement->bindValue(':description', $description, PDO::PARAM_STR);
  $pdo_statement->execute();
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
                        <li class="breadcrumb-item active text-dark">Create</li>
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
        <div class="col-md-12">
          <label for="inputState" class="form-label">Case Name</label>
          <select id="inputState" name="case" class="form-select">
            <option selected disabled>Choose Your Law</option>
            <option value="Criminal Law">Criminal Law</option>
            <option value="Property Law">Property Law</option>
            <!-- <option>Business Law</option>
            <option>Workplace Accident</option> -->
          </select>
        </div>

        <div class="col-md-12">
          <label for="inputState" class="form-label">Icon</label>
          <select id="inputState" name="icon" class="form-select">
            <option selected disabled>Choose Icon</option>
            <option value="<i class='fas fa-briefcase'></i>"> Briefcase</option>
            <option value="<i class='fas fa-landmark'></i>"> Landmark</option>
          </select>
        </div>
        <div class="col-md-12">
          <label for="inputEmail5" class="form-label">Description</label>
          <input type="text" name="description" class="form-control" id="inputEmail5">
        </div>
        <div class="mt-4">
          <button type="submit" name="btn_submit" class="btn" style="background-color: #D7B679;">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include './includes/footer.php';
?>