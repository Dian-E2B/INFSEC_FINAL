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
  <title>Admin | Sales Report</title>

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
              <h2>Sales Report</h2>
            </div>
            <div class="body">

              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable"
                  id="products-table">
                  <thead>
                    <tr>
                      <th>OrderID</th>
                      <th>Name</th>
                      <th>Discounts</th>
                      <th>Total</th>
                      <th>Payment Method</th>
                      <th>Date Ordered</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                      $query = "SELECT orders.order_id, CONCAT(users.firstname, ' ', users.lastname) AS 'name',
                      orders.discount, orders.total, orders.payment_method, orders.ordered_date FROM orders
                      INNER JOIN users ON orders.user_id = users.id";
                      foreach (selectAll($query) as $row) { ?>

                    <tr>
                      <td>
                        <a href="javascript:void(0);">
                          <?php echo $row['order_id']; ?>
                        </a>
                      </td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['discount']; ?></td>
                      <td><?php echo $row['total']; ?></td>
                      <td><?php echo $row['payment_method']; ?></td>
                      <td><?php echo $row['ordered_date']; ?></td>
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