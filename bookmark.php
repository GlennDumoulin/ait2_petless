<?php

    require 'app.php';

    // redirect if not logged in
    if (!$user_id) {
        header('location: login.php');
        die();
    }

    // get current page and post data
    $page_id = $_GET['p_id'] ?? 1;
    $post_id = $_GET['post_id'] ?? 0;

    // get bookmark data and check if it already exists
    $bookmark = (object) array(
        "user_id" => $user_id,
        "post_id" => $post_id
    );
    $bookmark_model = new Bookmark();
    $total = $bookmark_model->bookmarkExists($bookmark);

    // create new bookmark or delete it if it already exists
    if ($total) {

        $bookmark_model->removeBookmark($bookmark);

        header('location: post_detail.php?p_id=' . $page_id . '&post_id=' . $post_id);
        die();

    } else {

        $new_bookmark = new Bookmark();

        $new_bookmark->user_id = $user_id;
        $new_bookmark->post_id = $post_id;

        $new_bookmark->addBookmark();

        header('location: post_detail.php?p_id=' . $page_id . '&post_id=' . $post_id);
        die();

    }