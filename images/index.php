<?php
    include('../auth_middleware.php');
    include('../partials/header.php');
    include('../partials/sidebar.php');
    include('../database.php');

    $sql = "SELECT * FROM images";
    $results = $pdo->query($sql);
    $rows = $results->fetchAll();
?>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          
          <h1 class="h2">Images</h1>

          <div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?= $domain.'/images/create.php' ?>" class="btn btn-sm btn-outline-secondary">Add New</button></a>
          </div>
        </div>


        <h2>All Articles</h2>


        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($rows as $row): ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlentities($row['name']) ?></td>
                <td><img src="<?= $row['url'] ?>" alt="<?= $row['name'] ?>" width="200px"></td>
                <td>
                  <a href="<?= $domain.'/images/edit.php?image_id='.$row['id'] ?>" class="btn btn-primary">Edit</a>
                  <a href="<?= $domain.'/images/delete.php?image_id='.$row['id'] ?>" class="btn btn-danger must_confirm">Delete</a>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </main>

<?php include('../partials/footer.php'); ?>