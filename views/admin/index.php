<?php

  include_once ('../../app/config/connection.php');
  include_once ('../../app/config/functions.php');

  session_start();

 if (isset($_SESSION['is_logged_in'])) {
    if ($_SESSION['user']['type'] != 1) {
      header('Location:../../');
    }
  } else {
    header('Location:../../');
  }


  //Total No. of Products
  $no_of_products = rowCount('SELECT * FROM products');
  //Total No. of Suppliers
  $no_of_suppliers = rowCount('SELECT * FROM supplier WHERE id != 0');
  //Total No. of Orders
  $no_of_orders = rowCount('SELECT * FROM orders');
  // $no_of_orders = rowCount('SELECT * FROM orders WHERE ordered_date <=(CURDATE() - INTERVAL 3 DAY)');

  //Total No. of users
  $no_of_users = rowCount('SELECT * FROM users WHERE id != -1');


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Admin | Home</title>

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
      <div class="block-header">
        <h2>DASHBOARD</h2>
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <div class="icon">
              <i class="material-icons">view_list</i>
            </div>
            <div class="content">
              <div class="text">PRODUCTS</div>
              <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">
                <?php echo $no_of_products; ?></div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <div class="icon">
              <i class="material-icons">local_shipping</i>
            </div>
            <div class="content">
              <div class="text">SUPPLIERS</div>
              <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">
                <?php echo $no_of_suppliers; ?></div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-cyan">
            <div class="icon">
              <i class="material-icons">show_chart</i>
            </div>
            <div class="content">
              <div class="text">ORDERS</div>
              <div class="number count-to" data-from="0" data-to="117" data-speed="1000" data-fresh-interval="20">
                <?php echo $no_of_orders; ?></div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-purple">
            <div class="icon">
              <i class="material-icons">group</i>
            </div>
            <div class="content">
              <div class="text">USERS</div>
              <div class="number count-to" data-from="0" data-to="1432" data-speed="1500" data-fresh-interval="20">
                <?php echo $no_of_users; ?></div>
            </div>
          </div>
        </div>
      </div>

      <div class="row clearfix">
        <!-- Products Below 30(Quantity) -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="card">
            <div class="body bg-red">
              <div class="m-b--35 font-bold">Products Below 30(Quantity)</div>
              <ul class="dashboard-stat-list">
                <?php
                                    $count = 0;
                                    $query = "SELECT * FROM products WHERE QuantityInStock <= 30 ORDER BY QuantityInStock LIMIT 5";
                                    $rows = selectAll($query);
                                    foreach ($rows as $row): $count++; ?>
                <li>
                  <?php echo $count . '. ' . $row['name']; ?>
                  <span class="pull-right"><b><?php echo $row['QuantityInStock']; ?></b>
                    <small>Left</small></span>
                </li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>
        </div>

        <!-- New Products -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" hidden>
          <div class="card">
            <div class="body bg-teal">
              <div class="m-b--35 font-bold">New Products</div>
              <ul class="dashboard-stat-list">
                <?php
                                    $count = 0;
                                    $query = "SELECT * FROM products ORDER BY date_added DESC LIMIT 5";
                                    $rows = selectAll($query);
                                    foreach ($rows as $row): $count++; ?>
                <li>
                  <?php echo $count . '. ' . $row['name']; ?>
                </li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>
        </div>

        <!-- Salable Products -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="card">
            <div class="body bg-green">
              <div class="font-bold m-b--35">Salable Products</div>
              <ul class="dashboard-stat-list">
                <?php
                                    $count = 0;
                                    $query = "SELECT * FROM products ORDER BY QuantitySold DESC LIMIT 5";
                                    $rows = selectAll($query);
                                    foreach ($rows as $row): $count++; ?>
                <li>
                  <?php echo $count . '. ' . $row['name']; ?>
                  <span class="pull-right"><b><?php echo $row['QuantitySold']; ?></b>
                    <small>Solds</small></span>
                </li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>
        </div>
        <!-- #END# Answered Tickets -->
        <!-- Answered Tickets -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="card">
            <div class="body bg-cyan">
              <div class="font-bold m-b--35">Unsalable Products</div>
              <ul class="dashboard-stat-list">
                <?php
                                    $count = 0;
                                    $query = "SELECT * FROM products ORDER BY QuantitySold ASC LIMIT 5";
                                    $rows = selectAll($query);
                                    foreach ($rows as $row): $count++; ?>
                <li>
                  <?php echo $count . '. ' . $row['name']; ?>
                  <span class="pull-right"><b><?php echo $row['QuantitySold']; ?></b>
                    <small>Solds</small></span>
                </li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>
        </div>
        <!-- #END# Answered Tickets -->
      </div>

    </div>
  </section>

  <!-- scripts -->
  <?php include '../../public/admin/sections/scripts.php'; ?>

</body>

</html>