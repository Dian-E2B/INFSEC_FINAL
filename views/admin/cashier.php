<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Admin | Cashier</title>

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
      <!-- Products Datatable -->
      <div class="row clearfix">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">
            <div class="panel panel-col-purple">
              <div class="panel-heading" role="tab" id="headingOne_17">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseOne_17"
                    aria-expanded="true" aria-controls="collapseOne_17" class="">
                    <i class="material-icons">view_list</i>
                    Products
                  </a>
                </h4>
              </div>
              <div id="collapseOne_17" class="panel-collapse collapse in" role="tabpanel"
                aria-labelledby="headingOne_17" aria-expanded="true">
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dt-products">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th class="text-center">Actions</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel panel-col-purple">
              <div class="panel-heading" role="tab" id="headingTwo_17">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17"
                    href="#collapseTwo_17" aria-expanded="true" aria-controls="collapseTwo_17">
                    <i class="material-icons">shopping_cart</i>
                    Cart
                  </a>
                </h4>
              </div>
              <div id="collapseTwo_17" class="panel-collapse collapse in" role="tabpanel"
                aria-labelledby="headingTwo_17" aria-expanded="false">
                <div class="panel-body">
                  <div class="table-responsive">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="dt-cart">
                        <thead>
                          <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th class="text-center">Actions</th>
                          </tr>
                        </thead>
                      </table>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-t-30">
                      <p class="pull-right" id="p-cart-total">
                        <b>Cart Total</b>
                        <span id="cart-total"></span>
                      </p>
                    </div>
                    <a href="checkout.php" id="proceed-to-checkout" class="btn btn-primary pull-right" disabled>
                      Proceed to Checkout
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="modal-products" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <form method="post" id="form-products">
          <div class="modal-header">
            <h4 class="modal-title text-center" id="modal-title">Quantity</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="form-line" id="field-quantity">
                <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Quantity">
              </div>
              <label class="error" id="error-message"></label>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="operation" id="operation">
            <input type="button" class="btn btn-link waves-effect" data-dismiss="modal" value="CLOSE">
            <input type="submit" class="btn btn-info waves-effect" name="submit" id="submit" value="Add to Cart">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- scripts -->
  <?php include '../../public/admin/sections/scripts.php'; ?>
  <script src="../../public/admin/js/ajax/cashier.js"></script>

</body>

</html>