<?php
    include('../helpers.php');
    include('../database.php');
    include('_validate.php');

    $post_id = $_GET['post_id'];

    $sql = 'UPDATE articles SET title = :title, content = :content,
             published_date = :published_date WHERE id = :post_id';

    $statement = $pdo->prepare($sql);

    $statement->execute([
    ':title' => $title,
    ':content' => $content,
    ':published_date' => $published_date,
    ':post_id' => $post_id
    ]);

    redirect('/posts');