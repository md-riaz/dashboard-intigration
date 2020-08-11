<head>
    <title>Edit Profile</title>
</head>
<?php
//  include header file
require_once 'dashboard_includes/session_check.php';
require_once 'dashboard_includes/header.php';
require_once 'dashboard_includes/sidebar.php';
require_once 'dashboard_includes/topNav.php';
// get id value from url
$id = $_GET["id"];
//Select data from users table whose id matches url id
$select_data = "SELECT * FROM `users` WHERE id = $id";
//run that query
$run_query = mysqli_query($db_connect, $select_data);
// Get data values as associative array
$user = mysqli_fetch_assoc($run_query);
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Profile</h4>
                        <p class="card-category">Complete your profile</p>
                    </div>
                    <div class="card-body">
                        <form action="auth/edit_user_post.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Username</label>
                                        <input type="text" class="form-control" name="username" value="<?= $user['usernames']; ?>">
                                    </div>

                                    <!-- if session found echo that with alert -->
                                    <?php if (isset($_SESSION["uerr"])) : ?>

                                        <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                            <?= $_SESSION["uerr"] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    <?php endif;
                                    unset($_SESSION["uerr"]) ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Email address</label>
                                        <input type="email" class="form-control" name="email" value="<?= $user['emails']; ?>">
                                    </div>
                                    <!-- if session found echo that with alert -->
                                    <?php if (isset($_SESSION["emerr"])) : ?>

                                        <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                            <?= $_SESSION["emerr"] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    <?php endif;
                                    unset($_SESSION["emerr"]) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Full Name</label>
                                        <input type="text" class="form-control" name="name" value="<?= $user['names']; ?>">
                                    </div>
                                </div>
                                <!-- if session found echo that with alert -->
                                <?php if (isset($_SESSION["fnerr"])) : ?>

                                    <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                        <?= $_SESSION["fnerr"] ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                <?php endif;
                                unset($_SESSION["fnerr"]) ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">University</label>
                                        <input type="text" class="form-control" name="university" value="<?= $user['university']; ?>">
                                    </div>
                                </div>
                                <!-- if session found echo that with alert -->
                                <?php if (isset($_SESSION["unierr"])) : ?>

                                    <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                        <?= $_SESSION["unierr"] ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                <?php endif;
                                unset($_SESSION["unierr"]) ?>
                            </div>
                            <?php if ($_SESSION["role"] == 1) : ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="my-select">Select a role</label>
                                            <select id="my-select" class="custom-select" name="role">
                                                <option value="0">user</option>
                                                <option value="1">admin</option>
                                                <option value="2">moderator</option>
                                                <option value="3">editor</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="avatar">
                                        <img src="/admin/dashboard_assets/user_img/<?= $user['img_dir'] ?>" alt="Profile Pic" id="ProfileDisplay">
                                        <input type="file" name="ProfileImage" onchange="displayImg(this)" id="ProfileImage" style="display: none">
                                        <span onclick="imgup()" class="imgicon"><i class="fas fa-plus"></i></span>
                                    </div>
                                    <p>File size is <span class="size">0KB</span></p>
                                    <!-- if session found echo that with alert -->
                                    <?php if (isset($_SESSION["typeerr"])) : ?>

                                        <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                            <?= $_SESSION["typeerr"] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    <?php endif;
                                    unset($_SESSION["typeerr"]) ?>
                                    <!-- if session found echo that with alert -->
                                    <?php if (isset($_SESSION["err"])) : ?>

                                        <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                            <?= $_SESSION["err"] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    <?php endif;
                                    unset($_SESSION["err"]) ?>
                                    <!-- if session found echo that with alert -->
                                    <?php if (isset($_SESSION["serr"])) : ?>

                                        <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                            <?= $_SESSION["serr"] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    <?php endif;
                                    unset($_SESSION["serr"]) ?>
                                    <!-- if session found echo that with alert -->
                                    <?php if (isset($_SESSION["typeerr"])) : ?>

                                        <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                            <?= $_SESSION["typeerr"] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    <?php endif;
                                    unset($_SESSION["typeerr"]) ?>
                                    <!-- if session found echo that with alert -->
                                    <?php if (isset($_SESSION["err"])) : ?>

                                        <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                            <?= $_SESSION["err"] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    <?php endif;
                                    unset($_SESSION["err"]) ?>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating"> Tell us about yourself</label>
                                            <textarea class="form-control" rows="5" name="about"><?= $user['about']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'dashboard_includes/footer.php'; ?>