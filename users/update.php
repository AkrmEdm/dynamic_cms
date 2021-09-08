<?php
    include('../helpers.php');
    include('../database.php');
    include('_validate.php');

    $user_id = $_GET['user_id'];

    $sql = 'UPDATE users SET name = :name, email = :email,
            password = :password WHERE id = :user_id';

    $statement = $pdo->prepare($sql);

    $statement->execute([
    ':name' => $name,
    ':email' => $email,
    ':password' => $password,
    ':user_id' => $user_id
    ]);

    redirect('/users');