<head>
    <title>Add Service</title>
</head>
<?php
//  include header file
include '../dashboard_includes/header.php';
include '../dashboard_includes/sidebar.php';
include '../dashboard_includes/session_check.php';

?>
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:;">Services</a>
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
                            <a class="dropdown-item" href="/admin/profile.php">Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/admin/auth/logout.php">Log out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <!-- your content here -->
            <div class="row">
                <div class="col-lg-10">

                    <div class="card card-nav-tabs">
                        <h4 class="card-header card-header-primary">Add Service</h4>
                        <div class="card-body">
                            <!-- if session found echo that with alert -->
                            <?php if (isset($_SESSION["success"])) : ?>

                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Congrats! </strong> <?= $_SESSION["success"] ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <?php endif;
                            unset($_SESSION["success"]) ?>
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

                            <form action="add-service-post.php" method="POST">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Service icon class</label>
                                    <input type="text" class="form-control" name="icon">
                                </div>
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Service Title</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                                <div class="form-group bmd-form-group">
                                    <label>Service Description</label>
                                    <textarea row="3" class="form-control" name="desp">
                                    </textarea>
                                </div>
                                <div class="form-group bmd-form-group">
                                    <label for="status">Status</label><br>
                                    <label class="switch">
                                        <input type="checkbox" name="status" id="status" value="1">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Service</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>









    <?php
    include '../dashboard_includes/footer.php';
    ?>