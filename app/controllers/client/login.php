<?php
  include_once ('../../app/config/connection.php');
  include_once ('../../app/config/functions.php');

  $message = "";

  if (isset($_POST['login'])) {
    
    $email_address = $_POST['email-address'];
    $password = hash("sha512", $_POST['password']);
    
    $data = ['email' => $email_address];

    $query = "SELECT * FROM users WHERE email=:email";
    $is_email_exists = login($query, $data);

    if($is_email_exists) {
      $data = [
        'email' => $email_address,
        'password' => $password
      ];

      $query = "SELECT * FROM users WHERE email=:email AND password=:password";
      $is_user_found = login($query, $data);

      if ($is_user_found) {
        $_SESSION['user'] = $is_user_found;
        $_SESSION['is_logged_in'] = true;

        $data = ['email' => $email_address];

        $query = 'UPDATE users SET attempts = 0 WHERE email = :email';
        update($query, $data);
  
        if ($result['type'] == 1) {
          header('Location:../../views/admin');
        } else if ($result['type'] == 0 && $result['attempts'] < 3) {
          header('Location:../../index.php');
        } else if ($result['type'] == 0 && $result['attempts'] >= 3) {
          $message = '
          <div class="col-lg-12 col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <h4 class="alert-heading">Oops! Something went wrong.</h4>
              <p>
                Your account has been locked due to reaching the maximum 3 failed login attempts. Please contact your system administrator to unlock your account.
              </p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        ';
        }
      } else {

        $data = ['email' => $email_address];

        $query = 'UPDATE users SET attempts = (attempts + 1) WHERE email = :email AND type != 1';
        update($query, $data);

        $query = "SELECT * FROM users WHERE email=:email";
        $user = login($query, $data);

        if ($user['type'] == 0 && $user['attempts'] >= 3) {
          $message = '
          <div class="col-lg-12 col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <h4 class="alert-heading">Oops! Something went wrong.</h4>
              <p>
                Your account has been locked due to reaching the maximum 3 failed login attempts. Please contact your system administrator to unlock your account.
              </p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        ';
        } else {
          $message = '
          <div class="col-lg-12 col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Login Failed!</strong> The email or password you’ve entered is incorrect.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        ';
        }
      }
    } else {
      $message = '
        <div class="col-lg-12 col-md-12">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Failed!</strong> The email or password you’ve entered is incorrect.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      ';
    }
  }