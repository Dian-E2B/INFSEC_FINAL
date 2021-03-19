<?php

  include_once ('app/config/connection.php');
  include_once ('app/config/functions.php');

try {

	if (isset($_SESSION['is_logged_in'])) {
		if (isset($_GET['add-to-cart'])) {

			$product_id = $_GET['add-to-cart'];
			$user_id =  $_SESSION['user']['id'];
			$quantity = 1;

			$data = [
				'cart_code' => 1,
				'user_id' => $user_id,
				'product_id' => $product_id
			];

			$product = searchInCart($data);
			if (empty($product)) {

				$data = [
					'product_id' => $product_id,
					'user_id' => $user_id,
					'quantity' => $quantity,
					'cart_code' => 1
				];

				$query = "INSERT INTO cart (user_id, product_id, quantity, cart_code) VALUES (:user_id, :product_id, :quantity, :cart_code)";
				insert($query, $data);

			} else {

				$quantity = $product['quantity'] + 1;
				$data = [
					'quantity' => $quantity,
					'user_id' => $user_id,
					'product_id' => $product_id
				];

				$query = "UPDATE cart SET quantity = :quantity WHERE cart_code = 1 AND user_id = :user_id AND product_id = :product_id";
				update($query, $data);

			}
		}

	} elseif (!isset($_SESSION['is_logged_in']) && isset($_GET['add-to-cart'])) {
		header("Location: views/client/login.php");
	}

} catch (Exception $e) {
	echo "Wala na add :(" . $e;
}