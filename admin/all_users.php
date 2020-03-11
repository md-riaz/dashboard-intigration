<head>
    <title>All Users</title>
</head>
<?php
//  include header file
include 'dashboard_includes/header.php';
include 'dashboard_includes/sidebar.php';
include 'dashboard_includes/session_check.php';

//Select all data from users table
$select_data = "SELECT * FROM `users`";
//run that query
$run_query = mysqli_query($db_connect, $select_data);
?>



<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:;">All Users Info</a>
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


            <!-- if session found echo that with alert -->
            <?php if (isset($_SESSION["succm"])) : ?>

                <div class="alert alert-info  alert-dismissible fade show" role="alert">
                    <?= $_SESSION["succm"] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php endif;
            unset($_SESSION["succm"]) ?>
            <!-- if session found echo that with alert -->
            <?php if (isset($_SESSION["success"])) : ?>

                <div class="alert alert-info  alert-dismissible fade show" role="alert">
                    <?= $_SESSION["success"] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php endif;
            unset($_SESSION["success"]) ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Student Stats</h4>
                            <p class="card-category">New Students on 15th September, 2016</p>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email Address</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through all rows from database -->
                                    <?php foreach ($run_query as $user) : ?>
                                        <tr>
                                            <!-- echo a colunm -->
                                            <td><?= $user['id'] ?></td>
                                            <td><?= $user['names'] ?></td>
                                            <td><?= $user['usernames'] ?></td>
                                            <td><?= $user['emails'] ?></td>
                                            <td><?= role($user['role']) ?></td>
                                            <td>
                                                <!-- pass the value of id with session -->
                                                <a title="View" href="/admin/user_profile.php?id=<?= $user['id'] ?>"><span class="text-info"><i class="far fa-address-card"></i></span></a>

                                                <?php if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2 || $_SESSION["role"] == 3) : ?>
                                                    <a title="Edit" href="/admin/user.php?id=<?= $user['id'] ?>"><span class="text-warning"><i class="far fa-edit"></i></span></a>
                                                <?php endif; ?>
                                                <?php if ($_SESSION["role"] == 1) : ?>
                                                    <a data-toggle="modal" data-target="#deleteModal<?= $user['id'] ?>" title="Delete" id="dlbtn"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteModal<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">DELETE CONFIRMATION</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete your account? If you delete your account, you will permanently lose all your information.
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <a href="/admin/auth/delete_user.php?id=<?= $user['id'] ?>" type="button" class="btn btn-danger text-white">Save changes</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal End -->
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <button onclick="window.print();" type="button" class="btn btn-info"><i class="material-icons"> local_printshop </i> Print</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <?php
    include 'dashboard_includes/footer.php';
    ?>