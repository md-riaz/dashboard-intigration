<?php
include '../dashboard_includes/db.php';
// get id value from url
$id = $_GET["id"];
//delete query syntax
$delete = "DELETE FROM `users` WHERE id = $id";
$select_photo = "SELECT `img_dir` FROM `users` WHERE id = $id";
//delete the user
$run_query = mysqli_query($db_connect, $delete);
$select_photo_result = mysqli_query($db_connect, $select_photo);
$user_img = mysqli_fetch_assoc($select_photo_result);
$delete_from = "/admin/dashboard_assets/user_img/" . $user_img['img_dir'];
unlink($delete_from);
//go to preview page
header('Location: ' . $_SERVER['HTTP_REFERER']);
