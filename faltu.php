<?php

include "include/connection.php";


//  second Accordian Fields


if (isset($_REQUEST['Save_data'])) {
    $user_id = $_REQUEST['lid'];
    $lawyer_type = $_REQUEST['lawyer_type'];
    $case_done = $_REQUEST['case_done'];
    $short_about = $_REQUEST['short_about'];
    $about_me = $_REQUEST['about_me'];
    $statement = $_REQUEST['personal_statement'];
    $query1 = "INSERT INTO `lawyer_details`(`Lawyer_type`,`Lawyer_case_done`, `Short_about`, `About_me`, `Lawyer_personal_statement`) VALUES (:lawyer_type,:case_done,:short_about,:about_me,:personal_statement)";
    $pdo_statement1 = $pdo_con->prepare($query1);
    $pdo_statement1->bindValue(':lawyer_type', $lawyer_type, PDO::PARAM_STR);
    $pdo_statement1->bindValue(':case_done', $case_done, PDO::PARAM_INT);
    $pdo_statement1->bindValue(':short_about', $short_about, PDO::PARAM_STR);
    $pdo_statement1->bindValue(':about_me', $about_me, PDO::PARAM_STR);
    $pdo_statement1->bindValue(':personal_statement', $statement, PDO::PARAM_STR);
    $pdo_statement1->execute();



}
else{
    echo "error";
}




?>