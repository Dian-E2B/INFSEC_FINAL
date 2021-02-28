<?php

    function setUploadImage($image_name) {
        if(isset($_FILES[$image_name])) {
            $extension = explode('.', $_FILES[$image_name]['name']);
            $new_name = rand() . '.' . $extension[1];
            $destination = '../../../public/admin/images/products/' . $new_name;
            move_uploaded_file($_FILES[$image_name]['tmp_name'], $destination);
            return $new_name;
        }
    }

	function setID($column_id, $table_name) {
        include('connection.php');
		$query = "SELECT MAX($column_id) FROM $table_name";
		$count_row = $connect->query($query)->fetchColumn() + 1;
		
		if ($count_row == 1) {
			$count_row = 100001;
		}
		return $count_row;

	}

    function selectAll($query) {
        include('connection.php');
        $statement = $connect->prepare($query);
        $statement->execute();
		return $statement->fetchAll();
	}

    function rowCount($query) {
        include('connection.php');
        $statement = $connect->prepare($query);
		$statement->execute();
		return $statement->rowCount();
	}

    function findRow($query, $id) {
        include('connection.php');
        $statement = $connect->prepare($query);
		$statement->execute([':id' => $id]);
		return $statement->fetch();
	}

    function insert($query, $data) {
        include('connection.php');
        $statement = $connect->prepare($query);
		return $statement->execute($data);
	}

    function update($query, $data) {
        include('connection.php');
        $statement = $connect->prepare($query);
		return $statement->execute($data);
	}
    
    function delete($query, $data) {
        include('connection.php');
        $statement = $connect->prepare($query);
		return $statement->execute($data);
	}


 

 