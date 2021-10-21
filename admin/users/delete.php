<?php
    include('../auth_middleware.php');
    include('../helpers.php');
    include('../database.php');

    $user_id = $_GET['user_id'];

    
    $sql = 'DELETE FROM users WHERE id = :user_id';

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':user_id' => $user_id
    ]);

    redirect('/admin/users');