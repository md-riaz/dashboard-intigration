
<?php
session_start();
//  include header file
include '../dashboard_includes/db.php';

/* Service Form Post */

// define variables and set to empty values
$icon = $project_num = $topic = $status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $icon = test_input($_POST["icon"]);
    $project_num = test_input($_POST["project_num"]);
    $topic = test_input($_POST["topic"]);
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

if (!empty($icon) && !empty($project_num) && !empty($topic)) {
    $insert_data = "INSERT INTO `fact_areas`(`icon`, `project_numbers`,`project_topic`,`status`) VALUES ('$icon', '$project_num','$topic', '$status')";
    $run_query = mysqli_query($db_connect, $insert_data);
    if ($run_query === TRUE) {
        $_SESSION["success"] = "Fact Info Added SuccessFully";
    } else {
        $_SESSION["err"] = "Error occurred!!";
    }
} else {
    $_SESSION["err"] = "Empty!!";
}

header("location: /admin/fact_area_section/add-fact.php");
?>