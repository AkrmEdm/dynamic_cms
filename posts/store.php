<?php
    include('../helpers.php');
    include('../database.php');

    $title = $_POST['title'];
    $content = $_POST['content'];
    $published_date = $_POST['published_date'] ?: date('Y-m-d');

    // validate and sanitize title
    if (isPresent($title)) {
        $title = sanitizeItem($title, 'title');
    } else {
        goBack("Title is required");
    }

    // validate and sanitize content
    if (isPresent($title)) {
        $content = sanitizeText($content);
    } else {
        goBack("Content is required");
    }

    $sql = 'INSERT INTO articles (title, content, published_date, users_id)
                VALUES (:title, :content, :published_date, :users_id)';
    
    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':title' => $title,
        ':content' => $content,
        ':published_date' => $published_date,
        ':users_id' => 1 // TODO add logged in user id
    ]);

    redirect('/posts');