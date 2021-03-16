<?php

  include_once ('../../../config/connection.php');
  include_once ('../../../config/functions.php');

  if(isset($_POST['id'])) {
    
    $row = findRow("SELECT * FROM supplier WHERE id = :id", $_POST['id']);
    $output["name"] = $row["name"];
    $output["address"] = $row["address"];
    $output["phone_number"] = $row["phone_number"];

    echo json_encode($output);
  }