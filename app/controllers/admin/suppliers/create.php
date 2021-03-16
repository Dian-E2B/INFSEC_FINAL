<?php

  include_once ('../../../config/connection.php');
  include_once ('../../../config/functions.php');

  if (isset($_POST['operation'])) {
    if (empty($_POST['name']) || empty($_POST['phone-number'])) {
      echo 'Something went wrong.';

    } else {
      if ($_POST['operation'] == "Add") {

        $data = [
          'name' => $_POST['name'],
          'address' => $_POST['address'],
          'phone_number' => $_POST['phone-number']
        ];

        $query = "INSERT INTO supplier (name, address, phone_number) VALUES (:name, :address, :phone_number)";
        echo (!empty(insert($query, $data))) ? 'add' : 'hehe';
      }

      if ($_POST["operation"] == "Edit") {

        $data = [
          'name' => $_POST['name'],
          'address' => $_POST['address'],
          'phone_number' => $_POST['phone-number'],
          'id' => $_POST['id']
        ];

        $query = 'UPDATE supplier SET name = :name, address = :address, phone_number = :phone_number WHERE id = :id';
        echo (!empty(update($query, $data))) ? 'edit' : 'hehe';

      }

    }
  }