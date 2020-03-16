<?php
session_start();
//  include header file
include '../dashboard_includes/db.php';
$uploadOk = 1; //if condition is not fullfilled set this to 0 to stop upload.
// define variables and set to empty values
$page = "";
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

if ($page == "brand") {
    if (!$_FILES['brandImg']['size'] == 0) {
        //get extention name
        $imageFileType = strtolower(pathinfo($_FILES['brandImg']['name'], PATHINFO_EXTENSION));
        $file_name = "logo" . "." . $imageFileType;
        $target_file = "../../img/logo/" . $file_name;

        //set source path to a variable.
        $source_path = $_FILES['brandImg']['tmp_name'];
        // Allow certain file formats
        if ($imageFileType != "png") {
            $_SESSION["err"] = "Sorry, only PNG files are allowed.";
            $uploadOk = 0;
        }
        // Allow below 1mb dile size
        if ($_FILES['brandImg']['size'] > 1200000) {
            $_SESSION["err"] = "Sorry, file size should be lower than 1MB";
            $uploadOk = 0;
        }

        if (!$uploadOk == 0) {
            if (move_uploaded_file($source_path, $target_file)) {
                $_SESSION["smsg"] = "The image " . basename($_FILES["brandImg"]["name"]) . " has been set as about image.";
            } else {
                $_SESSION["err"] = "Sorry, your image was not uploaded.";
            }
        }
    } else {
        $_SESSION["err"] = "Empty Fields!";
    }
}
if ($page == "secondary") {
    if (!$_FILES['secondaryimg']['size'] == 0) {
        //get extention name
        $imageFileType = strtolower(pathinfo($_FILES['secondaryimg']['name'], PATHINFO_EXTENSION));
        $file_name = "s_logo" . "." . $imageFileType;
        $target_file = "../../img/logo/" . $file_name;

        //set source path to a variable.
        $source_path = $_FILES['secondaryimg']['tmp_name'];
        // Allow certain file formats
        if ($imageFileType != "png") {
            $_SESSION["err"] = "Sorry, only PNG files are allowed.";
            $uploadOk = 0;
        }
        // Allow below 1mb dile size
        if ($_FILES['secondaryimg']['size'] > 1000000) {
            $_SESSION["err"] = "Sorry, file size should be lower than 1MB";
            $uploadOk = 0;
        }

        if (!$uploadOk == 0) {
            if (move_uploaded_file($source_path, $target_file)) {
                $_SESSION["smsg"] = "The image " . basename($_FILES["secondaryimg"]["name"]) . " has been set as about image.";
            } else {
                $_SESSION["err"] = "Sorry, your image was not uploaded.";
            }
        }
    } else {
        $_SESSION["err"] = "Empty Fields!";
    }
}
header("location:/admin/logo/logo.php");
