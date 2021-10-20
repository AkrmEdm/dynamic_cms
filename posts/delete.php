<?php
    include('../auth_middleware.php');
    include('../helpers.php');
    include('../database.php');

    $post_id = $_GET['post_id'];

    // delete post id from articleImages table
    $sql = 'DELETE FROM articleImages WHERE articles_id = :image_id';

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':image_id' => $image_id
    ]);

    
    $sql = 'DELETE FROM articles WHERE id = :post_id';

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':post_id' => $post_id
    ]);

    redirect('/posts');