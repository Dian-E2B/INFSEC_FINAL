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
  <title>Shop | XYT Online Store</title>

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
              <p>Home / Category</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Category Product Area =================-->
  <section class="cat_product_area section_padding border_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="left_sidebar_area">
            <aside class="left_widgets p_filter_widgets sidebar_box_shadow">
              <div class="l_w_title">
                <h3>Categories</h3>
              </div>
              <div class="widgets_inner">
                <ul class="list">
                  <li>
                    <a href="#">Mirrors</a>
                  </li>
                  <li>
                    <a href="#">Tires</a>
                  </li>
                  <li>
                    <a href="#">Helmets</a>
                  </li>
                  <li>
                    <a href="#">Gloves</a>
                  </li>
                </ul>
              </div>
            </aside>

          </div>
        </div>
        <div class="col-lg-9">
          <div class="row">
            <div class="col-lg-12">
              <div class="product_top_bar d-flex justify-content-between align-items-center">
                <div class="single_product_menu product_bar_item">
                  <h2>Womans (12)</h2>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="single_category_product">
                <div class="single_category_img">
                  <img src="../../public/client/img/category/category_1.png" alt="">
                  <div class="category_social_icon">
                    <ul>
                      <li><a href="#"><i class="ti-bag"></i></a></li>
                    </ul>
                  </div>
                  <div class="category_product_text">
                    <a href="single-product.html">
                      <h5>Long Sleeve TShirt</h5>
                    </a>
                    <p>$150.00</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="single_category_product">
                <div class="single_category_img">
                  <img src="../../public/client/img/category/category_2.png" alt="">
                  <div class="category_social_icon">
                    <ul>
                      <li><a href="#"><i class="ti-bag"></i></a></li>
                    </ul>
                  </div>
                  <div class="category_product_text">
                    <a href="single-product.html">
                      <h5>Long Sleeve TShirt</h5>
                    </a>
                    <p>$150.00</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="single_category_product">
                <div class="single_category_img">
                  <img src="../../public/client/img/category/category_3.png" alt="">
                  <div class="category_social_icon">
                    <ul>
                      <li><a href="#"><i class="ti-bag"></i></a></li>
                    </ul>
                  </div>
                  <div class="category_product_text">
                    <a href="single-product.html">
                      <h5>Long Sleeve TShirt</h5>
                    </a>
                    <p>$150.00</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="single_category_product">
                <div class="single_category_img">
                  <img src="../../public/client/img/category/category_4.png" alt="">
                  <div class="category_social_icon">
                    <ul>
                      <li><a href="#"><i class="ti-bag"></i></a></li>
                    </ul>
                  </div>
                  <div class="category_product_text">
                    <a href="single-product.html">
                      <h5>Long Sleeve TShirt</h5>
                    </a>
                    <p>$150.00</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="single_category_product">
                <div class="single_category_img">
                  <img src="../../public/client/img/category/category_5.png" alt="">
                  <div class="category_social_icon">
                    <ul>
                      <li><a href="#"><i class="ti-bag"></i></a></li>
                    </ul>
                  </div>
                  <div class="category_product_text">
                    <a href="single-product.html">
                      <h5>Long Sleeve TShirt</h5>
                    </a>
                    <p>$150.00</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="single_category_product">
                <div class="single_category_img">
                  <img src="../../public/client/img/category/category_6.png" alt="">
                  <div class="category_social_icon">
                    <ul>
                      <li><a href="#"><i class="ti-bag"></i></a></li>
                    </ul>
                  </div>
                  <div class="category_product_text">
                    <a href="single-product.html"><a href="single-product.html">
                        <h5>Long Sleeve TShirt</h5>
                      </a></a>
                    <p>$150.00</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="single_category_product">
                <div class="single_category_img">
                  <img src="../../public/client/img/category/category_7.png" alt="">
                  <div class="category_social_icon">
                    <ul>
                      <li><a href="#"><i class="ti-bag"></i></a></li>
                    </ul>
                  </div>
                  <div class="category_product_text">
                    <a href="single-product.html">
                      <h5>Long Sleeve TShirt</h5>
                    </a>
                    <p>$150.00</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="single_category_product">
                <div class="single_category_img">
                  <img src="../../public/client/img/category/category_8.png" alt="">
                  <div class="category_social_icon">
                    <ul>
                      <li><a href="#"><i class="ti-bag"></i></a></li>
                    </ul>
                  </div>
                  <div class="category_product_text">
                    <a href="single-product.html">
                      <h5>Long Sleeve TShirt</h5>
                    </a>
                    <p>$150.00</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="single_category_product">
                <div class="single_category_img">
                  <img src="../../public/client/img/category/category_9.png" alt="">
                  <div class="category_social_icon">
                    <ul>
                      <li><a href="#"><i class="ti-bag"></i></a></li>
                    </ul>
                  </div>
                  <div class="category_product_text">
                    <a href="single-product.html">
                      <h5>Long Sleeve TShirt</h5>
                    </a>
                    <p>$150.00</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="single_category_product">
                <div class="single_category_img">
                  <img src="../../public/client/img/category/category_10.png" alt="">
                  <div class="category_social_icon">
                    <ul>
                      <li><a href="#"><i class="ti-bag"></i></a></li>
                    </ul>
                  </div>
                  <div class="category_product_text">
                    <a href="single-product.html">
                      <h5>Long Sleeve TShirt</h5>
                    </a>
                    <p>$150.00</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="single_category_product">
                <div class="single_category_img">
                  <img src="../../public/client/img/category/category_11.png" alt="">
                  <div class="category_social_icon">
                    <ul>
                      <li><a href="#"><i class="ti-bag"></i></a></li>
                    </ul>
                  </div>
                  <div class="category_product_text">
                    <a href="single-product.html">
                      <h5>Long Sleeve TShirt</h5>
                    </a>
                    <p>$150.00</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="single_category_product">
                <div class="single_category_img">
                  <img src="../../public/client/img/category/category_12.png" alt="">
                  <div class="category_social_icon">
                    <ul>
                      <li><a href="#"><i class="ti-bag"></i></a></li>
                    </ul>
                  </div>
                  <div class="category_product_text">
                    <a href="single-product.html">
                      <h5>Long Sleeve TShirt</h5>
                    </a>
                    <p>$150.00</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 text-center">
              <a href="#" class="btn_2">
                < Prev</a>
                  <a href="#" class="btn_2">Next ></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Category Product Area =================-->

  <!--::footer_part start::-->
  <?php include '../../public/client/sections/footer.php'; ?>


  <!-- jquery plugins here-->
  <!-- jquery -->
  <!-- Links -->
  <?php include '../../public/client/sections/scripts.php'; ?>

</body>

</html>