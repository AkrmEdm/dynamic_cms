<?php
    include('../partials/header.php');
    include('../partials/sidebar.php');
    include('../database.php');

    $user_id = $_GET['user_id'];

    $sql = 'SELECT * FROM users WHERE id = :user_id';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':user_id' => $user_id
    ]);

    $user = $statement->fetch();

    $name = $_POST['name'];
    $email = $_POST['email'];

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    
    <h1 class="h2 mt-5">Edit User</h1>

    <form action="<?= $domain ?>/users/update.php?user_id=<?= $user_id ?>" method="POST">
        <?php include("_form.php"); ?>
    </form>

</main>

<?php include('../partials/footer.php'); ?>