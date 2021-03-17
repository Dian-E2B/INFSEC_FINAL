<?php

include_once ('../../../config/connection.php');
include_once ('../../../config/functions.php');

if(isset($_POST["id"])) {
  $product_id = $_POST['id'];

  $query = "SELECT * FROM cart WHERE product_id = :id AND cart_code = -1";
  $row = findRow($query, $product_id);
  
  if ($row['quantity'] > 1) {
    update("UPDATE cart SET quantity = (quantity - 1) WHERE cart_id = :cart_id", ['cart_id' => $row['cart_id']]);
  }
  
  if ($row['quantity'] == 1) {
    delete("DELETE FROM cart WHERE cart_id = :cart_id", ['cart_id' => $row['cart_id']]);
  }

  update("UPDATE products SET QuantityInStock = (QuantityInStock + 1) WHERE id = :id", ['id' => $product_id]);

}