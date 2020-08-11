<?php

require_once 'db.php';
//Select all data from messages table
$count_msg = "SELECT COUNT(*) as totalmsg FROM `messages` WHERE `status` = 0";
$msg_select = "SELECT * FROM `messages` WHERE `status` = 0";
//run that query
$count_query = mysqli_query($db_connect, $count_msg);
$msg_query = mysqli_query($db_connect, $msg_select);
$msg_num = mysqli_fetch_assoc($count_query);
?>
<style>
  .msg {
    display: flex;
  }

  .msgDeatils {
    margin: 0 0 0 15px;
  }

  .mtitle {
    margin: 0;
  }

  .msubtitle {
    color: gray;
  }

  .msg>a {
    width: 500px !important;
  }
</style>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <form class="navbar-form">
        <span class="bmd-form-group">
          <div class="input-group no-border">
            <input type="text" value="" class="form-control" placeholder="Search...">
            <button type="submit" class="btn btn-white btn-round btn-just-icon">
              <i class="material-icons">search</i>
              <div class="ripple-container"></div>
            </button>
          </div>
        </span>
      </form>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="javascript:;">
            <i class="material-icons">dashboard</i>
            <p class="d-lg-none d-md-block">
              Stats
            </p>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">notifications</i>
            <span class="notification"><?= $msg_num['totalmsg'] ?></span>
            <p class="d-lg-none d-md-block">
              Some Actions
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right msg" aria-labelledby="navbarDropdownMenuLink">

            <?php foreach ($msg_query as $msgd) : ?>
              <a class="dropdown-item" href="/admin/messages/msg.php?id=<?= $msgd['id'] ?>">
                <div class="msg">
                  <div class="msgImg">
                    <img src="https://i.pravatar.cc/100" alt="" width="50">
                  </div>
                  <div class="msgDeatils">
                    <p class="mtitle"><?= $msgd['name'] ?></p>
                    <p class="msubtitle"><?= substr($msgd['message'], 0, 60) . "..." ?></p>
                  </div>
                </div>
              </a>
            <?php endforeach ?>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p class="d-lg-none d-md-block">
              Account
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" href="/admin/profile.php">Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/admin/auth/logout.php">Log out</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->