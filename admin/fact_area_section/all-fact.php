<head>
    <title>All Facts</title>
</head>
<?php
//  include header file
include '../dashboard_includes/header.php';
include '../dashboard_includes/sidebar.php';
include '../dashboard_includes/topNav.php';
include '../dashboard_includes/session_check.php';
//Select all data from users table
$select_data = "SELECT * FROM `fact_areas`";
//run that query
$run_query = mysqli_query($db_connect, $select_data);
//Check service status
function status($status)
{
    echo $status == 1 ? "Checked" : "";
}
?>

    <div class="content">
        <div class="container-fluid">
            <!-- your content here -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="card card-nav-tabs">
                        <h4 class="card-header card-header-primary">All Facts Info</h4>
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
                                        <th>icon</th>
                                        <th>Number of Project</th>
                                        <th>Project Topic</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through all rows from database -->
                                    <?php $count = 1;
                                    foreach ($run_query as $fact) : ?>
                                        <tr>
                                            <!-- echo a colunm -->
                                            <td><?= $count++ ?></td>
                                            <td><i class="<?= $fact['icon'] ?>"></i></td>
                                            <td><?= $fact['project_numbers'] ?></td>
                                            <td><?= $fact['project_topic'] ?></td>
                                            <td> <label class="switch">
                                                    <a href="/admin/fact_area_section/all_fact_post.php?id=<?= $fact['id'] ?>">
                                                        <input type="checkbox" name="status" value="1" <?= status($fact['status']) ?>>
                                                        <span class="slider round"></span></a>
                                                </label>
                                                <input type="hidden" name="id" value="<?= $fact['id'] ?>">
                                            </td>
                                            <td class="text-center">
                                                <!-- pass the value of id with session -->
                                                <a data-toggle="modal" data-target="#exampleModal" title="Delete" id="dlbtn"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <div class="alert alert-info" role="alert">
                                Only the first maximum 4 active items will show on the site
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
                            Are you sure you want to delete this fact info?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="/admin/fact_area_section/delete-fact.php?id=<?= $fact['id'] ?>" type="button" class="btn btn-danger text-white">Save changes</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>









    <?php
    include '../dashboard_includes/footer.php';
    ?>