<?php

include_once ('../../../config/connection.php');
include_once ('../../../config/functions.php');

  if(isset($_POST['id'])) {
    
    $row = findRow("SELECT * FROM products WHERE id = :id", $_POST['id']);
    $output["name"] = $row["id"];

    echo json_encode($output);
  }