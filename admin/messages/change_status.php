<?php
include '../dashboard_includes/db.php';
// get id value from url
$id = $_GET["id"];
//Select data from messages table whose id matches url id
$select_data = "SELECT * FROM `messages` WHERE id = $id";
//run that query
$run_query = mysqli_query($db_connect, $select_data);
// Get data values as associative array
$msg = mysqli_fetch_assoc($run_query);
if ($msg['status'] != 2) {
    $update = "UPDATE `messages` SET `status`='2' WHERE id = $id";
} else {
    $update = "UPDATE `messages` SET `status`='1' WHERE id = $id";
}
$sql = mysqli_query($db_connect, $update);
header('location: /admin/messages/all-messages.php');
