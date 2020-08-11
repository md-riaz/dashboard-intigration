<?php
session_start();
//  include header file
require_once '../dashboard_includes/header.php';
?>

<head>
    <title>Sign In</title>
</head>
<style>
body {
    height: 100%;
}

.main-panel {
    width: 100%;
}

.container {
    min-height: calc(100% - 100px);
    margin-bottom: -100px;
}

.card {
    margin: 100px 0 0 0;
}

.login_page {
    display: inline-block;
    margin: 10px;
}

footer {
    position: relative;
    height: 50px;
    margin-top: 100px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">

            <div class="card card-nav-tabs">
                <h4 class="card-header card-header-primary">Sign In</h4>
                <div class="card-body">
                    <form action="/admin/auth/signin_post.php" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email">
                            <!-- if session found echo that with alert -->
                            <?php if (isset($_SESSION["err"])) : ?>

                            <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                <?= $_SESSION["err"] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <?php endif;
                            unset($_SESSION["err"]) ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password">
                            <span class="pass_eye" onclick="change_eye('one')">
                                <i class="fas fa-eye one" style="display: none;"></i>
                                <i class="fas fa-eye-slash one"></i>
                            </span>
                            <!-- if session found echo that with alert -->
                            <?php if (isset($_SESSION["perr"])) : ?>

                            <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                <?= $_SESSION["perr"] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <?php endif;
                            unset($_SESSION["perr"]) ?>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    Remembar me
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </form>
                </div>
            </div>
            <div class="login_page">
                <p>Don't have an account? </p><a href="/admin/auth/register.php"> Register Here</a>
            </div>

        </div>
    </div>
</div>
<?php
require_once '../dashboard_includes/footer.php';
?>