<?php

  include_once ('../../config/connection.php');
  include_once ('../../config/functions.php');

  if (isset($_POST['operation'])) {

    if (empty($_POST['name'])) {
      echo 'This field is required.';
    } elseif (strlen($_POST['name']) < 3) {
      echo 'Please enter at least 3 characters.';
    } elseif (strlen($_POST['name']) > 50) {
      echo 'Please enter less than 50 characters.';
    } else {

      if ($_POST['operation'] == "Add") {

        $data = [ 'name' => $_POST['name'] ];
  
        $query = "INSERT INTO category (name) VALUES (:name)";
        // insert($query, $data);
        echo (!empty(insert($query, $data))) ? 'add' : 'hehe';
        // echo (!empty(insert($query, $data))) ? 'Data has been saved successfully.' : '';

    }

    if ($_POST["operation"] == "Edit") {

      $data = [ 'name' => $_POST["name"], 'id' => $_POST['id'] ];
      
      $query = 'UPDATE category SET name = :name WHERE id = :id';
      // update($query, $data);
      echo (!empty(update($query, $data))) ? 'edit' : 'hehe';

    }
    
    }

  }