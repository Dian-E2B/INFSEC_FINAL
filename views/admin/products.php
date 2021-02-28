<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Admin | Products</title>

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
      <!-- Products Datatable -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Products</h2>
              <a href="#" class="header-dropdown m-r-5" id="action-add" data-toggle="modal"
                data-target="#modal-product">
                <i class="material-icons">add</i>
              </a>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dt-products">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>ID</th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Supplier</th>
                      <th>Category</th>
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
  <div class="modal fade" id="modal-product" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="post" id="form-product">
          <div class="modal-header">
            <h4 class="modal-title" id="modal-title">New Product</h4>
          </div>
          <div class="modal-body">
            <label class="form-label">Name</label>
            <div class="form-group">
              <div class="form-line">
                <input type="text" id="name" name="name" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Description</label>
              <div class="form-line">
                <textarea rows="1" id="description" name="description" class="form-control no-resize auto-growth"
                  style="overflow: hidden; overflow-wrap: break-word; height: 35px;"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Price</label>
              <div class="form-line">
                <input type="text" id="price" name="price" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Quantity</label>
              <div class="form-line">
                <input type="text" id="quantity" name="quantity" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Category</label>
              <select id="category" name="category" class="form-control show-tick">
                <?php
                  require '../../app/config/functions.php';
                  foreach (selectAll('SELECT * FROM category') as $row): ?>
                <option value="<?php echo $row['id']; ?>">
                  <?php echo $row['name']; ?>
                </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Supplier</label>
              <select id="supplier" name="supplier" class="form-control show-tick">
                <?php
                  foreach (selectAll('SELECT * FROM supplier') as $row): ?>
                <option value="<?php echo $row['id']; ?>">
                  <?php echo $row['name']; ?>
                </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Image</label>
              <input type="file" id="image" name="image" class="form-control">
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
  <script src="../../public/admin/js/ajax/products.js"></script>

</body>

</html>