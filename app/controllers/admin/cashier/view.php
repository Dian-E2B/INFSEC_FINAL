<?php
    include_once ('../../../config/connection.php');
    include_once ('../../../config/functions.php');

    $request = $_REQUEST;
    $column = array(
        0 => 'id',
        1 => 'name',
        2 => 'price',
        3 => 'QuantityInStock'
    );

    $query = "SELECT * FROM products WHERE QuantityInStock != 0";
    
    //search query
    if (!empty($request['search']['value'])) {
        $query.= " AND id LIKE '" . $request['search']['value'] . "%' ";
        $query.= " OR name LIKE '" . $request['search']['value'] . "%' AND QuantityInStock != 0";
    }

    //order query
    if(isset($_POST['order'])) {
        $query.= " ORDER BY " . $column[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'] . "  LIMIT " . $request['start'] . "  ," . $request['length'] . "  ";
    } else {
      $query .= 'ORDER BY id DESC';
    }
    
    $data = array();
    //fetch all rows
    $rows = selectAll($query);
    foreach ($rows as $row) {

        //declare and initialize sub_array variable
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["name"];
        $sub_array[] = $row["price"];
        $sub_array[] = $row["QuantityInStock"];

        $sub_array[] = '<button type="button" name="add-to-cart" id="' . $row['id'] . '" class="btn bg-purple btn-xs waves-effect add-to-cart"><i class="material-icons" style="font-size:1.6rem;">add</i></button>';
        $data[] = $sub_array;

    }

    $output = array();
    $total_rows = rowCount('SELECT * FROM products WHERE QuantityInStock != 0');

    $output = array(
        "draw"              => intval($_POST["draw"]), 
        "recordsTotal"      => $total_rows, 
        "recordsFiltered"   => $total_rows, 
        "data"              => $data,
      );

    echo json_encode($output);
