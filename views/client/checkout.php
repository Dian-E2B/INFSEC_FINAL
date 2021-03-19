<?php

  session_start();

  if (isset($_SESSION['is_logged_in'])) {
    if ($_SESSION['user']['type'] != 0) {
      header('Location:../../views/admin');
    }
  }

?>

<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Checkout | XYT Online Store</title>

  <!-- Links -->
  <?php include '../../public/client/sections/links.php'; ?>

</head>

<body class="bg-white">
  <!--::header part start::-->
  <?php include '../../public/client/sections/header.php'; ?>

  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <p>Home / Cart / Checkout</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Checkout Area =================-->
  <section class="checkout_area section_padding">
    <div class="container">
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>
            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="first" name="name" />
                <span class="placeholder" data-placeholder="First name"></span>
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="last" name="name" />
                <span class="placeholder" data-placeholder="Last name"></span>
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="add1" name="add1" />
                <span class="placeholder" data-placeholder="Address line 01"></span>
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="number" name="number" />
                <span class="placeholder" data-placeholder="Phone number"></span>
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="email" name="compemailany" />
                <span class="placeholder" data-placeholder="Email Address"></span>
              </div>
            </form>
          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Cart Total</h2>
              <ul class="list list_2">
                <li>
                  <a href="#">Subtotal
                    <span>$2160.00</span>
                  </a>
                </li>
                <li>
                  <a href="#">Shipping
                    <span>Flat rate: $50.00</span>
                  </a>
                </li>
                <li>
                  <a href="#">Total
                    <span>$2210.00</span>
                  </a>
                </li>
              </ul>
              <div class="payment_item active">
                <div class="radion_btn">
                  <input type="radio" id="f-option5" name="selector" checked />
                  <label for="f-option5">Cash on Delivery (COD)</label>
                  <div class="check"></div>
                </div>
                <p>
                  Please send a check to Store Name, Store Street, Store Town,
                  Store State / County, Store Postcode.
                </p>
              </div>
              <div class="creat_account">
                <input type="checkbox" id="f-option4" name="selector" />
                <label for="f-option4">I’ve read and accept the </label>
                <a href="#">terms & conditions*</a>
              </div>
              <a class="btn_3 genric-btn primary e-large" href="#">Place an Order</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->

  <!-- subscribe_area part start-->
  <section class="instagram_photo">
    <div class="container-fluid>
          <div class=" row">
      <div class="col-lg-12">
        <div class="instagram_photo_iner">
          <div class="single_instgram_photo">
            <img src="img/instagram/inst_1.png" alt="">
            <a href="#"><i class="ti-instagram"></i></a>
          </div>
          <div class="single_instgram_photo">
            <img src="img/instagram/inst_2.png" alt="">
            <a href="#"><i class="ti-instagram"></i></a>
          </div>
          <div class="single_instgram_photo">
            <img src="img/instagram/inst_3.png" alt="">
            <a href="#"><i class="ti-instagram"></i></a>
          </div>
          <div class="single_instgram_photo">
            <img src="img/instagram/inst_4.png" alt="">
            <a href="#"><i class="ti-instagram"></i></a>
          </div>
          <div class="single_instgram_photo">
            <img src="img/instagram/inst_5.png" alt="">
            <a href="#"><i class="ti-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!--::subscribe_area part end::-->

  <!--::footer_part start::-->
  <?php include '../../public/client/sections/footer.php'; ?>

  <!-- jquery plugins here-->
  <!-- jquery -->
  <!-- Links -->
  <?php include '../../public/client/sections/scripts.php'; ?>

</body>

</html>