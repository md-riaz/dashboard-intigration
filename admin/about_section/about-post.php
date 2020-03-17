<?php
session_start();
//  include header file
include '../dashboard_includes/db.php';
$uploadOk = 1; //if condition is not fullfilled set this to 0 to stop upload.
// define variables and set to empty values
$about_info = $page = $id = $topic = "";
//get url variable value
$page = $_GET["p"];
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = str_replace("'", "''", $data);
    return $data;
}

if ($page == "update") {
    $id = $_GET["id"];
    if (!$_FILES['aboutImg']['size'] == 0) {
        //get extention name
        $imageFileType = strtolower(pathinfo($_FILES['aboutImg']['name'], PATHINFO_EXTENSION));
        $file_name = "banner_img2" . "." . $imageFileType;
        $target_file = "../../img/banner/" . $file_name;

        //set source path to a variable.
        $source_path = $_FILES['aboutImg']['tmp_name'];
        // Allow certain file formats
        if ($imageFileType != "png") {
            $_SESSION["err"] = "Sorry, PNG files are allowed.";
            $uploadOk = 0;
        }
        // Allow below 1mb dile size
        if ($_FILES['aboutImg']['size'] > 1200000) {
            $_SESSION["err"] = "Sorry, file size should be lower than 1MB";
            $uploadOk = 0;
        }

        if (!$uploadOk == 0) {
            if (move_uploaded_file($source_path, $target_file)) {
                $_SESSION["success"] = "The image " . basename($_FILES["aboutImg"]["name"]) . " has been set as about image.";
            } else {
                $_SESSION["err"] = "Sorry, your image was not uploaded.";
            }
        }
    }
    if (isset($_POST)) {
        $about_info = test_input($_POST["desp"]);
        $topic = test_input($_POST["topic"]);
        if (!empty($about_info) && !empty($topic)) {
            $update = "UPDATE `about` SET `details`= '$about_info', `progress_topic` = '$topic' WHERE `id` = 1";
            $sql = mysqli_query($db_connect, $update);
            $_SESSION["smsg"] = "Information Updated";
        } else {
            $_SESSION["err"] = "Empty Fields!";
        }
    }
} else if ($page == "status") {
    $id = $_GET["id"];
    $select_data = "SELECT * FROM `skillbar` WHERE `id` = $id";
    //run that query
    $run_query = mysqli_query($db_connect, $select_data);
    // Get data values as associative array
    $data = mysqli_fetch_assoc($run_query);

    $data['status'] == 0 ? $status = 1 : $status = 0;
    $update = "UPDATE `skillbar` SET `status`='$status' WHERE id = $id";
    $sql = mysqli_query($db_connect, $update);
}
if ($page == "skillbar") {
    $year = test_input($_POST["year"]);
    $title = test_input($_POST["title"]);
    $value = test_input($_POST["value"]);

    if (!empty($year) && !empty($title) && !empty($value)) {
        $insert_data = "INSERT INTO `skillbar`(`year`, `skill_name`,`value`) VALUES ('$year', '$title','$value')";
        $run_query = mysqli_query($db_connect, $insert_data);
        if ($run_query === TRUE) {
            $_SESSION["skillsmsg"] = "Record Added Successfully";
        }
    } else {
        $_SESSION["skillerr"] = "Empty Fields!";
    }
}
if ($page == "delete") {
    // get id value from url
    $id = $_GET["id"];
    //delete query syntax
    $delete = "DELETE FROM `skillbar` WHERE id = $id";
    //delete the user
    $run_query = mysqli_query($db_connect, $delete);
    $_SESSION["skilldlt"] = "Deleted Successfully";
}
header("location:/admin/about_section/about.php");
