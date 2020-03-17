<?php
session_start();
//  include header file
include '../dashboard_includes/db.php';
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = str_replace("'", "''", $data);
    return $data;
}
$copyright = test_input($_POST['copyright']);

$update = "UPDATE `copyright` SET `copyright_name`='$copyright' WHERE `id` = 1";
$sql = mysqli_query($db_connect, $update);
if ($sql === TRUE) {
    $_SESSION["smsg"] = "Changes Saved.";
}
header('location:/admin/copyright/');
