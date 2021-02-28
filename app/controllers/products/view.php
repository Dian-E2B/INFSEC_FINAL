<?php

  include_once ('../../config/connection.php');
  include_once ('../../config/functions.php');

  $query = 'SELECT products.id, products.image, products.name, products.price, products.QuantityInStock, supplier.name as "supplier_name", category.name as "category_name" FROM products INNER JOIN category ON products.category_id = category.id INNER JOIN supplier ON products.supplier_id = supplier.id ';

  //search query
  if (isset($_POST["search"]["value"])) {
      $query .= 'WHERE products.id LIKE "%' . $_POST["search"]["value"] . '%" ';
      $query .= 'OR products.name LIKE "%' . $_POST["search"]["value"] . '%" ';
      $query .= 'OR products.price LIKE "%' . $_POST["search"]["value"] . '%" ';
  }

  //order query
  if (isset($_POST["order"])) {
      $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
  } else {
      $query .= 'ORDER BY products.id DESC ';
  }

  //limit query
  if ($_POST["length"] != - 1) {
      $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
  }

  $data = array();

  //fetch all rows
  $rows = selectAll($query);

  foreach ($rows as $row) {

    //set image
    $image = '';
    if ($row["image"] != '') {
        $image = '<img src="../../public/admin/images/products/' . $row["image"] . '" class="img-thumbnail" width="50" height="35" />';
    }

        //declare and initialize sub_array variable
        $sub_array = array();
        $sub_array[] = $image;
        $sub_array[] = $row["id"];
        $sub_array[] = $row["name"];
        $sub_array[] = $row["price"];
        $sub_array[] = $row["QuantityInStock"];
        $sub_array[] = $row["supplier_name"];
        $sub_array[] = $row["category_name"];

        $sub_array[] = '<button type="button" name="info" id="' . $row['id'] . '" class="btn btn-info btn-xs waves-effect info"><i class="material-icons" style="font-size:1.6rem;">info_outline</i></button> <button type="button" name="update" id="' . $row['id'] . '" class="btn btn-warning btn-xs waves-effect update"><i class="material-icons" style="font-size:1.6rem;">mode_edit</i></button> <button type="button" name="delete" id="' . $row['id'] . '" class="btn btn-danger btn-xs waves-effect delete"><i class="material-icons" style="font-size:1.6rem;">delete</i></button>';
        $data[] = $sub_array;

  }

  $output = array();
  $total_rows = rowCount('SELECT * FROM products');

  $output = array(
      "draw"              => intval($_POST["draw"]) ,
      "recordsTotal"      => $total_rows,
      "recordsFiltered"   => $total_rows,
      "data"              => $data
  );

  echo json_encode($output);