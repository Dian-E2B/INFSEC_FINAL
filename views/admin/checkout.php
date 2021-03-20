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
  <title>Admin | Checkout</title>

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
      <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <a href="cashier.php" class="btn bg-blue-grey">
                <i class="material-icons" style="font-size:1.6rem;">shopping_cart</i>
                Back to Cart
              </a>
            </div>
            <div class="body">
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <p>
                    <b>Customer Type</b>
                    <div class="demo-checkbox m-l-15">
                      <input type="checkbox" id="type" name="type[]">
                      <label for="type">Regular</label>
                      <select class="form-control show-tick" id="name" name="name" data-live-search="true">
                        <?php
                            require '../../app/config/functions.php';
                            foreach (selectAll("SELECT * FROM users WHERE type = 0") as $row) { ?>

                        <option value="<?php echo $row['id']; ?>">
                          <?php echo $row['id']. ' - ' . $row['firstname'] . ' ' . $row['lastname']; ?>
                        </option>

                        <?php } ?>
                      </select>
                    </div>
                  </p>
                  <p>
                    <b>Discounts</b>
                    <div class="demo-checkbox">
                      <div class="col-xs-11">
                        <input type="checkbox" id="discounts-checkbox" name="discounts-checkbox[]">
                        <label for="discounts-checkbox">Senior Citizen</label>
                        <input type="text" id="discounts-input" maxlength="8" name="senior-id"
                          class="form-control m-l-10" required disabled>
                      </div>
                    </div>
                  </p>
                  <button type="submit" id="apply-changes" class="btn bg-purple pull-right">
                    <i class="material-icons" style="font-size:1.6rem;">refresh</i>
                    Apply Changes
                  </button>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" id="invoice">
          <div class="card">
            <div class="header">
              <h2>Invoice</h2>
            </div>
            <div class="body">
              <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <p class="m-l-10">Subtotal</p>
                  <p class="m-l-10">VAT (12%)</p>
                  <p class="m-l-10">Discounts</p>
                  <hr>
                  <p class="m-l-10">
                    <b>Total</b>
                  </p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <p id="subtotal">0.00</p>
                  <p id="vat">0.00</p>
                  <p id="discounts">0.00</p>
                  <hr>
                  <p id="total">0.00</p>
                  <br>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Cash Payment -->
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Payment</h2>
            </div>
            <div class="body">
              <label for="cash">Cash</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" name="cash" id="cash" class="form-control" placeholder="Enter cash" disabled
                    required>
                </div>
              </div>
              <label for="cash">Change</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" name="change" id="change" value="0.00" class="form-control" disabled>
                </div>
                <br>
                <input type="button" name="pay-cash" id="pay" value="Pay" class="btn bg-purple pull-right"
                  disabled>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- scripts -->
  <?php include '../../public/admin/sections/scripts.php'; ?>
  <script src="../../public/admin/js/ajax/checkout.js"></script>

</body>

</html>