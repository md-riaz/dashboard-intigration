<head>
    <title>All Header Info</title>
</head>
<?php
//  include header file
include '../dashboard_includes/header.php';
include '../dashboard_includes/sidebar.php';
include '../dashboard_includes/session_check.php';
//Select all data from users table
$select_data = "SELECT * FROM `header`";
$select_social = "SELECT * FROM `social`";
//run that query
$run_query = mysqli_query($db_connect, $select_data);
$fire_query = mysqli_query($db_connect, $select_social);
$social_link = mysqli_fetch_assoc($fire_query);
//Check service status
function status($status)
{
    echo $status == 1 ? "Checked" : "";
}
?>
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:;">Header info</a>
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
                <div class="col-lg-12">

                    <div class="card card-nav-tabs">
                        <h4 class="card-header card-header-primary">All Header Info</h4>
                        <div class="card-body table-responsive">
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
                            <table class="table table-hover">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>CTA Button Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through all rows from database -->
                                    <?php $count = 1;
                                    foreach ($run_query as $header) : ?>
                                        <tr>
                                            <!-- echo a colunm -->
                                            <td><?= $count++ ?></td>
                                            <td><?= $header['header_title'] ?></td>
                                            <td><?= $header['header_desp'] ?></td>
                                            <td><?= $header['cta_btn'] ?></td>
                                            <td> <label class="switch">
                                                    <a href="/admin/header_section/all-header-post.php?id=<?= $header['id'] ?>">
                                                        <input type="checkbox" name="status" <?= status($header['status']) ?>>
                                                        <span class="slider round"></span>
                                                    </a>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <!-- pass the value of id with session -->
                                                <a data-toggle="modal" data-target="#exampleModal" title="Delete" id="dlbtn"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <button data-toggle="modal" data-target="#social_triger" class="btn btn-primary"><span>Socail Info</span></button>
                            <div class="alert alert-info" role="alert">
                                Only the first active items will show on the site
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="social_triger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">EDIT SOCIAL LINKS</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Facebook Link</label>
                                    <input type="text" class="form-control" name="fb_id" value="<?= $social_link['fb'] ?>">
                                </div>
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Twitter Link</label>
                                    <input type="text" class="form-control" name="twitter_id" value="<?= $social_link['twitter'] ?>">
                                </div>
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Instagram Link</label>
                                    <input type="text" class="form-control" name="insta_id" value="<?= $social_link['insta'] ?>">
                                </div>
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Pinterest Link</label>
                                    <input type="text" class="form-control" name="pinterest_id" value="<?= $social_link['pinterest'] ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="/admin/header_section/social_info_post.php" type="button" class="btn btn-success text-white">Save changes</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            Social

        </div>
    </div>









    <?php
    include '../dashboard_includes/footer.php';
    ?>