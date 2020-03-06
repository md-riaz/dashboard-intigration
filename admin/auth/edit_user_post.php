<?php
session_start(); //Session Start
include "../dashboard_includes/db.php"; //include database connection page
// get id value from url
$id = $_GET["id"];
// get username value from url
$usernm = $_GET["user"];
/*Image upload Validation*/

$Cryptograph_alphanumeric = bin2hex(random_bytes(3)) . '__'; //This line assigns a random number to this variable.
//get extention name
$imageFileType = strtolower(pathinfo($_FILES['ProfileImage']['name'], PATHINFO_EXTENSION));
//new name of img
$new_name = $usernm;
//combine file name,extention with random number & set file directory.
$target_file = '../dashboard_assets/user_img/' . $Cryptograph_alphanumeric . $new_name . "." . $imageFileType;

$uploadOk = 1; //if condition is not fullfilled set this to 0 to stop upload.


if (isset($_FILES["ProfileImage"])) {

    //set source path to a variable.
    $source_path = $_FILES['ProfileImage']['tmp_name'];

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $_SESSION["typeerr"] = "Sorry, only JPG, JPEG & PNG files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $_SESSION["err"] = "Sorry, your image was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($source_path, $target_file)) {
            $_SESSION["succm"] = "The image " . basename($_FILES["ProfileImage"]["name"]) . " has been uploaded.";
        } else {
            $_SESSION["serr"] = "Sorry, your image was not uploaded.";
        }
    }
}
// if img extention is empty then img_dir is empty 
if ($imageFileType == "") {
    $img_dir = "";
} else {
    $img_dir = '/admin/dashboard_assets/user_img/' . $Cryptograph_alphanumeric . $new_name . "." . $imageFileType;
}
/*Image upload Validation End*/

/*Form Validation*/
// Function for checking data not to execute any script
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = str_replace("'", "''", $data);
    return $data;
}
//Get data from submit and test data
$username = test_input($_POST['username']);
$email = test_input($_POST['email']);
$name = test_input($_POST['name']);
$university = test_input($_POST['university']);
$about = test_input($_POST['about']);

//if any error increment this
$err = 0;

if (empty($email)) {
    $_SESSION["emerr"] = "Email is required";
    $err++;
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["emerr"] = "Email Format is invalid!!";
        $err++;
    }
}

if (empty($username)) {
    $_SESSION["uerr"] = "Username field is required";
    $err++;
} else {
    if (!preg_match('/^[a-zA-Z\d\.]+$/', $username)) {
        $_SESSION["uerr"] = "Username can cantain only alphanumeric characters";
        $err++;
    }
}

if (empty($name)) {
    $_SESSION["fnerr"] = "Name is required";
    $err++;
}

if (empty($university)) {
    $_SESSION["unierr"] = "Institute name is empty!!";
    $err++;
}

// if any error found then go to previews page else check data for duplicates and if no duplicate then insert to database   
if ($err != 0) {
    header("location:/admin/user.php?id=$id");
    echo "text";
} else {
    //Check email for double in database
    $check_double = "SELECT COUNT(*) as duplicate FROM `users` WHERE emails = '$email'";
    $query_result = mysqli_query($db_connect, $check_double);
    $get_data = mysqli_fetch_assoc($query_result);
    //Check username for double in database
    $check_double_username = "SELECT COUNT(*) as duplicate FROM `users` WHERE usernames = '$username'";
    $query_result_username = mysqli_query($db_connect, $check_double_username);
    $get_data_username = mysqli_fetch_assoc($query_result_username);

    //if error found, show error messeger
    if ($get_data['duplicate'] > 1) {
        header("location:/admin/auth/edit_user_post.php?id=$id");
        $_SESSION["emDerr"] = "Email is already exist!!";
    } else {
        //if error found, show error messeger
        if ($get_data_username['duplicate'] > 1) {
            header("location:/admin/auth/edit_user_post.php?id=$id");
            $_SESSION["uDerr"] = "Username is already exist!!";
        } else {
            // update data to database
            $update_data =
                "UPDATE `users` SET 
            `usernames`= '$username', 
            `img_dir`= '$img_dir', 
            `emails` = '$email', 
            `names` = '$name',  
            `university` = '$university', 
            `about` = '$about' 
            WHERE `id` = '$id'";

            $run_query = mysqli_query($db_connect, $update_data);


            if ($run_query ===  TRUE) {
                $_SESSION["success"] = "You have successfully updated your info.";
                header("location:/admin/all_users.php");
            } else {
                echo "failed to update";
                header("location:/admin/auth/edit_user_post.php?id=$id");
            }
        }
    }
}
