<?php
session_start();
//  include header file
include '../dashboard_includes/db.php';
// define variables and set to empty values
$fb_id = $twitter_id = $insta_id = $pinterest_id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fb_id = test_input($_POST["fb_id"]);
    $twitter_id = test_input($_POST["twitter_id"]);
    $insta_id = test_input($_POST["insta_id"]);
    $pinterest_id = test_input($_POST["pinterest_id"]);
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = str_replace("'", "''", $data);
    return $data;
}

if (!empty($fb_id) && !empty($twitter_id) && !empty($insta_id) && !empty($pinterest_id)) {
    $update_data = "UPDATE `social` SET `fb` = '$fb_id',`twitter` = '$twitter_id',`insta` = '$insta_id',`pinterest`= '$pinterest_id'";

    $run_query = mysqli_query($db_connect, $update_data);

    if ($run_query === TRUE) {
        $_SESSION["success"] = "Social Links Updated SuccessFully";
        header("location: /admin/header_section/add-header.php");
    } else {
        $_SESSION["err"] = "Error occurred!!";
        header("location: /admin/header_section/add-header.php");
    }
}
