<?php
// <!-- include header file -->
require_once '../dashboard_includes/session_check.php';
require_once '../dashboard_includes/header.php';
require_once '../dashboard_includes/sidebar.php';
require_once '../dashboard_includes/topNav.php';
?>
<head>
  <title>Dashboard</title>
</head>

<div class="content">
  <div class="container-fluid">
    <!-- your content here -->
    <div class="row">
      <div class="col-lg-12">

      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">DELETE CONFIRMATION</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete your account? If you delete your account, you will permanently lose all your information.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger">Save changes</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<?php
require_once '../dashboard_includes/footer.php';
?>

<script>
  $.notify({
    icon: "/admin/dashboard_assets/user_img/<?= $_SESSION['img_dir'] ?>",
    title: "<?= $_SESSION['names'] ?>",
    message: 'Welcome to dashboard <mark> <?= $_SESSION['names'] ?></mark>.'
  }, {
    type: 'minimalist',
    delay: 1000,
    icon_type: 'image',
    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
      '<img data-notify="icon" class="img-circle pull-left" style="height: 50px">' +
      '<span data-notify="title">{1}</span>' +
      '<span data-notify="message">{2}</span>' +
      '</div>'
  });
</script>