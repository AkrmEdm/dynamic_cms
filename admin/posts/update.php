<?php
    include('../auth_middleware.php');
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

    
    // delete any images from article in articleImages table
    $sql = 'DELETE FROM articleImages WHERE articles_id = :post_id';

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':post_id' => $post_id
    ]);

    // add new record
    $sql = 'INSERT INTO articleimages (images_id, articles_id)
    VALUES (:image_id, :article_id)';

    $statement = $pdo->prepare($sql);

    $statement->execute([
    ':image_id' => $image_id,
    ':article_id' => $post_id,
    ]);

    redirect('/admin/posts');