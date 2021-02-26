<?php

    try {
        $username = 'root';
        $password = '';
        $connect = new PDO( 'mysql:host=localhost;dbname=sim', $username, $password );
        
    } catch (PDOException $e) {
        echo "Connection Failed: " . $e->getMessage();
    }