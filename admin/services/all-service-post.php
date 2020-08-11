<?php
session_start();
require_once '../dashboard_includes/db.php';
$id = $_GET["id"];
$select = "SELECT * FROM `services` WHERE `id` = $id";
$sql = mysqli_query($db_connect, $select);
$service = mysqli_fetch_assoc($sql);
//if status is 0 then update to 1 or reverse
$service['status'] == 0 ? $status = 1 : $status = 0;


$update_data = "UPDATE `services` SET `status`= $status WHERE `id` = $id";


$run_query = mysqli_query($db_connect, $update_data);
if ($run_query === TRUE) {
    $_SESSION["success"] = "Saved Changes";
    header("location: /admin/services/all-service.php");
} else {
    $_SESSION["err"] = "Error occurred!!";
    header("location: /admin/services/all-service.php");
}
