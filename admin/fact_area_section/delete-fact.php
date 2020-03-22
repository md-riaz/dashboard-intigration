<?php
include '../dashboard_includes/db.php';
session_start();
// get id value from url
$id = $_GET["id"];
//delete query syntax
$delete = "DELETE FROM `fact_areas` WHERE id = $id";
//delete the user
$run_query = mysqli_query($db_connect, $delete);
$_SESSION["success"] = "Saved Changes";
//go to preview page
header('Location: ' . $_SERVER['HTTP_REFERER']);

