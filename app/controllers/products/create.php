<?php

  include_once ('../../config/connection.php');
  include_once ('../../config/functions.php');

  date_default_timezone_set('Asia/Manila');

  if (isset($_POST['operation'])) {

    $is_empty = false;
    $values = array('name', 'description', 'price', 'quantity');

    foreach ($values as $value) {
      if (empty($_POST[$value])) {
        $is_empty = true;
        break;

      } else {
        $is_empty = false;
      }
    
    }

    if ($is_empty) {
      echo 'Something went wrong.';
    } else {
      if ($_POST['operation'] == "Add") {

        $image = '';
        if($_FILES["image"]["name"] != '') {
          $image = setUploadImage('image');
        } else {
          $image = 'default.jpg';
        }

        $data = [
          'name'              => $_POST["name"],
          'description'       => $_POST["description"],
          'price'             => $_POST["price"],
          'QuantityInStock'   => $_POST["quantity"],
          'category_id'       => $_POST["category"],
          'supplier_id'       => $_POST["supplier"],
          'image'             => $image
        ];
    
        $query = "INSERT INTO products (name, description, price, QuantityInStock, category_id, supplier_id, image, date_added) VALUES (:name, :description, :price, :QuantityInStock, :category_id, :supplier_id, :image, now())";
        echo (!empty(insert($query, $data))) ? 'add' : 'hehe';

      }

      if ($_POST["operation"] == "Edit") {

        $image = '';
        if($_FILES["image"]["name"] != '') {
          $image = setUploadImage('image');
        } else {
          $image = 'default.jpg';
        }

        $data = [
          'name'              => $_POST["name"],
          'description'       => $_POST["description"],
          'price'             => $_POST["price"],
          'QuantityInStock'   => $_POST["quantity"],
          'category_id'       => $_POST["category"],
          'supplier_id'       => $_POST["supplier"],
          'image'             => $image
        ];

      $query = "UPDATE products SET name = :name, description = :description, price = :price, QuantityInStock = :quantity, category_id = :category_id, supplier_id = :supplier_id, image = :image WHERE id = :id";
        echo (!empty(update($query, $data))) ? 'edit' : 'hehe';

      }

    }
  }