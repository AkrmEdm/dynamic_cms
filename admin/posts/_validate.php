<?php


    $title = $_POST['title'];
    $content = $_POST['content'];
    $published_date = $_POST['published_date'] ?: date('Y-m-d');
    $image_id = $_POST['image'];

    // validate and sanitize title
    if (isPresent($title)) {
        $title = sanitizeItem($title, 'title');
    } else {
        goBack("Title is required");
    }

    // validate and sanitize content
    if (isPresent($content)) {
        $content = sanitizeText($content);
    } else {
        goBack("Content is required");
    }