<?php

include_once ('../../../config/connection.php');
include_once ('../../../config/functions.php');

  if (isset($_POST['operation'])) {

    $row = findRow("SELECT * FROM products WHERE id = :id", $_POST['id']);

    if (empty($_POST['quantity'])) {
      echo 'This field is required.';
    } else if(!(is_numeric($_POST['quantity']) && $_POST['quantity'] > 0 && $_POST['quantity'] == round($_POST['quantity'], 0))) {
      echo 'Please enter a valid number.';
    
    } else if ($_POST['quantity'] >= $row['QuantityInStock']) {
      echo 'Please enter a value less than or equal to ' . $row['QuantityInStock'];
    
    } else {

    if ($_POST["operation"] == "Add to Cart") {

      $data = [
        'product_id' => $_POST['id'],
        'quantity' => $_POST['quantity'],
        'cart_code' => -1
      
      ];

      $row = findRow("SELECT * FROM cart WHERE product_id = :id AND cart_code = -1", $_POST['id']);

      if (empty($row)) {
          $query = "INSERT INTO cart (product_id, quantity, cart_code) VALUES (:product_id, :quantity, :cart_code)";
          echo (!empty(insert($query, $data))) ? 'add to cart' : 'hehe';
      
      } else if (!empty($row)) {

        $query = "UPDATE cart SET quantity = (quantity + :quantity) WHERE cart_id = :cart_id";
        echo (!empty(update($query, ['cart_id' => $row['cart_id']]))) ? 'add to cart' : 'hehe';
      }

      $data = [
        'id' => $_POST['id'],
        'quantity' => $_POST['quantity'],
      ];

      $query = "UPDATE products SET QuantityInStock = (QuantityInStock - :quantity) WHERE id = :id";
      update($query, $data);


    }
    
    }

  }