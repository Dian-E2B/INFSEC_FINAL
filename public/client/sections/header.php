<?php

  $default_nav_item_status = null;
  $nav_item_status = 'hidden';

  if (isset($_SESSION['is_logged_in'])) {
    $default_nav_item_status = 'hidden';
    $nav_item_status = null;
  }

?>

<!--::header part start::-->
<header class="main_menu home_menu">
  <div class="container-fluid">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-11">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="index.php"> <img src="../../public/client/img/logo.png" alt="logo"> </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu_icon"><i class="fas fa-bars"></i></span>
          </button>

          <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="../../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.php">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" <?php echo $nav_item_status; ?>>
                  <?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']; ?>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../app/controllers/client/logout.php" <?php echo $nav_item_status; ?>>Logout</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php" <?php echo $default_nav_item_status; ?>>Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register.php" <?php echo $default_nav_item_status; ?>>Create
                  Account</a>
              </li>
            </ul>
          </div>
          <div class="hearer_icon d-flex">
            <div class="dropdown cart">
              <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <a href="cart.php">
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