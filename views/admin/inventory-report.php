<?php
  include_once ('../../app/config/connection.php');
  include_once ('../../app/config/functions.php');
    
  session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Admin | Inventory Report</title>

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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Inventory Report</h2>
            </div>
            <div class="body">

              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable"
                  id="products-table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Sold</th>
                      <th>Supplier</th>
                      <th>Category</th>
                      <th>Date Added</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                      $query = "SELECT products.id, products.name, products.price, products.QuantityInStock, products.QuantitySold, supplier.name as 'supplier_name', category.name as 'category_name', products.date_added FROM products INNER JOIN category ON products.category_id = category.id INNER JOIN supplier ON products.supplier_id = supplier.id WHERE products.QuantityInStock > 0";

                      foreach (selectAll($query) as $row) { ?>

                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['price']; ?></td>
                      <td>
                        <span class="label bg-<?php echo ($row['QuantityInStock']<=30) ? 'red' : 'green'; ?>">
                          <?php echo $row['QuantityInStock']; ?>
                        </span>
                      </td>
                      <td><?php echo $row['QuantitySold']; ?></td>
                      <td><?php echo $row['supplier_name']; ?></td>
                      <td><?php echo $row['category_name']; ?></td>
                      <td><?php echo $row['date_added']; ?></td>
                    </tr>

                    <?php } ?>

                  </tbody>
                </table>
              </div>
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