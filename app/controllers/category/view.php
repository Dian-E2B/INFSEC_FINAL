<?php

include_once ('../../config/connection.php');
include_once ('../../config/functions.php');

  $query = 'SELECT * FROM category ';

  //search query
  if (isset($_POST["search"]["value"])) {
      $query .= 'WHERE id LIKE "%' . $_POST["search"]["value"] . '%" ';
      $query .= 'OR name LIKE "%' . $_POST["search"]["value"] . '%" ';
  }

  //order query
  if (isset($_POST["order"])) {
      $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
  } else {
      $query .= 'ORDER BY id DESC ';
  }

  //limit query
  if ($_POST["length"] != - 1) {
      $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
  }

  $data = array();

  //fetch all rows
  $rows = selectAll($query);

  foreach ($rows as $row) {

    //declare and initialize sub_array variable
    $sub_array = array();
    $sub_array[] = $row["id"];
    $sub_array[] = $row["name"];
    $sub_array[] = '<button type="button" name="update" id="'.$row['id'].'" class="btn btn-warning btn-xs waves-effect update"><i class="material-icons" style="font-size:1.6rem;">mode_edit</i></button> <button type="button" name="delete" id="'.$row['id'].'" class="btn btn-danger btn-xs waves-effect delete"><i class="material-icons" style="font-size:1.6rem;">delete</i></button>';

    $data[] = $sub_array;

  }

  $output = array();
  $total_rows = rowCount('SELECT * FROM category');

  $output = array(
      "draw" => intval($_POST["draw"]) ,
      "recordsTotal" => $total_rows,
      "recordsFiltered" => $total_rows,
      "data" => $data
  );

  echo json_encode($output);
