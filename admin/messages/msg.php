<?php
// <!-- include header file -->
include '../dashboard_includes/session_check.php';
include '../dashboard_includes/header.php';
include '../dashboard_includes/sidebar.php';
include '../dashboard_includes/topNav.php';
// get id value from url
$id = $_GET["id"];
//Select data from messages table whose id matches url id
$select_data = "SELECT * FROM `messages` WHERE id = $id";
//run that query
$run_query = mysqli_query($db_connect, $select_data);
// Get data values as associative array
$msg = mysqli_fetch_assoc($run_query);
if ($msg['status'] == 0) {
    $update = "UPDATE `messages` SET `status`='1' WHERE id = $id";
    $sql = mysqli_query($db_connect, $update);
}
?>

<head>
    <title>Message Body</title>
</head>


<div class="content">
    <div class="container-fluid">
        <!-- your content here -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title"><?= $msg["name"] ?>'s message</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <td> Name : </td>
                                <td><?= $msg["name"] ?></td>
                            </tr>
                            <tr>
                                <td> Email : </td>
                                <td><?= $msg["email"] ?></td>
                            </tr>
                            <tr>
                                <td width="80"> Message : </td>
                                <td><?= $msg["message"] ?></td>
                            </tr>
                        </table>
                        <a href="/admin/messages/all-messages.php" class="btn btn-info" style="color:white"><i class="material-icons"> keyboard_return </i> Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div>
    <ul>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
















<?php
include '../dashboard_includes/footer.php';
?>