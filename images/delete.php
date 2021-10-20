<?php
    include('../auth_middleware.php');
    include('../helpers.php');
    include('../database.php');

    $post_id = $_GET['post_id'];

    // delete from articleImages
    $sql = 'DELETE FROM articleImages WHERE images_id = :image_id';

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':image_id' => $image_id
    ]);

    $sql = 'DELETE FROM images WHERE id = :image_id';

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':image_id' => $image_id
    ]);

    redirect('/images');