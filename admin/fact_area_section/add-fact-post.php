
<?php
session_start();
//  include header file
include '../dashboard_includes/db.php';

/* Service Form Post */

// define variables and set to empty values
$title = $cta_btn = $description = $status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = test_input($_POST["title"]);
    $cta_btn = test_input($_POST["cta_btn"]);
    $description = test_input($_POST["desp"]);
    $fb_id = test_input($_POST["fb_id"]);
    $twitter_id = test_input($_POST["twitter_id"]);
    $insta_id = test_input($_POST["insta_id"]);
    $pinterest_id = test_input($_POST["pinterest_id"]);
    $status = test_input($_POST["status"]);
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

if (!empty($title) && !empty($cta_btn) && !empty($description) && !empty($fb_id) && !empty($twitter_id) && !empty($insta_id) && !empty($pinterest_id)) {
    $insert_data = "INSERT INTO `header`(`header_title`, `header_desp`,`cta_btn`,`fb`,`twitter`,`insta`,`pinterest`, `status`) VALUES ('$title', '$description','$cta_btn','$fb_id','$twitter_id','$insta_id','$pinterest_id', '$status')";
    $run_query = mysqli_query($db_connect, $insert_data);

    if ($run_query === TRUE) {
        $_SESSION["success"] = "Header Info Added SuccessFully";
        header("location: /admin/header_section/add-header.php");
    } else {
        $_SESSION["err"] = "Error occurred!!";
        header("location: /admin/header_section/add-header.php");
    }
} else {
    $_SESSION["err"] = "Empty!!";
    header("location: /admin/header_section/add-header.php");
}

?>