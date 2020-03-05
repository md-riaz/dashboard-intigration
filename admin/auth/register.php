<head>
    <title>Registration</title>
</head>
<?php
//  include header file
include '../dashboard_includes/header.php';
if (!isset($_SESSION["email"]) && !isset($_SESSION["username"]) && !isset($_SESSION["name"]) && !isset($_SESSION["university"])) {
    $_SESSION["email"] = "";
    $_SESSION["username"] = "";
    $_SESSION["name"] = "";
    $_SESSION["university"] = "";
}
?>
<style>
    body {
        height: 100%;
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
                <h4 class="card-header card-header-primary">Registration</h4>
                <div class="card-body">
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

                    <form action="/admin/auth/reg_post.php" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email" value="<?= $_SESSION['email'] ?>">
                            <!-- if session found echo that with alert -->
                            <?php if (isset($_SESSION["emerr"])) : ?>

                                <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                    <?= $_SESSION["emerr"] ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <?php endif;
                            unset($_SESSION["emerr"]) ?>
                            <!-- if session found echo that with alert -->
                            <?php if (isset($_SESSION["emDerr"])) : ?>

                                <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                    <?= $_SESSION["emDerr"] ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <?php endif;
                            unset($_SESSION["emDerr"]) ?>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input name="username" type="text" class="form-control" id="username" value="<?= $_SESSION['username'] ?>">
                            <!-- if session found echo that with alert -->
                            <?php if (isset($_SESSION["uerr"])) : ?>

                                <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                    <?= $_SESSION["uerr"] ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <?php endif;
                            unset($_SESSION["uerr"]) ?>
                            <!-- if session found echo that with alert -->
                            <?php if (isset($_SESSION["uDerr"])) : ?>

                                <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                    <?= $_SESSION["uDerr"] ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <?php endif;
                            unset($_SESSION["uDerr"]) ?>
                        </div>
                        <div class="form-group">
                            <label for="fname">Full Name</label>
                            <input name="fname" type="text" class="form-control" id="fname" value="<?= $_SESSION['name'] ?>">
                            <!-- if session found echo that with alert -->
                            <?php if (isset($_SESSION["fnerr"])) : ?>

                                <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                    <?= $_SESSION["fnerr"] ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <?php endif;
                            unset($_SESSION["fnerr"]) ?>
                        </div>
                        <div class="form-group">
                            <label for="university">Name of University</label>
                            <input name="university" type="text" class="form-control" id="university" value="<?= $_SESSION['university'] ?>">
                            <!-- if session found echo that with alert -->
                            <?php if (isset($_SESSION["unierr"])) : ?>

                                <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                    <?= $_SESSION["unierr"] ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <?php endif;
                            unset($_SESSION["unierr"]) ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password">
                            <span class="pass_eye" onclick="change_eye('one')">
                                <i class="fas fa-eye one" style="display: none;"></i>
                                <i class="fas fa-eye-slash one"></i>
                            </span>
                            <!-- if session found echo that with alert -->
                            <?php if (isset($_SESSION["passerr"])) : ?>

                                <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                    <?= $_SESSION["passerr"] ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <?php endif;
                            unset($_SESSION["passerr"]) ?>
                        </div>
                        <div class="form-group">
                            <label for="re-password">Confirm Password</label>
                            <input name="re-password" type="password" class="form-control" id="re-password">
                            <span class="pass_eye" onclick="change_eye('two')">
                                <i class="fas fa-eye two" style="display: none;"></i>
                                <i class="fas fa-eye-slash two"></i>
                            </span>
                            <!-- if session found echo that with alert -->
                            <?php if (isset($_SESSION["repasserr"])) : ?>

                                <div class="alert alert-info  alert-dismissible fade show" role="alert">
                                    <?= $_SESSION["repasserr"] ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <?php endif;
                            unset($_SESSION["repasserr"]) ?>
                        </div>
                        <div class="form-group">
                            <p>Gender</p>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" checked> Male
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input name="gender" class="form-check-input" type="radio" id="inlineRadio2" value="Female"> Female
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="login_page">
                <p>Already have an account? </p><a href="/admin/auth/signin.php"> Sign in</a>
            </div>
        </div>
    </div>
</div>
<?php
include '../dashboard_includes/footer.php';
?>