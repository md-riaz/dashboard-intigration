<?php
//  include header file
require_once '../dashboard_includes/session_check.php';
require_once '../dashboard_includes/header.php';
require_once '../dashboard_includes/sidebar.php';
require_once '../dashboard_includes/topNav.php';
$select_copyright = "SELECT * FROM `copyright` WHERE `id` = 1";
$sql = mysqli_query($db_connect, $select_copyright);
$copyright = mysqli_fetch_assoc($sql);

?>
<head>
    <title>Edit Copyright</title>
</head>

<div class="content">
    <div class="container-fluid">
        <!-- your content here -->
        <div class="row">
            <div class="col-lg-8">

                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-primary">Copyright Section</h4>
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
                        <?php if (isset($_SESSION["err"])) : ?>

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oh No! </strong> <?= $_SESSION["err"] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php endif;
                        unset($_SESSION["err"]) ?>

                        <form action="/admin/copyright/post.php" method="POST">
                            <div class="form-group bmd-form-group">
                                <label>Copyright Name</label>
                                <input type="text" name="copyright" value="<?= $copyright['copyright_name'] ?>" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<?php
require_once '../dashboard_includes/footer.php';
?>