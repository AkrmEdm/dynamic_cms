<?php
    include('../auth_middleware.php');
    include('../partials/header.php');
    include('../partials/sidebar.php');
    include('../database.php');
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    
    <h1 class="h2 mt-5">Add New Image</h1>

    <?php displayMessage() ?>

    <form action="<?= $domain ?>/images/store.php" method="POST" enctype="multipart/form-data">
        <?php include("_form.php"); ?>
    </form>

</main>

<?php include('../partials/footer.php'); ?>
