<?php

    include('admin/database.php');
    include('admin/helpers.php');
    $domain = getUrl();

    $sql = "SELECT *, images.name as image_name, articles.id as articles_id FROM articles, images, articleimages, users ";
    $sql .= "WHERE articles.id = articleimages.articles_id ";
    $sql .= "AND images.id = articleimages.images_id ";
    $sql .= "AND users.id = articles.users_id ";
    $results = $pdo->query($sql);
    $rows = $results->fetchAll();

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= $domain ?>/admin/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>CMS</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      
        <?php foreach($rows as $row): ?>
        <div class="col">
          <div class="card shadow-sm">
            
            <?php if(isset($row['url'])): ?>
            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="<?= $row['url'] ?>" alt="<?= $row['image_name'] ?>">

            <?php else: ?>
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <?php endif ?>

            <div class="card-body">
              <h2 class="card-text h4"><?= $row['title'] ?></h2>
              <p class="card-text"><?= substr(strip_tags($row['content']), 0, 50) ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="<?= getUrl('/post.php?post_id='.$row['articles_id']); ?>" class="btn btn-sm btn-outline-secondary">View</a>

                </div>
                <small class="text-muted"><?= $row['name'] ?></small>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach ?>

      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">CMS &copy;</p>
  </div>
</footer>


    <script src="<?= $domain ?>/admin/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>