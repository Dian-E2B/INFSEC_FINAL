<?php

  session_start();

  if (isset($_SESSION['is_logged_in'])) {
    if ($_SESSION['user']['type'] != 1) {
      header('Location:../../');
    }
  } else {
    header('Location:../../');
  }

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Admin | Backup & Restore</title>

  <!-- links -->
  <?php include '../../public/admin/sections/links.php'; ?>

</head>

<body class="theme-purple">
  <!-- Page Loader -->
  <?php include '../../public/admin/sections/page-loader.php'; ?>

  <!-- Overlay For Sidebars -->
  <div class="overlay"></div>

  <!-- Top Bar -->
  <?php include '../../public/admin/sections/top-bar.php'; ?>

  <!-- Left Side Bar -->
  <?php include '../../public/admin/sections/left-sidebar/leftsidebar.php'; ?>

  <section class="content">
    <div class="container-fluid">
      <!-- Category Datatable -->
      <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Backup & Restore</h2>
            </div>
            <div class="body">
              <form method="post" action="../../app/controllers/admin/backup-restore/backup.php">
                <div class="form-group">
                  <label for="database">Export Database:</label>
                  <input type="submit" value="Backup" class="form-control btn bg-purple mt-2">
                </div>
              </form>

              <form method="post" action="../../app/controllers/admin/backup-restore/restore.php"
                enctype="multipart/form-data">
                <div class="form-group mt-2">
                  <label for="exampleFormControlFile1">Import SQL File:</label>
                  <input type="file" name="database-file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <input type="submit" name="restore" value="Restore" class="form-control btn bg-purple mt-2">
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Blocked Users</h2>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dt-blocked-users">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="modal-unblock" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Are you sure you want to unblock this user?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
          <button type="button" id="btn-unblock" class="btn bg-purple waves-effect">Yes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- scripts -->
  <?php include '../../public/admin/sections/scripts.php'; ?>
  <script src="../../public/admin/js/ajax/settings.js"></script>


</body>

</html>