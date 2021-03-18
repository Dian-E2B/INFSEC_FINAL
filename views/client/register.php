<?php require '../../app/controllers/client/register.php'; ?>
<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register | XYT Online Store</title>

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
              <p>Home / Create Account</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================login_part Area =================-->
  <section class="login_part section_padding">
    <div class="container">
      <div class="row align-items-center">
        <?php echo $message; ?>
        <div class="col-lg-6 col-md-6">
          <div class="login_part_text text-center">
            <div class="login_part_text_iner">
              <h2>Already have an account?</h2>
              <p>
                There are advances being made in science and technology
                everyday, and a good example of this is the hehe.
              </p>
              <a href="login.php" class="btn_3">Login</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="login_part_form">
            <div class="login_part_form_iner">
              <h3>Create Account <br>
                Please fill in this form to create an account.</h3>
              <form class="row contact_form" method="post" data-parsley-validate>
                <div class="col-md-12 form-group p_star">
                  <input type="text" class="form-control" name="firstname" placeholder="First Name" required
                    maxlength="15">
                </div>
                <div class="col-md-12 form-group p_star">
                  <input type="text" class="form-control" name="lastname" placeholder="Last Name" required
                    maxlength="25">
                </div>
                <div class="col-md-12 form-group p_star">
                  <input type="email" class="form-control" name="email" placeholder="Email" required maxlength="30">
                </div>
                <div class="col-md-12 form-group p_star">
                  <input type="password" class="form-control" name="password" placeholder="Password" required
                    data-parsley-length="[6, 25]">
                </div>
                <div class="col-md-12 form-group">
                  <input type="submit" name="register" value="Create Account" class="btn_3 genric-btn primary">
                  <a class="lost_pass" href="javascript:void(0);">forget password?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--================login_part end =================-->

  <!--::footer_part start::-->
  <?php include '../../public/client/sections/footer.php'; ?>


  <!-- jquery plugins here-->
  <!-- jquery -->
  <!-- Links -->
  <?php include '../../public/client/sections/scripts.php'; ?>

</body>

</html>