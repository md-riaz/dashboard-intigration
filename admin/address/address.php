<?php
//  include header file
require_once '../dashboard_includes/session_check.php';
require_once '../dashboard_includes/header.php';
require_once '../dashboard_includes/sidebar.php';
require_once '../dashboard_includes/topNav.php';
$select_address = "SELECT * FROM `address` WHERE `id` = 1";
$sql = mysqli_query($db_connect, $select_address);
$address = mysqli_fetch_assoc($sql);

?>
<head>
    <title>Edit Address</title>
</head>

<div class="content">
    <div class="container-fluid">
        <!-- your content here -->
        <div class="row">
            <div class="col-lg-10">

                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-primary">Address</h4>
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
                        <!-- if session found echo that with alert -->
                        <?php if (isset($_SESSION["emerr"])) : ?>

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oh No! </strong> <?= $_SESSION["emerr"] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php endif;
                        unset($_SESSION["emerr"]) ?>

                        <form action="/admin/address/address-post.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group bmd-form-group">
                                <label>City Name</label>
                                <input type="text" name="city" value="<?= $address['city'] ?>" class="form-control">
                            </div>
                            <div class="form-group bmd-form-group">
                                <label>Full Address</label>
                                <input type="text" name="address" class="form-control" value="<?= $address['address'] ?>">
                            </div>
                            <div class="form-group bmd-form-group">
                                <label>Phone Number</label>
                                <input type="text" name="num" class="form-control" value="<?= $address['phone'] ?>">
                            </div>
                            <div class="form-group bmd-form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" value="<?= $address['email'] ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Address</button>
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