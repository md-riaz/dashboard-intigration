<?php
//  include header file
require_once '../dashboard_includes/session_check.php';
require_once '../dashboard_includes/header.php';
require_once '../dashboard_includes/sidebar.php';
require_once '../dashboard_includes/topNav.php';
$select_address = "SELECT * FROM `address` WHERE `id` = 1";
$sql = mysqli_query($db_connect, $select_address);
$address = mysqli_fetch_assoc($sql);

?>

<head>
    <title>Change Password</title>
</head>

<div class="content">
    <div class="container-fluid">
        <!-- your content here -->
        <div class="row">
            <div class="col-lg-10">

                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-primary">Change Password</h4>
                    <div class="card-body">
                        <!-- if session found echo that with alert -->
                        <?php if (isset($_SESSION["smsg"])) : ?>

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congrats! </strong> <?= $_SESSION["smsg"] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php endif;
                        unset($_SESSION["smsg"]) ?>

                        <!-- if session found echo that with alert -->
                        <?php if (isset($_SESSION["err"])) : ?>

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oh No! </strong> <?= $_SESSION["err"] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php endif;
                        unset($_SESSION["err"]) ?>

                        <form action="post.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group bmd-form-group">
                                <label>Old Password</label>
                                <input type="password" name="old-pass" class="form-control" id="password">
                                <span class="pass_eye" onclick="change_eye('one')">
                                    <i class="fas fa-eye one" style="display: none;"></i>
                                    <i class="fas fa-eye-slash one"></i>
                                </span>
                            </div>
                            <div class="form-group bmd-form-group">
                                <label>New Password</label>
                                <input type="password" name="new-pass" class="form-control" id="re-password">
                                <span class="pass_eye" onclick="change_eye('two')">
                                    <i class="fas fa-eye two" style="display: none;"></i>
                                    <i class="fas fa-eye-slash two"></i>
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<?php
require_once '../dashboard_includes/footer.php';
?>