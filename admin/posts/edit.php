<?php
    include('../auth_middleware.php');
    include('../partials/header.php');
    include('../partials/sidebar.php');
    include('../database.php');

    $post_id = $_GET['post_id'];

    $sql = 'SELECT * FROM articles WHERE id = :post_id';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':post_id' => $post_id
    ]);

    $post = $statement->fetch();

    $title = $post['title'];
    $content = $post['content'];
    $published_date = $post['published_date'];

    $sql = 'SELECT * FROM articleimages WHERE articles_id = :post_id';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':post_id' => $post_id
    ]);

    $image = $statement->fetch();

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    
    <h1 class="h2 mt-5">Edit Article</h1>

    <?php displayMessage() ?>

    <form action="<?= $domain ?>/admin/posts/update.php?post_id=<?= $post_id ?>" method="POST">
        <?php include("_form.php"); ?>
    </form>

</main>

<?php include('../partials/footer.php'); ?>