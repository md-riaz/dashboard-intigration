<?php
session_start();
include '../dashboard_includes/db.php';

$status = $id = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int) $_POST["id"];
    $status = $_POST["status"];
    $status == 1 ? $status = 1 : $status = 0;
}

$update_data = "UPDATE `header` SET `status`= $status WHERE `id` = $id";


$run_query = mysqli_query($db_connect, $update_data);
if ($run_query === TRUE) {
    $_SESSION["success"] = "Saved Changes";
    header("location: /admin/header_section/all-header.php");
} else {
    $_SESSION["err"] = "Error occurred!!";
    header("location: /admin/header_section/all-header.php");
}
