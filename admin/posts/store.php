<?php
    include('../auth_middleware.php');
    include('../helpers.php');
    include('../database.php');
    include('_validate.php');

    $sql = 'INSERT INTO articles (title, content, published_date, users_id)
                VALUES (:title, :content, :published_date, :users_id)';
    
    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':title' => $title,
        ':content' => $content,
        ':published_date' => $published_date,
        ':users_id' => $_SESSION['auth_user']
    ]);
    
    $article_id = $pdo->lastInsertId();

    // Adding images to article

    $sql = 'INSERT INTO articleimages (images_id, articles_id)
                VALUES (:image_id, :article_id)';
    
    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':image_id' => $title,
        ':article_id' => $article_id,
    ]);

    redirect('/admin/posts');