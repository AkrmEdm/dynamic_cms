<?php

    $database_name = 'cmsdb';
    $username = 'root';
    $password = '';
    $host = 'localhost';

    $dsn = "mysql:host=$host;dbname=$database_name;charset=UTF8";

    $pdo = new PDO($dsn, $username, $password);