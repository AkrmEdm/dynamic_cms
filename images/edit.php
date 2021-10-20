<?php
    include('../auth_middleware.php');
    include('../partials/header.php');
    include('../partials/sidebar.php');
    include('../database.php');

    $image_id = $_GET['image_id'];

    $sql = 'SELECT * FROM images WHERE id = :image_id';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':image_id' => $image_id
    ]);

    $image = $statement->fetch();

    $name = $image['name'];
    $url = $image['url'];

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    
    <h1 class="h2 mt-5">Edit Image</h1>

    <?php displayMessage() ?>

    <form action="<?= $domain ?>/images/update.php?image_id=<?= $image_id ?>" method="POST" enctype="multipart/form-data">
        <?php include("_form.php"); ?>
    </form>

</main>

<?php include('../partials/footer.php'); ?>