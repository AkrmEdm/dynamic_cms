<?php
    session_start();
    include('database.php');
    include('helpers.php');


    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']);


    // validate and sanitize email
    if (isPresent($email)) {
        $email = sanitizeItem($email, 'email');
    } else {
        goBack("Email is required");
    }
    
    $sql = 'SELECT * FROM users WHERE email = :email';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':email' => $email
    ]);

    $user = $statement->fetch();

    if (! $user) {
        goBack('Username or Password is incorrect!');
    }

    if (password_verify($password, $user['password'])) {

        //remember the user email  
        if($remember_me) {
            setcookie('user_email', $email, time()+(60*60*24));
        }

        // authenticate user
        $_SESSION['auth_user'] = $user['id'];
        redirect('/admin/posts');

    } else {
        goBack('Username or Password is incorrect!');
    }