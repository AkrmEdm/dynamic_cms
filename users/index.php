<?php
    include('../partials/header.php');
    include('../partials/sidebar.php');
    include('../database.php');

    $sql = "SELECT * FROM users";
    $results = $pdo->query($sql);
    $rows = $results->fetchAll();
?>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          
          <h1 class="h2">Users</h1>

          <div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?= $domain.'/users/create.php' ?>" class="btn btn-sm btn-outline-secondary">Add New</button></a>
          </div>
        </div>


        <h2>All Users</h2>


        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($rows as $row): ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlentities($row['name']) ?></td>
                <td><?= htmlentities($row['email']) ?></td>
                <td>
                  <a href="<?= $domain.'/users/edit.php?user_id='.$row['id'] ?>" class="btn btn-primary">Edit</a>
                  <a href="<?= $domain.'/users/delete.php?user_id='.$row['id'] ?>" class="btn btn-danger must_confirm">Delete</a>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </main>

<?php include('../partials/footer.php'); ?>