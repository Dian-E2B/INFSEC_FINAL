<?php

  include_once ('../../../config/connection.php');
  include_once ('../../../config/functions.php');

  $query = "SELECT SUM(products.price * cart.quantity) AS 'subtotal' FROM cart INNER JOIN products ON cart.product_id = products.id WHERE user_id = :id AND cart_code = :id";
  $cart = findRow($query, -1);

  if ($_POST['type'] == 'true') {
    $user_id = $_POST['user_id'];
  }
  
  if ($_POST['type'] == 'false') {
    $user_id = -1;
  }

  $subtotal = $cart['subtotal'];
  $vat = number_format($subtotal * 0.12, 2);

  if ($_POST['discounts'] == 'true') {
    $discounts = number_format($subtotal * 0.20, 2);
    $vat = number_format(0 , 2);
  }
  
  if ($_POST['discounts'] == 'false') {
    $discounts = number_format(0 , 2);
  }

  $total = ($subtotal + $vat) - $discounts;

  $output = array();
  $output['subtotal'] = $subtotal;
  $output['vat'] = $vat;
  $output['discounts'] = $discounts;
  $output['total'] = $total;
  $output['user_id'] = $user_id;


  echo json_encode($output);


