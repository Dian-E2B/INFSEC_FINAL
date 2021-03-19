<?php
    include_once ('../../../config/connection.php');
    include_once ('../../../config/functions.php');

    $request = $_REQUEST;
    $column = array(
      0 => 'id',
      1 => 'firstname',
      2 => 'lastname',
      3 => 'email'
    );

    $query = "SELECT * FROM users WHERE type = 0 AND attempts >= 3";
    
    //search query
    if (!empty($request['search']['value'])) {
        $query.= " AND id LIKE '" . $request['search']['value'] . "%' ";
        $query.= " OR firstname LIKE '" . $request['search']['value'] . "%' AND type = 0 AND attempts >= 3";
    }
    //order query
    if(isset($_POST['order'])) {
        $query.= " ORDER BY " . $column[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'] . "  LIMIT " . $request['start'] . "  ," . $request['length'] . "  ";
    } else {
      $query .= 'ORDER BY id DESC ';
    }
    
    $data = array();

    //fetch all rows
    foreach (selectAll($query) as $row) {

        //declare and initialize sub_array variable
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["firstname"] . ' ' . $row["lastname"];
        $sub_array[] = $row["email"];
        $sub_array[] = '
          <button type="button" name="unblock" id="' . $row['id'] . '" class="btn bg-purple btn-xs waves-effect unblock">
            Unblock
          </button>
        ';
        $data[] = $sub_array;

    }

    $output = array();
    $total_rows = rowCount('SELECT * FROM users WHERE type = 0');

    $output = array(
        "draw"              => intval($_POST["draw"]), 
        "recordsTotal"      => $total_rows, 
        "recordsFiltered"   => $total_rows, 
        "data"              => $data);

    echo json_encode($output);
