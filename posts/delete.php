<?php
    include('../helpers.php');
    include('../database.php');

    $post_id = $_GET['post_id'];

    
    $sql = 'DELETE FROM articles WHERE id = :post_id';

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':post_id' => $post_id
    ]);

    redirect('/posts');