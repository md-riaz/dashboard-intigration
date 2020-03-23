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
$OldPass = test_input($_POST['old-pass']);
$NewPass = test_input($_POST['new-pass']);
$hash_pass = password_hash($NewPass, PASSWORD_DEFAULT); //Convert password to hash
$email = $_SESSION["emails"];

//Password Checking funtions
$regex = '/^[a-zA-Z\s\d\.]+$/';
// ^ Start
// $ End
// [] Rules that are applied to a single character
// + Apply the rules to everything
// \s Allow whetespace or spaces
// \d Allow all digits
// . Allow all
// \. Allow Period/Dot
// {3} Apply rule to the next 5 characters
// {2,5} Apply rule to between 2 and 5 characters
$pass_check = preg_match($regex, $NewPass);
if (!$pass_check || strlen($NewPass) < 8) {
    $_SESSION["err"] =
        "Use both uppercase & lowercase <br>
        Atleast a number<br>
        Minimum 8 characters";
} else {
    $select_data = "SELECT * FROM `users` WHERE emails = '$email'";
    $run_query = mysqli_query($db_connect, $select_data);
    $get_data = mysqli_fetch_assoc($run_query);

    if (password_verify($OldPass, $get_data['passwords'])) {
        $update = "UPDATE `users` SET `passwords`= '$hash_pass' WHERE emails = '$email'";
        $run_query = mysqli_query($db_connect, $update);
        $_SESSION["smsg"] = "Password changed successfully.";
    } else {
        $_SESSION["err"] = "Password is wrong";
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
