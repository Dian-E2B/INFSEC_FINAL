<?php

	require 'app/controllers/client/add-to-cart.php';

?>

<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>XYT Online Store</title>
  <!-- Favicon-->
  <link rel="icon" href="public/admin/favicon.ico" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="public/client/css/bootstrap.min.css">
  <!-- animate CSS -->
  <link rel="stylesheet" href="public/client/css/animate.css">
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="public/client/css/owl.carousel.min.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="public/client/css/all.css">
  <link rel="stylesheet" href="public/client/css/nice-select.css">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="public/client/css/flaticon.css">
  <link rel="stylesheet" href="public/client/css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="public/client/css/magnific-popup.css">
  <!-- swiper CSS -->
  <link rel="stylesheet" href="public/client/css/slick.css">
  <!-- swiper CSS -->
  <link rel="stylesheet" href="public/client/css/price_rangs.css">
  <!-- style CSS -->
  <link rel="stylesheet" href="public/client/css/style.css">

</head>

<body>
  <!--::header part start::-->
  <header class="main_menu home_menu">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-11">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php"> <img src="public/client/img/logo.png" alt="logo"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="menu_icon"><i class="fas fa-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="views/client/shop.php">Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="views/client/login.php">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="views/client/register.php">Create Account</a>
                </li>
              </ul>
            </div>
            <div class="hearer_icon d-flex">
              <div class="dropdown cart">
                <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <a href="cart1.html">
                    <i class="ti-bag"></i>
                  </a>
                </a>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- Header part end-->

  <!-- banner part start-->
  <section class="banner_part">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <div class="banner_slider">
            <div class="single_banner_slider">
              <div class="banner_text">
                <div class="banner_text_iner">
                  <h1>WHAT ARE YOU WORKING ON TODAY?</h1>
                  <a href="views/client/shop.php" class="btn_1">shop now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- banner part start-->

  <!-- feature_part start-->
  <section class="feature_part pt-4">
    <div class="container-fluid p-lg-0 overflow-hidden">
      <div class="row align-items-center justify-content-between">

        <?php
        try {
          $query = "SELECT * FROM products WHERE QuantityInStock > 0 ORDER BY date_added DESC LIMIT 3";
          foreach (selectAll($query) as $row) { ?>

        <div class="col-lg-4 col-sm-4">
          <div class="single_feature_post_text">
            <a href="product-details.php?product_id=<?php echo $row['id']; ?>">
              <img src="public/admin/images/products/<?php echo $row['image']; ?>" width="500" alt="#">
            </a>
          </div>
        </div>

        <?php
            } 
          } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
          }
          ?>

      </div>
    </div>
  </section>
  <!-- upcoming_event part start-->

  <!-- new arrival part here -->
  <section class="new_arrival section_padding">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <div class="arrival_tittle">
            <h2>New Arrival</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="new_arrival_iner filter-container">

            <?php

            try {

              $query = "SELECT * FROM products WHERE QuantityInStock > 0 ORDER BY date_added DESC LIMIT 6";
              foreach (selectAll($query) as $row) { ?>
            <?php
                $name = $row['name'];
                $name = strlen($name) > 25 ? substr($name,0,25) . "..." :   $name; ?>

            <div class="single_arrivel_item weidth_2 mix">
              <img src="public/admin/images/products/<?php echo $row['image']; ?>" alt="#">
              <div class="hover_text">
                <a href="product-details.php?product_id=<?php echo $row['id']; ?>">
                  <h3><?php echo $name; ?></h3>
                </a>
                <h5>PHP <?php echo number_format($row['price'], 2); ?></h5>
                <div class="social_icon">
                  <a href="#"><i class="ti-bag"></i></a>
                </div>
              </div>
            </div>

            <?php
              } 
            } catch (PDOException $e) {
              echo "There is some problem in connection: " . $e->getMessage();
            }

            ?>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- new arrival part end -->

  <!--::footer_part start::-->
  <footer class="footer_part">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-sm-6 col-lg-2">
          <div class="single_footer_part">
            <h4>Company</h4>
            <ul class="list-unstyled">
              <li><a href="">About</a></li>
              <li><a href="">News</a></li>
              <li><a href="">FAQ</a></li>
              <li><a href="">Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="single_footer_part">
            <h4>Address</h4>
            <ul class="list-unstyled">
              <li><a href="#">200, Green block, NewYork</a></li>
              <li><a href="#">+10 456 267 1678</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="single_footer_part">
            <h4>Newsletter</h4>
            <div id="mc_embed_signup">
              <form target="_blank"
                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                method="get" class="subscribe_form relative mail_part">
                <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                  class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = ' Email Address '">
                <button type="submit" name="submit" id="newsletter-submit"
                  class="email_icon newsletter-submit button-contactForm">subscribe</button>
                <div class="mt-10 info"></div>
              </form>
            </div>
            <div class="social_icon">
              <a href="#"><i class="ti-facebook"></i></a>
              <a href="#"><i class="ti-twitter-alt"></i></a>
              <a href="#"><i class="ti-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="copyright_text">
            <P>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script> All rights reserved | This
              template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                target="_blank">Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </P>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--::footer_part end::-->

  <!-- jquery plugins here-->
  <script src="public/client/js/jquery-1.12.1.min.js"></script>
  <!-- popper js -->
  <script src="public/client/js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="public/client/js/bootstrap.min.js"></script>
  <!-- easing js -->
  <script src="public/client/js/jquery.magnific-popup.js"></script>
  <!-- swiper js -->
  <script src="public/client/js/swiper.min.js"></script>
  <!-- swiper js -->

  <!-- particles js -->
  <script src="public/client/js/owl.carousel.min.js"></script>
  <script src="public/client/js/jquery.nice-select.min.js"></script>
  <!-- slick js -->
  <script src="public/client/js/slick.min.js"></script>
  <script src="public/client/js/jquery.counterup.min.js"></script>
  <script src="public/client/js/waypoints.min.js"></script>
  <script src="public/client/js/contact.js"></script>
  <script src="public/client/js/jquery.ajaxchimp.min.js"></script>
  <script src="public/client/js/jquery.form.js"></script>
  <script src="public/client/js/jquery.validate.min.js"></script>
  <script src="public/client/js/mail-script.js"></script>
  <script src="public/client/js/stellar.js"></script>
  <script src="public/client/js/price_rangs.js"></script>
  <!-- custom js -->
  <script src="public/client/js/custom.js"></script>
</body>

</html>