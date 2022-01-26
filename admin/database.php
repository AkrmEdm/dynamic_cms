<?php

    $database_name = 'cmsdb';
    $username = 'root';
    $password = '';
    $host = 'localhost';

    try {
        $dsn = "mysql:host=$host;dbname=$database_name;charset=UTF8";

        $pdo = new PDO($dsn, $username, $password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e) {
        echo $e->getMessage();
    }