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
                  <h2>Auto Parts</h2>
                </div>
              </div>
            </div>

            <?php

              try {

                include_once ('../../app/config/connection.php');
                include_once ('../../app/config/functions.php');

                  $page = 1;
                  $hide = null;
                  $total_no_per_page = 12;

                  $total_products = rowCount('SELECT * FROM products');
                  $total_pages = ceil($total_products/$total_no_per_page);

                  if (isset($_GET['page-no'])) {
                      $page = $_GET['page-no'];
                  } elseif (isset($_GET['prev'])) {
                      $page = $_GET['prev'] - 1;
                      if ($page == 0) {
                          $page++;
                      }
                  } elseif (isset($_GET['next'])) {
                      $page = $_GET['next'] + 1;
                      if (($page - 1) == $total_pages) {
                          $page--;
                      }
                  }

                  $startAt = ($page - 1) * $total_no_per_page;

                  if (isset($_POST['search'])) {
                      $product_name = $_POST['search-product'];
                      if (!empty($product_name)) {
                          $hide = 'hidden';
                          $query = "SELECT * FROM products WHERE QuantityInStock > 0 AND name LIKE '%" . $product_name . "%'";
                      } else {
                          $page = 1;
                          $query = "SELECT * FROM products WHERE QuantityInStock > 0 LIMIT ". $total_no_per_page ."";
                      }
                  } else {
                      $query = "SELECT * FROM products WHERE QuantityInStock > 0 LIMIT ". $startAt .", ". $total_no_per_page ."";
                  }

                  $rows = selectAll($query);
                  foreach ($rows as $row) {
                      $name = $row['name'];
                      $name = strlen($name) > 25 ? substr($name,0,25) . "..." :   $name;
              ?>

            <div class="col-lg-4 col-sm-6">
              <div class="single_category_product">
                <div class="single_category_img">
                  <img src="../../public/admin/images/products/<?php echo $row['image']; ?>" alt="">
                  <div class="category_social_icon">
                    <ul>
                      <li>
                        <a href="product-details.php?product_id=<?php echo $row['id']; ?>"><i class="ti-bag"></i></a>
                      </li>
                    </ul>
                  </div>
                  <div class="category_product_text">
                    <a href="single-product.html">
                      <h5><?php echo $name; ?></h5>
                    </a>
                    <p>PHP <?php echo number_format($row['price'], 2); ?></p>
                  </div>
                </div>
              </div>
            </div>

            <?php
                    }
                } catch (PDOException $e) {
                    echo "There is some problem in connection: " . $e->getMessage();
                }

                ?>






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