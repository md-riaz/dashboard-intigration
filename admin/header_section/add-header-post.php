<?php
session_start();
//  include header file
require_once '../dashboard_includes/db.php';

/* Service Form Post */

// define variables and set to empty values
$title = $cta_btn = $description = $status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = test_input($_POST["title"]);
    $cta_btn = test_input($_POST["cta_btn"]);
    $description = test_input($_POST["desp"]);
    //checkbox should be wrapped with isset
    $status = isset($_POST["status"]);
    $status == 1 ? $status = 1 : $status = 0;
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = str_replace("'", "''", $data);
    return $data;
}

if (!empty($title) && !empty($cta_btn) && !empty($description)) {
    $insert_data = "INSERT INTO `header`(`header_title`, `header_desp`,`cta_btn`, `status`) VALUES ('$title', '$description','$cta_btn','$status')";
    $run_query = mysqli_query($db_connect, $insert_data);
    if ($run_query === TRUE) {
        $_SESSION["success"] = "Header Info Added SuccessFully";
    } else {
        $_SESSION["err"] = "Error occurred!!";
    }
} else {
    $_SESSION["err"] = "Empty!!";
}

    header("location: /admin/header_section/add-header.php");
?>