<?php
session_start();
//  include header file
require_once '../dashboard_includes/db.php';

$uploadOk = 1; //if condition is not fullfilled set this to 0 to stop upload.
// define variables and set to empty values
$category = $page = $project_name = $title =  $desp = $id = "";
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
if ($page == "portfolio") {
    $category = test_input($_POST['category']);
    $project_name = test_input($_POST['project_name']);
    $title = test_input($_POST['title']);
    $desp = test_input($_POST['desp']);

    if (!empty($category) && !empty($project_name) && !empty($title) && !empty($desp)) {
        $insert = "INSERT INTO `portfolio`(`category`, `project_name`, `title`, `desp`) VALUES ('$category','$project_name','$title','$desp')";
        $sql = mysqli_query($db_connect, $insert);
        $last_id = mysqli_insert_id($db_connect);
        // Project Image
        if (!$_FILES['img']['size'] == 0) {

            //get extention name
            $imageFileType = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));
            $allowed_extension = ['jpg', 'jpeg', 'png'];
            if (in_array($imageFileType, $allowed_extension)) {
                if ($_FILES['img']['size'] <= 2500000) {
                    $file_name = "p" . $last_id . "." . $imageFileType;
                    $target_file = "../../img/project/" . $file_name;
                    //set source path to a variable.
                    $source_path = $_FILES['img']['tmp_name'];
                    if (!$uploadOk == 0) {
                        if (move_uploaded_file($source_path, $target_file)) {
                            $update = "UPDATE `portfolio` SET `img_dir`='$file_name' WHERE `id` = $last_id";
                            $sql = mysqli_query($db_connect, $update);
                            if ($sql === TRUE) {
                                $_SESSION["smsg"] = "New work added.";
                            }
                        }
                    }
                } else {
                    $uploadOk = 0;
                    $_SESSION["err03"] = "File size is limited to 2MB";
                }
            } else {
                $uploadOk = 0;
                $_SESSION["err02"] = "Only JPG, JPEG & PNG files are allowed";
            }
        } else {
            $uploadOk = 0;
            $_SESSION["err04"] = "Image not selected !!!";
        }
        if (!$_FILES['img2']['size'] == 0) {

            //get extention name
            $imageFileType = strtolower(pathinfo($_FILES['img2']['name'], PATHINFO_EXTENSION));
            $allowed_extension = ['jpg', 'jpeg', 'png'];
            if (in_array($imageFileType, $allowed_extension)) {
                if ($_FILES['img2']['size'] <= 2500000) {
                    $file_name = "portfolio_details" . $last_id . "." . $imageFileType;
                    $target_file = "../../img/project/" . $file_name;
                    //set source path to a variable.
                    $source_path = $_FILES['img2']['tmp_name'];
                    if (!$uploadOk == 0) {
                        if (move_uploaded_file($source_path, $target_file)) {
                            $update = "UPDATE `portfolio` SET `img_dir2`='$file_name' WHERE `id` = $last_id";
                            $sql = mysqli_query($db_connect, $update);
                            if ($sql === TRUE) {
                                $_SESSION["smsg"] = "New work added.";
                            }
                        }
                    }
                } else {
                    $uploadOk = 0;
                    $_SESSION["err03"] = "File size is limited to 2MB";
                }
            } else {
                $uploadOk = 0;
                $_SESSION["err02"] = "Only JPG, JPEG & PNG files are allowed";
            }
        }
        // Project Image end

    } else {
        $_SESSION["err01"] = "Empty Fields!";
    }
} else if ($page == "delete") {
    // get id value from url
    $id = $_GET["id"];
    $select_img = "SELECT `img_dir` FROM `portfolio` WHERE `id` = $id";
    $select_img_sql = mysqli_query($db_connect, $select_img);
    $img = mysqli_fetch_assoc($select_img_sql);
    $delete_from = "../../img/project/" . $img['img_dir'];
    unlink($delete_from);
    //delete query syntax
    $delete = "DELETE FROM `portfolio` WHERE id = $id";
    //delete the user
    $run_query = mysqli_query($db_connect, $delete);


    $_SESSION["smsg"] = "Deleted Successfully";
} else if ($page == "status") {
    $id = $_GET["id"];
    $select_data = "SELECT * FROM `portfolio` WHERE `id` = $id";
    //run that query
    $run_query = mysqli_query($db_connect, $select_data);
    // Get data values as associative array
    $data = mysqli_fetch_assoc($run_query);

    $data['status'] == 0 ? $status = 1 : $status = 0;
    $update = "UPDATE `portfolio` SET `status`='$status' WHERE id = $id";
    $sql = mysqli_query($db_connect, $update);
}
header("location:/admin/portfolio/portfolio.php");
