<?php
session_start(); //Session Start
include "../dashboard_includes/db.php"; //include database connection page
// Function for checking data not to execute any script
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//Get data from submit and test data
$email = test_input($_POST['email']);
$pass = test_input($_POST['password']);

$select_data = "SELECT COUNT(*) as exist, id, usernames,img_dir,emails,names,role,about,university,gender FROM `users` WHERE emails = '$email'";

//run that query
$run_query = mysqli_query($db_connect, $select_data);
$get_data = mysqli_fetch_assoc($run_query);

if ($get_data['exist'] == 1) {
    $select_data = "SELECT * FROM `users` WHERE emails = '$email'";
    $run_query = mysqli_query($db_connect, $select_data);
    $get_data = mysqli_fetch_assoc($run_query);

    //Save values in session for later use
    $_SESSION["id"] = $get_data['id'];
    $_SESSION["usernames"] = $get_data['usernames'];
    $_SESSION["img_dir"] = $get_data['img_dir'];
    $_SESSION["emails"] = $get_data['emails'];
    $_SESSION["names"] = $get_data['names'];
    $_SESSION["university"] = $get_data['university'];
    $_SESSION["about"] = $get_data['about'];
    $_SESSION["gender"] = $get_data['gender'];
    $_SESSION["role"] = $get_data['role'];

    if (password_verify($pass, $get_data['passwords'])) {
        header("location:/admin/auth/dashboard.php");
        //set cookie for 60 minutes
        setcookie("login", "logged", time() + (86400 * 30), "/");
        $_SESSION["login"] = "logged";
    } else {
        header("location:/admin/auth/signin.php");
        $_SESSION["perr"] = "Password is wrong";
    }
} else {
    header("location:/admin/auth/signin.php");
    $_SESSION["err"] = "This email doesn't have an account";
}
