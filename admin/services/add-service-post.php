
<?php
session_start();
//  include header file
include '../dashboard_includes/db.php';

/* Service Form Post */

// define variables and set to empty values
$icon_class = $title = $description = $status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $icon_class = test_input($_POST["icon"]);
    $title = test_input($_POST["title"]);
    $description = test_input($_POST["desp"]);
    $status = test_input($_POST["status"]);
    $status == 1 ? $status = 1 : $status = 0;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = str_replace("'", "''", $data);
    return $data;
}

if (!empty($icon_class) && !empty($title) && !empty($description)) {
    $insert_data = "INSERT INTO `services`(`service_icon`,`service_title`, `service_details`, `status`) VALUES ('$icon_class','$title', '$description', '$status')";
    $run_query = mysqli_query($db_connect, $insert_data);

    if ($run_query === TRUE) {
        $_SESSION["success"] = "Service Added SuccessFully";
        header("location: /admin/services/add-service.php");
    } else {
        $_SESSION["err"] = "Error occurred!!";
        header("location: /admin/services/add-service.php");
    }
} else {
    $_SESSION["err"] = "Empty!!";
    header("location: /admin/services/add-service.php");
}

?>