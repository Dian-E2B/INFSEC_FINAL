<?php
    include_once ('../../../config/connection.php');
    include_once ('../../../config/functions.php');

    $request = $_REQUEST;
    $column = array(
        0 => 'name',
        1 => 'price',
        2 => 'quantity',
        3 => 'total'
    );

    $query = "SELECT cart.cart_id, products.id, products.name, products.price, cart.quantity, (products.price * cart.quantity) AS 'total' FROM cart INNER JOIN products ON cart.product_id = products.id WHERE cart_code = -1";
    
    //search query
    if (!empty($request['search']['value'])) {
        $query.= " AND cart.cart_id LIKE '" . $request['search']['value'] . "%' ";
        $query.= " OR products.name LIKE '" . $request['search']['value'] . "%' AND cart_code = -1";
    }

    //order query
    if(isset($_POST['order'])) {
        $query.= " ORDER BY " . $column[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'] . "  LIMIT " . $request['start'] . "  ," . $request['length'] . "  ";
    } else {
      $query .= 'ORDER BY cart.cart_id DESC ';
    }
    
    $data = array();
    $cart_total = 0;
    //fetch all rows
    $rows = selectAll($query);
    foreach ($rows as $row) {

        //declare and initialize sub_array variable
        $sub_array = array();
        $sub_array[] = $row["name"];
        $sub_array[] = $row["price"];
        $sub_array[] = $row["quantity"];
        $sub_array[] = number_format($row['total'], 2);
        $sub_array[] = '<button type="button" name="update" id="' . $row['id'] . '" class="btn btn-info btn-xs waves-effect update"><i class="material-icons" style="font-size:1.6rem;">remove</i></button> <button type="button" name="delete" id="' . $row['id'] . '" class="btn btn-info btn-xs waves-effect delete"><i class="material-icons" style="font-size:1.6rem;">add</i></button> <button type="button" name="delete" id="' . $row['id'] . '" class="btn btn-danger btn-xs waves-effect delete"><i class="material-icons" style="font-size:1.6rem;">delete</i></button>';

        $cart_total += floatval($row["total"]);
        $data[] = $sub_array;

    }

    $output = array();
    $total_rows = rowCount('SELECT * FROM cart WHERE cart_code = -1');

    $output = array(
        "draw"              => intval($_POST["draw"]), 
        "recordsTotal"      => $total_rows, 
        "recordsFiltered"   => $total_rows, 
        "cart_total"        => number_format($cart_total, 2),
        "data"              => $data,
      );

    echo json_encode($output);
