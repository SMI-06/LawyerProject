<?php
session_start();


?>

<h1><?php echo  $_SESSION['Client'] ?></h1>
<h1><?php echo  $_SESSION['Clientname'] ?></h1>

<button class="btn btn-primary">
    <a href="logout.php">Logout</a>
</button>