<?php

  include_once ('../../config/connection.php');
  include_once ('../../config/functions.php');

  if(isset($_POST["operation"])) {
    if($_POST["operation"] == "Add") {

      $data = [
        'name' => $_POST["name"],
      ];

      $query = "INSERT INTO category (name) VALUES (:name)";
      echo (!empty(insert($query, $data))) ? "Category added successfully." : 'Category not added.';

    }

    if($_POST["operation"] == "Edit") {

      $data = [
        'name' => $_POST["name"],
        'id' => $_POST['id']
      ];
      
      $query = 'UPDATE category SET name = :name WHERE id = :id';
      echo (!empty(update($query, $data))) ? 'Category name have been updated.' : 'Update Failed.';

  
    }
  }

