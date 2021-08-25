<?php
    include('../helpers.php');
    include('../database.php');
    include('_validate.php');

    $sql = 'INSERT INTO users (name, email, password)
                VALUES (:name, :email, :password)';
    
    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password
    ]);

    redirect('/users');