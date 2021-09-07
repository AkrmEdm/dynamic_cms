<?php
    include('../partials/header.php');
    include('../partials/sidebar.php');
    include('../database.php');

    $sql = "SELECT * FROM articles";
    $results = $pdo->query($sql);
    $rows = $results->fetchAll();
?>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          
          <h1 class="h2">Articles</h1>

          <div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?= $domain.'/posts/create.php' ?>" class="btn btn-sm btn-outline-secondary">Add New</button></a>
          </div>
        </div>


        <h2>All Articles</h2>


        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Published Date</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($rows as $row): ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlentities($row['title']) ?></td>
                <td><?= htmlentities($row['content']) ?></td>
                <td><?= $row['published_date'] ?></td>
                <td>
                  <a href="<?= $domain.'/posts/edit.php?post_id='.$row['id'] ?>" class="btn btn-primary">Edit</a>
                  <a href="<?= $domain.'/posts/delete.php?post_id='.$row['id'] ?>" class="btn btn-danger must_confirm">Delete</a>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </main>

<?php include('../partials/footer.php'); ?>