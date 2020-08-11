<?php
//  include header file
require_once '../dashboard_includes/session_check.php';
require_once '../dashboard_includes/header.php';
require_once '../dashboard_includes/sidebar.php';
require_once '../dashboard_includes/topNav.php';
//Select all data from users table
$select_data = "SELECT * FROM `services`";
//run that query
$run_query = mysqli_query($db_connect, $select_data);
//Check service status
function status($status)
{
    echo $status == 1 ? "Checked" : "";
}
?>
<head>
    <title>All Service</title>
</head>

<div class="content">
    <div class="container-fluid">
        <!-- your content here -->
        <div class="row">
            <div class="col-lg-11">

                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-primary">All Service</h4>
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
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop through all rows from database -->
                                <?php $count = 1;
                                foreach ($run_query as $service) : ?>
                                    <tr>
                                        <!-- echo a colunm -->
                                        <td><?= $count++ ?></td>
                                        <td><i class="<?= $service['service_icon'] ?>"></i></td>
                                        <td><?= $service['service_title'] ?></td>
                                        <td><label class="switch">
                                                <a href="/admin/services/all-service-post.php?id=<?= $service['id'] ?>">
                                                    <input type="checkbox" name="status" <?= status($service['status']) ?>>
                                                    <span class="slider round"></span>
                                                </a>
                                            </label>
                                        </td>
                                        <td><?= $service['service_details'] ?></td>
                                        <td class="text-center">
                                            <!-- pass the value of id with session -->
                                            <a data-toggle="modal" data-target="#exampleModal" title="Delete" id="dlbtn"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="alert alert-info" role="alert">
                            Only the first maximum 6 active items will show on the site
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">DELETE CONFIRMATION</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this service?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="/admin/services/delete-service.php?id=<?= $service['id'] ?>" type="button" class="btn btn-danger text-white">Save changes</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>









<?php
require_once '../dashboard_includes/footer.php';
?>