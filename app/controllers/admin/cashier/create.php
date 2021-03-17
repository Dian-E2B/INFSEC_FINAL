<?php

include_once ('../../../config/connection.php');
include_once ('../../../config/functions.php');

  if (isset($_POST['operation'])) {

    if (empty($_POST['quantity'])) {
      echo 'This field is required.';
    } else if(!(is_numeric($_POST['quantity']) && $_POST['quantity'] > 0 && $_POST['quantity'] == round($_POST['quantity'], 0))) {
      echo 'Please enter a valid number.';
    
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
      }

      if (!empty($row)) {
        $query = "UPDATE cart SET quantity = (quantity + :quantity) WHERE product_id = :product_id AND cart_code = :cart_code";
        echo (!empty(update($query, $data))) ? 'add to cart' : 'hehe';
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