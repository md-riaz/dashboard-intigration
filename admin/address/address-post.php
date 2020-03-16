<?php
session_start();
//  include header file
include '../dashboard_includes/db.php';
// define variables and set to empty values
$city = $address = $num = $email = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = str_replace("'", "''", $data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city = test_input($_POST["city"]);
    $address = test_input($_POST["address"]);
    $num = test_input($_POST["num"]);
    $email = test_input($_POST["email"]);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["emerr"] = "Email Format is invalid!!";
} else {
    $update = "UPDATE `address` SET `city`='$city',`address`='$address',`phone`='$num',`email`='$email' WHERE `id` = 1";
    $sql = mysqli_query($db_connect, $update);
    if ($sql === TRUE) {
        $_SESSION["smsg"] = "Adress Updated";
    } else {
        $_SESSION["err"] = "Something went wrong";
    }
}
header("location:/admin/address/address.php");
