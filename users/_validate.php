<?php


    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    // validate and sanitize name
    if (isPresent($name)) {
        $name = sanitizeItem($name, 'name');
    } else {
        goBack("Name is required");
    }

    // validate and sanitize email
    if (isPresent($email)) {
        $email = sanitizeItem($email, 'email');
    } else {
        goBack("Email is required");
    }

    // validate and sanitize password
    if (isPresent($password)) {
        $password = sanitizeItem($password, 'password');
    } else {
        goBack("Password is required");
    }