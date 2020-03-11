<?php
// <!-- include header file -->
include 'dashboard_includes/session_check.php';
include 'dashboard_includes/header.php';
include 'dashboard_includes/sidebar.php';
include 'dashboard_includes/topNav.php';
// get id value from url
$id = $_GET["id"];
//Select data from users table whose id matches url id
$select_data = "SELECT * FROM `users` WHERE id = $id";
//run that query
$run_query = mysqli_query($db_connect, $select_data);
// Get data values as associative array
$data = mysqli_fetch_assoc($run_query);
?>

<head>
    <title> <?= $data['usernames']; ?>'s Profile</title>
</head>


<div class="content">
    <div class="container-fluid">
        <!-- your content here -->



        <div class="row">
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="javascript:;">
                            <img class="img" src="/admin/dashboard_assets/user_img/<?= $data["img_dir"] ?>" style="width: 130px;height: 130px;">
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray"><?= role($data["role"]) ?></h6>
                        <h4 class="card-title"><?= $data["names"] ?></h4>
                        <p class="card-description">
                            Username :- <?= $data["usernames"] ?><br>
                            Email :- <?= $data["emails"] ?><br>
                            University :- <?= $data["university"] ?><br>
                            Gender :- <?= $data["gender"] ?><br>
                            <?= $data["about"] ?>
                        </p>
                        <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'dashboard_includes/footer.php';
?>