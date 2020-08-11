<?php
//  include header file
require_once '../dashboard_includes/session_check.php';
require_once '../dashboard_includes/header.php';
require_once '../dashboard_includes/sidebar.php';
require_once '../dashboard_includes/topNav.php';
$select = "SELECT * FROM `logo` WHERE `id` = 1";
$sql = mysqli_query($db_connect, $select);
$data = mysqli_fetch_assoc($sql);
?>

<head>
    <title>Update Brand Image</title>
</head>



<div class="content">
    <div class="container-fluid">
        <!-- your content here -->
        <div class="row">
            <div class="col-lg-10">

                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-primary">Update Brand Image</h4>
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
                        <div class="d-flex justify-content-around">
                            <form action="/admin/logo/logo-post.php?p=brand" method="POST" enctype="multipart/form-data">
                                <div class="form-group bmd-form-group">
                                    <div class="avatar">
                                        <img src="" alt="Brand img" id="ProfileDisplay" class="main_brand3">
                                        <input type="file" name="brandImg" onchange="displayImg2(this, 'two')" id="ProfileImage" style="display: none" class="main_brand4">
                                        <span onclick="imgup2('one')" class="imgicon"><i class="fas fa-plus"></i></span>
                                    </div>
                                    <div class="currnt_img d-flex flex-column">
                                        Current Brand image
                                        <img src="/img/logo/<?= $data['main_img'] ?>" alt="Current Image" style="width: 200px" class="bg-dark">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Brand Logo</button>
                            </form>
                            <form action="/admin/logo/logo-post.php?p=secondary" method="POST" enctype="multipart/form-data">
                                <div class="form-group bmd-form-group">
                                    <div class="avatar">
                                        <img src="" alt="Brand img" id="ProfileDisplay" class="main_brand">
                                        <input type="file" name="secondaryimg" onchange="displayImg2(this, 'one')" id="ProfileImage" style="display: none" class="main_brand2">
                                        <span onclick="imgup2('two')" class="imgicon"><i class="fas fa-plus"></i></span>
                                    </div>
                                    <div class="currnt_img d-flex flex-column">
                                        Current Secondary image
                                        <img src="/img/logo/<?= $data['secondary_img'] ?>" alt="Current Image" style="width: 200px" class="bg-dark">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Secondary Logo</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function imgup2(data) {
        if (data == "one") {
            var img = document.querySelector(".main_brand4");

        } else {
            var img = document.querySelector(".main_brand2");
        }
        img.click()
    }

    function displayImg2(e, data2) {
        if (data2 == "one") {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector(".main_brand").setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        } else {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector(".main_brand3").setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    }
</script>
<?php
require_once '../dashboard_includes/footer.php';
?>