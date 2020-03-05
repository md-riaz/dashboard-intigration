<head>
    <title>Edit Profile</title>
</head>
<?php
//  include header file
include 'dashboard_includes/header.php';
include 'dashboard_includes/session_check.php';
include 'dashboard_includes/sidebar.php';
// get id value from url
$id = $_GET["id"];
//Select data from users table whose id matches url id
$select_data = "SELECT * FROM `users` WHERE id = $id";
//run that query
$run_query = mysqli_query($db_connect, $select_data);
// Get data values as associative array
$user = mysqli_fetch_assoc($run_query);
?>




<div class="main-panel ps-container ps-theme-default" data-ps-id="e27f76da-1cfb-d537-0c10-d254e217a5bd">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:;">Edit Profile</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <form class="navbar-form">
                    <span class="bmd-form-group">
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Search...">
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </span>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:;">
                            <i class="material-icons">dashboard</i>
                            <p class="d-lg-none d-md-block">
                                Stats
                            </p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">notifications</i>
                            <span class="notification">5</span>
                            <p class="d-lg-none d-md-block">
                                Some Actions
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Mike John responded to your email</a>
                            <a class="dropdown-item" href="#">You have 5 new tasks</a>
                            <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                            <a class="dropdown-item" href="#">Another Notification</a>
                            <a class="dropdown-item" href="#">Another One</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person</i>
                            <p class="d-lg-none d-md-block">
                                Account
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Log out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
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
                            <form action="auth/edit_user_post.php?id=<?= $id ?>&user=<?= $user['usernames'] ?>" method="POST" enctype="multipart/form-data">
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="avatar">
                                            <img src="<?= $user['img_dir'] ?>" alt="Profile Pic" id="ProfileDisplay">
                                            <input type="file" name="ProfileImage" onchange="displayImg(this)" id="ProfileImage" style="display: none">
                                            <span onclick="imgup()" class="imgicon"><i class="fas fa-plus"></i></span>
                                        </div>
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
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>About Me</label>
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
    include 'dashboard_includes/footer.php'; ?>