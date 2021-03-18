<?php

  include_once ('../../../config/connection.php');
  include_once ('../../../config/functions.php');

  //set order id
  $order_id = setOrderID('order_id', 'orders');

  $data = [
    'order_id' => $order_id,
    'user_id' => $user_id,
    'discount' => $discounts,
    'total' => $total,
    'payment_method' => 'Cash Payment'
  ];

  //Add order
  $query = "INSERT INTO orders (order_id, user_id, discount, total, payment_method) VALUES (:order_id, :user_id, :discount, :total, :payment_method)";
  
  if (insert($query, $data)) {
    echo 'hehe';
  } else {
    echo 'uy mali';
  }




