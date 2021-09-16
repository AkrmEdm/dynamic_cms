<?php
    session_start();
    include('helpers.php');

    if (! $_SESSION['auth_user']) {
        redirect('/login.php');
    }