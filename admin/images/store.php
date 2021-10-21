<?php
    include('../auth_middleware.php');
    include('../helpers.php');
    include('../database.php');
    include('_validate.php');

    $url = $target_file;

    $sql = 'INSERT INTO images (name, url)
                VALUES (:name, :url)';
    
    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':name' => $name,
        ':url' => $url
    ]);

    redirect('/admin/images');