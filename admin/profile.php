<head>
    <title>Profile</title>
</head>
<?php
//  include header file
include  'dashboard_includes/session_check.php';
include  'dashboard_includes/header.php';
include  'dashboard_includes/sidebar.php';
include  'dashboard_includes/topNav.php';


?>

<div class="content">
    <div class="container-fluid">
        <!-- your content here -->



        <div class="row">
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="javascript:;">
                            <img class="img" src="/admin/dashboard_assets/user_img/<?= $_SESSION["img_dir"] ?>" style="width: 130px;height: 130px;object-fit: cover;">
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray"><?= role($_SESSION["role"]) ?></h6>
                        <h4 class="card-title"><?= $_SESSION["names"] ?></h4>
                        <p class="card-description">
                            Username :- <?= $_SESSION["usernames"] ?><br>
                            Email :- <?= $_SESSION["emails"] ?><br>
                            University :- <?= $_SESSION["university"] ?><br>
                            Gender :- <?= $_SESSION["gender"] ?><br>
                            <?= $_SESSION["about"] ?>
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