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

              <form method="post" action="../../app/controllers/admin/backup-restore/restore.php" enctype="multipart/form-data">
                <div class="form-group mt-2">
                  <label for="exampleFormControlFile1">Import SQL File:</label>
                  <input type="file" name="database-file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <input type="submit" name="restore" value="Restore" class="form-control btn bg-purple mt-2">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- scripts -->
  <?php include '../../public/admin/sections/scripts.php'; ?>

</body>

</html>