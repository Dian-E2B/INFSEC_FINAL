<?php

  include_once ('../../../config/connection.php');
  include_once ('../../../config/functions.php');

  if(isset($_POST['id'])) {
    
    $row = findRow("SELECT * FROM products WHERE id = :id", $_POST['id']);
    $output["name"] = $row["name"];
    $output["description"] = $row["description"];
    $output["price"] = $row["price"];
    $output["quantity"] = $row["QuantityInStock"];
    $output["category"] = $row["category_id"];
    $output["supplier"] = $row["supplier_id"];

    // $query = "SELECT * FROM category WHERE id = :id";
    // $category =findRow($query, $row["category_id"]);
    // $output["category"] = $category['name'];

    // if($row["image"] != '') {
    //   $output['image'] = $row["image"];

    // } else {
    //   $output['image'] = '<input type="hidden" name="image" value="" />';
    // }

    echo json_encode($output);
  }
?>