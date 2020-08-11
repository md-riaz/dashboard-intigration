<?php
//  include header file
require_once '../dashboard_includes/session_check.php';
require_once '../dashboard_includes/header.php';
require_once '../dashboard_includes/sidebar.php';
require_once '../dashboard_includes/topNav.php';
$select_portfolio = "SELECT * FROM `portfolio`";
$sql = mysqli_query($db_connect, $select_portfolio);
function status($status)
{
    echo $status == 1 ? "Checked" : "";
}
?>
<head>
    <title>Best Works</title>
</head>

<div class="content">
    <div class="container-fluid">
        <!-- your content here -->

        <div class="row">
            <div class="col-lg-12">

                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-primary">All Portfolio Works</h4>
                    <div class="card-body">
                        <!-- if session found echo that with alert -->
                        <?php if (isset($_SESSION["err01"])) : ?>

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oh No! </strong> <?= $_SESSION["err01"] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php endif;
                        unset($_SESSION["err01"]) ?>
                        <!-- if session found echo that with alert -->
                        <?php if (isset($_SESSION["err02"])) : ?>

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oh No! </strong> <?= $_SESSION["err02"] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php endif;
                        unset($_SESSION["err02"]) ?>
                        <!-- if session found echo that with alert -->
                        <?php if (isset($_SESSION["err03"])) : ?>

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oh No! </strong> <?= $_SESSION["err03"] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php endif;
                        unset($_SESSION["err03"]) ?>
                        <!-- if session found echo that with alert -->
                        <?php if (isset($_SESSION["err04"])) : ?>

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oh No! </strong> <?= $_SESSION["err04"] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php endif;
                        unset($_SESSION["err04"]) ?>

                        <!-- if session found echo that with alert -->
                        <?php if (isset($_SESSION["smsg"])) : ?>

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congrats </strong> <?= $_SESSION["smsg"] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php endif;
                        unset($_SESSION["smsg"]) ?>

                        <table class="table table-hover">
                            <thead class="text-primary">
                                <tr>
                                    <th>Sl</th>
                                    <th>Category</th>
                                    <th>Project Name</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop through all rows from database -->
                                <?php $count = 1;
                                foreach ($sql as $portfolio) : ?>
                                    <tr>
                                        <!-- echo a colunm -->
                                        <td><?= $count++ ?></td>
                                        <td><?= $portfolio['category'] ?></td>
                                        <td><?= $portfolio['project_name'] ?></td>
                                        <td><?= $portfolio['title'] ?></td>
                                        <td><?= substr($portfolio['desp'], 0, 150) . "..." ?></td>
                                        <td> <label class="switch">
                                                <a href="/admin/portfolio/portfolio-post.php?id=<?= $portfolio['id'] ?>&p=status">
                                                    <input type="checkbox" name="status" <?= status($portfolio['status']) ?>>
                                                    <span class="slider round"></span>
                                                </a>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <!-- pass the value of id with session -->
                                            <a data-toggle="modal" data-target="#deleteModal" title="Delete" id="dlbtn" onclick="dltfn(<?= $portfolio['id'] ?>)"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <a data-toggle="modal" data-target="#portfolio_triger" class="btn bg-primary text-white"><span>Add New Work</span></a>

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
                Are you sure you want to delete this ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="#" type="button" class="btn btn-danger text-white dlt">Save changes</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->
<!-- Modal -->

<form action="/admin/portfolio/portfolio-post.php?p=portfolio" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="portfolio_triger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Work</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Category</label>
                        <input type="text" class="form-control" name="category" required>
                    </div>
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Project Name</label>
                        <input type="text" class="form-control" name="project_name" required>
                    </div>
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <label class="bmd-label-floating">Project Image</label>
                    <input type="file" name="img" required>
                    <label class="bmd-label-floating">Project Details Image</label>
                    <input type="file" name="img2" required>
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Description</label>
                        <textarea class="form-control" name="desp" cols="30" rows="10" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success text-white">Save changes</button>
                </div>
            </div>

        </div>
    </div>
</form>
<!-- Modal End -->
<script>
    // select model a tag and set href attr
    function dltfn(id) {
        $(".dlt").attr("href", "/admin/portfolio/portfolio-post.php?p=delete&id=" + id);
    }
</script>
<?php
require_once '../dashboard_includes/footer.php';
?>