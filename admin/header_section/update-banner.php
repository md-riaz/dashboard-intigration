<?php
session_start(); //Session Start
include "../dashboard_includes/db.php"; //include database connection page

/*Image upload Validation*/

$uploadOk = 1; //if condition is not fullfilled set this to 0 to stop upload.

if (isset($_FILES["BannerImg"])) {

    //get extention name
    $imageFileType = strtolower(pathinfo($_FILES['BannerImg']['name'], PATHINFO_EXTENSION));

    $file_name = "banner_img" . "." . $imageFileType;
    $target_file = "../../img/banner/" . $file_name;

    //set source path to a variable.
    $source_path = $_FILES['BannerImg']['tmp_name'];

    // Allow certain file formats
    if ($imageFileType != "png") {
        $_SESSION["err"] = "Sorry, only PNG files are allowed.";
        $uploadOk = 0;
    }
    // Allow below 1mb dile size
    if ($_FILES['BannerImg']['size'] > 1000000) {
        $_SESSION["err"] = "Sorry, file size should be lower than 1MB";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $_SESSION["err"] = "Sorry, your image was not uploaded.";
        header("location:/admin/header_section/all-header.php");
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($source_path, $target_file)) {
            $update = "UPDATE `banner_img` SET `img_dir`= '$file_name' WHERE `id` = 1";
            $sql = mysqli_query($db_connect, $update);
            $_SESSION["success"] = "The image " . basename($_FILES["BannerImg"]["name"]) . " has been set as banner image.";
        } else {
            $_SESSION["err"] = "Sorry, your image was not uploaded.";
        }
        header("location:/admin/header_section/all-header.php");
    }
}



/*Image upload Validation End*/
