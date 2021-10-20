<?php
    include('../auth_middleware.php');
    include('../helpers.php');
    include('../database.php');
    include('_validate.php');

    $image_id = $_GET['image_id'];

    $sql = 'UPDATE images SET name = :name, url = :url
             WHERE id = :image_id';

    $statement = $pdo->prepare($sql);

    $statement->execute([
    ':name' => $name,
    ':url' => $url,
    ':image_id' => $image_id
    ]);

    redirect('/images');