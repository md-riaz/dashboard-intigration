<head>
    <title>All Brands</title>
</head>
<?php
//  include header file
include '../dashboard_includes/session_check.php';
include '../dashboard_includes/header.php';
include '../dashboard_includes/sidebar.php';
include '../dashboard_includes/topNav.php';
$select_brands = "SELECT * FROM `brands`";
$sql = mysqli_query($db_connect, $select_brands);
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
                    <h4 class="card-header card-header-primary">All Brands</h4>
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
                                    <th>Brand Logo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop through all rows from database -->
                                <?php $count = 1;
                                foreach ($sql as $brands) : ?>
                                    <tr>
                                        <!-- echo a colunm -->
                                        <td><?= $count++ ?></td>
                                        <td><img src="/img/brand/<?= $brands['img_dir'] ?>" alt="" class="bg-secondary"></td>
                                        <td> <label class="switch">
                                                <a href="/admin/brands/brands-post.php?id=<?= $brands['id'] ?>&p=status">
                                                    <input type="checkbox" name="status" <?= status($brands['status']) ?>>
                                                    <span class="slider round"></span>
                                                </a>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <!-- pass the value of id with session -->
                                            <a data-toggle="modal" data-target="#deleteModal" title="Delete" id="dlbtn" onclick="dltfn(<?= $brands['id'] ?>)"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <a data-toggle="modal" data-target="#brands_triger" class="btn bg-primary text-white"><span>Add New Brand Logo</span></a>

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

<form action="/admin/brands/brands-post.php?p=brand" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="brands_triger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Brand Logo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group bmd-form-group">
                        <div class="avatar">
                            <img src="" alt="Brand img" id="ProfileDisplay" class="brand">
                            <input type="file" name="img" onchange="displayImg(this)" id="ProfileImage" style="display: none" class="brand2">
                            <span onclick="imgup()" class="imgicon"><i class="fas fa-plus"></i></span>
                        </div>
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
        $(".dlt").attr("href", "/admin/brands/brands-post.php?p=delete&id=" + id);
    }
</script>
<?php
include '../dashboard_includes/footer.php';
?>