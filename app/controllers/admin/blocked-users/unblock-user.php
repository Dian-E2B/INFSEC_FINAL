<?php

include_once ('../../../config/connection.php');
include_once ('../../../config/functions.php');

if(isset($_POST["id"])) {
    if(!empty(update("UPDATE users SET attempts = 0 WHERE id=:id", ['id' => $_POST['id']]))) {
        echo 'User has been successfully unblocked.';
    }
}