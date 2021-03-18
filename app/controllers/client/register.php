<?php
  include_once ('../../app/config/connection.php');
  include_once ('../../app/config/functions.php');

  $message = "";

  if(isset($_POST['register'])) {

    $id = setID('id', 'users');
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = hash("sha512", $_POST['password']);
    $email = $_POST['email'];

    $data = [
      'id' => $id,
      'firstname' => $firstname,
      'lastname' => $lastname,
      'email' => $email,
      'password' => $password,
    ];

    try {
      $query = "INSERT INTO users (id, firstname, lastname, email, password) VALUES (:id, :firstname, :lastname, :email, :password)";
      insert($query, $data);

      $message = '
      <div class="col-lg-12 col-md-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Registration Successful!</strong> Congratulations, your account has been successfully created.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    ';
    } catch (Exception $e) {
      $message = '
      <div class="col-lg-12 col-md-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Registration Failed!</strong> Email already exists, you can try logging in with this email.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    ';
    }

  }