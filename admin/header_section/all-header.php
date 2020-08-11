<?php
//  include header file
require_once '../dashboard_includes/session_check.php';
require_once '../dashboard_includes/header.php';
require_once '../dashboard_includes/sidebar.php';
require_once '../dashboard_includes/topNav.php';


$select_data = "SELECT * FROM `header`";
$run_query = mysqli_query($db_connect, $select_data);

$select_banner = "SELECT * FROM `banner_img` WHERE `id` = 1";
$sql = mysqli_query($db_connect, $select_banner);
$banner_img = mysqli_fetch_assoc($sql);

$select_social = "SELECT * FROM `social`";
$fire_query = mysqli_query($db_connect, $select_social);
$social_link = mysqli_fetch_assoc($fire_query);
//Check service status
function status($status)
{
    echo $status == 1 ? "Checked" : "";
}
?>
<head>
    <title>All Header Info</title>
</head>

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
                                            <a data-toggle="modal" data-target="#deleteModal" title="Delete" id="dlbtn" onclick="dltfn(<?= $header['id'] ?>)"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <button data-toggle="modal" data-target="#social_triger" class="btn btn-primary"><span>Socail Info</span></button>
                        <button data-toggle="modal" data-target="#banner_triger" class="btn bg-primary"><span>Banner Image</span></button>
                        <div class="alert alert-info" role="alert">
                            Only the first active items will show on the site
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->

        <form action="/admin/header_section/social_info_post.php" method="post">
            <div class="modal fade" id="social_triger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
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
                            <button type="submit" class="btn btn-success text-white">Save changes</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
        <!-- Modal -->
        <div class="modal fade" id="banner_triger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="/admin/header_section/update-banner.php" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">UPDATE BANNER IMAGE</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="avatar">
                                <img src="" alt="Banner img" id="ProfileDisplay">
                                <input type="file" name="BannerImg" onchange="displayImg(this)" id="ProfileImage" style="display: none">
                                <span onclick="imgup()" class="imgicon"><i class="fas fa-plus"></i></span>
                            </div>
                            <div class="currnt_img d-flex">
                                Current banner image
                                <img src="/img/banner/<?= $banner_img['img_dir'] ?>" alt="Current Image" style="max-width: 100%;height: 200px">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success text-white">Save changes</button>
                        </div>
                    </div>
                </form>
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
                        Are you sure you want to delete this message?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="#" type="button" class="btn btn-danger text-white dlt">Save changes</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->
    </div>
</div>







<script>
    // select model a tag and set href attr
    function dltfn(id) {
        $(".dlt").attr("href", "/admin/header_section/delete-header.php?id=" + id);
    }
</script>

<?php
require_once '../dashboard_includes/footer.php';
?>