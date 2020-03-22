<?php
//  include header file
include '../dashboard_includes/session_check.php';
include '../dashboard_includes/header.php';
include '../dashboard_includes/sidebar.php';
include '../dashboard_includes/topNav.php';
$select_testimonials = "SELECT * FROM `testimonials`";
$sql = mysqli_query($db_connect, $select_testimonials);
function status($status)
{
    echo $status == 1 ? "Checked" : "";
}
?>
<head>
    <title>Testimonials</title>
</head>

<div class="content">
    <div class="container-fluid">
        <!-- your content here -->

        <div class="row">
            <div class="col-lg-12">

                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-primary">All Testimonials</h4>
                    <div class="card-body">
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
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Comment/Message</th>
                                    <th>Designation</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop through all rows from database -->
                                <?php $count = 1;
                                foreach ($sql as $testimonial) : ?>
                                    <tr>
                                        <!-- echo a colunm -->
                                        <td><?= $count++ ?></td>
                                        <td><img src="/img/testi_avatar/<?= $testimonial['img_dir'] ?>" alt="" width="100" height="100" style="object-fit: cover"></td>
                                        <td><?= $testimonial['name'] ?></td>
                                        <td><?= substr($testimonial['msg'], 0, 100) . "..." ?></td>
                                        <td><?= $testimonial['designation'] ?></td>
                                        <td> <label class="switch">
                                                <a href="/admin/testimonial/testimonial-post.php?id=<?= $testimonial['id'] ?>&p=status">
                                                    <input type="checkbox" name="status" <?= status($testimonial['status']) ?>>
                                                    <span class="slider round"></span>
                                                </a>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <!-- pass the value of id with session -->
                                            <a data-toggle="modal" data-target="#deleteModal" title="Delete" id="dlbtn" onclick="dltfn(<?= $testimonial['id'] ?>)"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <a data-toggle="modal" data-target="#portfolio_triger" class="btn bg-primary text-white"><span>Add Testimonial</span></a>

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

<form action="/admin/testimonial/testimonial-post.php?p=testimonial" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="portfolio_triger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Testimonial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="bmd-label-floating">Display Picture</label>
                    <input type="file" name="img" required>
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Designation</label>
                        <input type="text" class="form-control" name="designation" required>
                    </div>

                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Comment/Message</label>
                        <textarea class="form-control" name="msg" cols="30" rows="5" required></textarea>
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
        $(".dlt").attr("href", "/admin/testimonial/testimonial-post.php?p=delete&id=" + id);
    }
</script>
<?php
include '../dashboard_includes/footer.php';
?>