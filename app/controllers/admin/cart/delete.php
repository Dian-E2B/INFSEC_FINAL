<?php

include_once ('../../../config/connection.php');
include_once ('../../../config/functions.php');

if(isset($_POST["id"])) {

    if(!empty(delete("DELETE FROM cart WHERE product_id = :id AND cart_code = -1", ['id' => $_POST['id']]))) {
        echo 'Product has been removed from the cart.';
    }
}