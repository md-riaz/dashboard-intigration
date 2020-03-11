<?php
session_start(); //Session Start
include "../dashboard_includes/db.php"; //include database connection page

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
$name = $email = $messege = "";
//Get data from submit and test data
$name = test_input($_POST['name']);
$email = test_input($_POST['email']);
$message = test_input($_POST['message']);

if (!empty($name) || !empty($email) || !empty($message)) {
    $insert = "INSERT INTO `messages`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";
    $sql = mysqli_query($db_connect, $insert);

    if ($sql === TRUE) {
        $_SESSION["smsg"] = "The message is successfully sent.";
        //go to preview page
        header('Location: ' . $_SERVER['HTTP_REFERER'] . "#contact");
    } else {
        $_SESSION["emsg"] = "An error occurred!";
        //go to preview page
        header('Location: ' . $_SERVER['HTTP_REFERER'] . "#contact");
    }
}
