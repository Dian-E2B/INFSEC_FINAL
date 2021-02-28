<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Admin | Suppliers</title>

  <!-- links -->
  <?php include '../../public/admin/sections/links.php'; ?>

</head>

<body class="theme-teal">
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
      <!-- Supplier Datatable -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Suppliers</h2>
              <a href="#" class="header-dropdown m-r-5" id="action-add" data-toggle="modal"
                data-target="#modal-supplier">
                <i class="material-icons">add</i>
              </a>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dt-supplier">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Phone Number</th>
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
  <div class="modal fade" id="modal-supplier" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <form method="post" id="form-supplier">
          <div class="modal-header">
            <h4 class="modal-title" id="modal-title">New Supplier</h4>
          </div>
          <div class="modal-body">
            <label for="name">Name</label>
            <div class="form-group">
              <div class="form-line">
                <input type="text" id="name" name="name" class="form-control">
              </div>
            </div>

            <label for="name">Address</label>
            <div class="form-group">
              <div class="form-line">
                <input type="text" id="address" name="address" class="form-control">
              </div>
              <div class="help-info">(Optional)</div>
            </div>

            <label for="name">Phone Number</label>
            <div class="form-group">
              <div class="form-line">
                <input type="text" id="phone-number" name="phone-number" class="form-control"
                  placeholder="Ex. +639123789168">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="operation" id="operation">
            <input type="button" class="btn btn-link waves-effect" data-dismiss="modal" value="CLOSE">
            <input type="submit" class="btn btn-info waves-effect" name="submit" id="submit" value="ADD">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Are you sure?</h4>
        </div>
        <div class="modal-body">
          <p>Once deleted, you will not be able to recover this data.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
          <button type="button" id="btn-delete" class="btn btn-danger waves-effect">Yes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- scripts -->
  <?php include '../../public/admin/sections/scripts.php'; ?>

  <script src="../../public/admin/js/ajax/supplier.js"></script>

</body>

</html>