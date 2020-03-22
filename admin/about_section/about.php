<?php
//  include header file
include '../dashboard_includes/session_check.php';
include '../dashboard_includes/header.php';
include '../dashboard_includes/sidebar.php';
include '../dashboard_includes/topNav.php';
$select_about = "SELECT * FROM `about` WHERE `id` = 1";
$sql = mysqli_query($db_connect, $select_about);
$about = mysqli_fetch_assoc($sql);

$select_skill = "SELECT * FROM `skillbar`";
$sql = mysqli_query($db_connect, $select_skill);
function status($status)
{
    echo $status == 1 ? "Checked" : "";
}
?>
<head>
    <title>Edit About</title>
</head>
<div class="content">
    <div class="container-fluid">
        <!-- your content here -->
        <div class="row">
            <div class="col-lg-10">

                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-primary">Edit About Info</h4>
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

                        <form action="/admin/about_section/about-post.php?p=update" method="POST" enctype="multipart/form-data">
                            <div class="form-group bmd-form-group">
                                <div class="avatar">
                                    <img src="" alt="About img" id="ProfileDisplay">
                                    <input type="file" name="aboutImg" onchange="displayImg(this)" id="ProfileImage" style="display: none">
                                    <span onclick="imgup()" class="imgicon"><i class="fas fa-plus"></i></span>
                                </div>
                                <div class="currnt_img d-flex flex-column">
                                    Current about image
                                    <img src="/img/banner/<?= $about['img_dir'] ?>" alt="Current Image" style="width: 200px">
                                </div>
                            </div>

                            <div class="form-group bmd-form-group">
                                <label>About Information</label>
                                <textarea row="3" class="form-control" name="desp"><?= $about['details'] ?>
                                </textarea>
                            </div>
                            <div class="form-group bmd-form-group">
                                <label>Progress Bar Topic</label>
                                <input type="text" name="topic" class="form-control" value="<?= $about['progress_topic'] ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Update About Info</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10">

                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-primary">All Progress Bar</h4>
                    <div class="card-body">
                        <!-- if session found echo that with alert -->
                        <?php if (isset($_SESSION["skillerr"])) : ?>

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oh No! </strong> <?= $_SESSION["skillerr"] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php endif;
                        unset($_SESSION["skillerr"]) ?>
                        <!-- if session found echo that with alert -->
                        <?php if (isset($_SESSION["skillsmsg"])) : ?>

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congrats </strong> <?= $_SESSION["skillsmsg"] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php endif;
                        unset($_SESSION["skillsmsg"]) ?>
                        <!-- if session found echo that with alert -->
                        <?php if (isset($_SESSION["skilldlt"])) : ?>

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congrats </strong> <?= $_SESSION["skilldlt"] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php endif;
                        unset($_SESSION["skilldlt"]) ?>
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <tr>
                                    <th>Sl</th>
                                    <th>Year</th>
                                    <th>Title</th>
                                    <th>Value</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop through all rows from database -->
                                <?php $count = 1;
                                foreach ($sql as $skill) : ?>
                                    <tr>
                                        <!-- echo a colunm -->
                                        <td><?= $count++ ?></td>
                                        <td><?= $skill['year'] ?></td>
                                        <td><?= $skill['skill_name'] ?></td>
                                        <td><?= $skill['value'] ?></td>
                                        <td> <label class="switch">
                                                <a href="/admin/about_section/about-post.php?id=<?= $skill['id'] ?>&p=status">
                                                    <input type="checkbox" name="status" <?= status($skill['status']) ?>>
                                                    <span class="slider round"></span>
                                                </a>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <!-- pass the value of id with session -->
                                            <a data-toggle="modal" data-target="#deleteModal" title="Delete" id="dlbtn" onclick="dltfn(<?= $skill['id'] ?>)"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <a data-toggle="modal" data-target="#skillbar_triger" class="btn bg-primary text-white"><span>Add Progress Bar</span></a>

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

<form action="/admin/about_section/about-post.php?p=skillbar" method="post">
    <div class="modal fade" id="skillbar_triger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">PROGRESSBAR INFO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Completed Year </label>
                        <input type="text" class="form-control" name="year">
                    </div>
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Progress Bar Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">% Completed Value</label>
                        <input type="text" class="form-control" name="value">
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
<script>
    // select model a tag and set href attr
    function dltfn(id) {
        $(".dlt").attr("href", "/admin/about_section/about-post.php?p=delete&id=" + id);
    }
</script>
<?php
include '../dashboard_includes/footer.php';
?>