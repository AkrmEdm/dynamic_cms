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
        // check if password is strong
        $has_uppercase_letter = preg_match('@[A-Z]@', $password);
        $has_lowercase_letter = preg_match('@[a-z]@', $password);
        $has_number = preg_match('@[0-9]@', $password);
        $has_special_character = preg_match('@[^\w]@', $password);
        $password_is_long = strlen($password) >= 8;
    
        if($has_uppercase_letter && $has_lowercase_letter && $has_number && $has_special_character && $password_is_long) {
            // user password is strong
        } else {
            goBack("Password must contain uppercase lettter, lowercase letter, a number, a special character and it must be atleast 8 characters long.");
        }

        //$password = sanitizeItem($password, 'password');
    } else {
        goBack("Password is required");
    }