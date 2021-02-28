<?php

include_once ('../../config/connection.php');
include_once('../../config/functions.php');

if(isset($_POST["id"])) {

    if(!empty(delete("DELETE FROM supplier WHERE id = :id", ['id' => $_POST['id']]))) {
        echo 'Data has been deleted successfully.';
    }
}