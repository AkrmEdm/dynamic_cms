<?php
    include('../helpers.php');

?>

<div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">

            <li class="nav-item">
              <a class="nav-link <?= getActive('/posts'); ?>" href="<?= getUrl('/admin/posts'); ?>">
                <span data-feather="book"></span>
                Articles
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?= getActive('/users'); ?>" href="<?= getUrl('/admin/users'); ?>">
                <span data-feather="users"></span>
                Users
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?= getActive('/images'); ?>" href="<?= getUrl('/admin/images'); ?>">
                <span data-feather="image"></span>
               Images
              </a>
            </li>

          </ul>
        </div>
      </nav>