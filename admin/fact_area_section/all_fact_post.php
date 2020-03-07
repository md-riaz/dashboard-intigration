<?php
session_start();
include '../dashboard_includes/db.php';
$id = $_GET["id"];
$select = "SELECT * FROM `fact_areas` WHERE `id` = $id";
$sql = mysqli_query($db_connect, $select);
$fact = mysqli_fetch_assoc($sql);
//if status is 0 then update to 1 or reverse
$fact['status'] == 0 ? $status = 1 : $status = 0;



$update_data = "UPDATE `fact_areas` SET `status`= $status WHERE `id` = $id";


$run_query = mysqli_query($db_connect, $update_data);
if ($run_query === TRUE) {
    $_SESSION["success"] = "Saved Changes";
    header("location: /admin/fact_area_section/all-fact.php");
} else {
    $_SESSION["err"] = "Error occurred!!";
    header("location: /admin/fact_area_section/all-fact.php");
}
