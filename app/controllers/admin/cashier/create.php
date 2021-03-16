<?php

include_once ('../../../config/connection.php');
include_once ('../../../config/functions.php');

  if (isset($_POST['operation'])) {

    if (empty($_POST['quantity'])) {
      echo 'This field is required.';
    } else if(!(is_numeric($_POST['quantity']) && $_POST['quantity'] > 0 && $_POST['quantity'] == round($_POST['quantity'], 0))) {
      echo 'Please enter a valid number.';
    
    } else {

    if ($_POST["operation"] == "Edit") {

      $data = [
        'product_id' => $_POST['id'],
        'quantity' => $_POST['quantity'],
        'cart_code' => -1
      
      ];

      $query = "INSERT INTO cart (product_id, quantity, cart_code) VALUES (:product_id, :quantity, :cart_code)";
      echo (!empty(insert($query, $data))) ? 'add product' : 'hehe';

    }
    
    }

  }