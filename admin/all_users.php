<?php
//  include header file
require_once 'dashboard_includes/session_check.php';
require_once 'dashboard_includes/header.php';
require_once 'dashboard_includes/sidebar.php';
require_once 'dashboard_includes/topNav.php';

//Select all data from users table
$select_data = "SELECT * FROM `users`";
//run that query
$run_query = mysqli_query($db_connect, $select_data);
?>
<head>
    <title>All Users</title>
</head>
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
                        <!-- <p class="card-category">New Students on 15th September, 2016</p> -->
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
                                                <a data-toggle="modal" data-target="#deleteModal" title="Delete" id="dlbtn" onclick="dltfn(<?= $user['id'] ?>)"><span class="text-danger"><i class="fas fa-trash"></i></span></a>

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
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="#" type="button" class="btn btn-danger text-white dlt">Save changes</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->
<?php
require_once 'dashboard_includes/footer.php';
?>
<script>
    // select model a tag and set href attr
    function dltfn(id) {
        $(".dlt").attr("href", "/admin/auth/delete_user.php?id=" + id);
    }
</script>