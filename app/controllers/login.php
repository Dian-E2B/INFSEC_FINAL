<?php
  include_once ('app/config/connection.php');
  include_once ('app/config/functions.php');

  session_start();

  $message = "";

  if (isset($_POST['login'])) {
    
    $email_address = $_POST['email-address'];
    $password = hash("sha512", $_POST['password']);
    
    $data = [
      'email' => $email_address,
      'password' => $password
    ];

    $query = "SELECT * FROM users WHERE email=:email AND password=:password";
    $result = login($query, $data);
    if (!empty($result)) {
      $_SESSION['user'] = $result;
      $_SESSION['is_logged_in'] = true;
      
      if ($_SESSION['user']['type'] == 0) {
        header('Location:index.php');
      } elseif ($_SESSION['user']['type'] == 1) {
        header('Location:views/admin');
      }

    } else {

      $message = '
        <div class="col-lg-12 col-md-12">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Failded!</strong> The email or password you’ve entered is incorrect.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      ';


    }
  }