<?php

    $name = $_POST['name'];
    $file = $_FILES['file'];

    // validate and sanitize name
    if (isPresent($name)) {
        $name = sanitizeItem($name, 'string');
    } else {
        goBack("Name is required");
    }

    $file_size = $file['size'];
    $file_type = $file['type'];

    $accepted_file_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];

    if($file_size > (5 * 1024 * 1024)) {
        goBack('File is too big. File must be lessthan 5MB.');
    }

    if( ! in_array($file_type, $accepted_file_types)) {
        goBack('File must be a valid image');
    }

    $target_file = '/php-cms/admin/uploads/'.$file['name'];
    $temp_file = $file['tmp_name'];

    if( ! move_uploaded_file($temp_file, $_SERVER['DOCUMENT_ROOT'].$target_file)) {
        goBack('Unable to upload the file');
    }