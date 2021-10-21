<?php
    session_start();
    include('helpers.php');

    unset($_SESSION['auth_user']);
    redirect('/admin/login.php');