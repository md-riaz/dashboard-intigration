<?php
session_start();
//  include header file
include '../dashboard_includes/db.php';

$uploadOk = 1; //if condition is not fullfilled set this to 0 to stop upload.
// define variables and set to empty values
$page = "";
//get url variable value
$page = $_GET["p"];

if ($page == "brand") {
    // Project Image
    if (!$_FILES['img']['size'] == 0) {

        //get extention name
        $imageFileType = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));
        $allowed_extension = ['jpg', 'jpeg', 'png'];
        if (in_array($imageFileType, $allowed_extension)) {
            if ($_FILES['img']['size'] <= 1000000) {
                $file_name = "brand_img" . rand() . "." . $imageFileType;
                $target_file = "../../img/brand/" . $file_name;
                //set source path to a variable.
                $source_path = $_FILES['img']['tmp_name'];
                if (!$uploadOk == 0) {
                    if (move_uploaded_file($source_path, $target_file)) {
                        $insert = "INSERT INTO `brands`(`img_dir`) VALUES ('$file_name')";
                        $sql = mysqli_query($db_connect, $insert);
                       
                        if ($sql === TRUE) {
                            $_SESSION["smsg"] = "Brand Logo Added.";
                        }
                    }
                }
            } else {
                $uploadOk = 0;
                $_SESSION["err"] = "File size is limited to 1MB";
            }
        } else {
            $uploadOk = 0;
            $_SESSION["err"] = "Only JPG, JPEG & PNG files are allowed";
        }
    } else {
        $uploadOk = 0;
        $_SESSION["err"] = "Image not selected !!!";
    }

    // Project Image end

} else if ($page == "delete") {
    // get id value from url
    $id = $_GET["id"];
    $select_img = "SELECT `img_dir` FROM `brands` WHERE `id` = $id";
    $select_img_sql = mysqli_query($db_connect, $select_img);
    $img = mysqli_fetch_assoc($select_img_sql);
    $delete_from = "../../img/brand/" . $img['img_dir'];
    unlink($delete_from);
    //delete query syntax
    $delete = "DELETE FROM `brands` WHERE id = $id";
    //delete the user
    $run_query = mysqli_query($db_connect, $delete);


    $_SESSION["smsg"] = "Deleted Successfully";
} else if ($page == "status") {
    $id = $_GET["id"];
    $select_data = "SELECT * FROM `brands` WHERE `id` = $id";
    //run that query
    $run_query = mysqli_query($db_connect, $select_data);
    // Get data values as associative array
    $data = mysqli_fetch_assoc($run_query);

    $data['status'] == 0 ? $status = 1 : $status = 0;
    $update = "UPDATE `brands` SET `status`='$status' WHERE id = $id";
    $sql = mysqli_query($db_connect, $update);
}
header("location:/admin/brands/brands.php");
