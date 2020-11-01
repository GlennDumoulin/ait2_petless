<?php

    require 'app.php';

    // redirect if not logged in
    if (!$user_id) {
        header('location: login.php');
    }

    $page_id = $_GET['p_id'] ?? 1;
    $post_id = $_GET['post_id'] ?? 0;

    $bookmark = (object) array(
        "user_id" => $user_id,
        "post_id" => $post_id
    );

    $bookmark_model = new Bookmark();
    $total = $bookmark_model->bookmarkExists($bookmark);

    if ($total) {

        echo 'this bookmark already exists';

        $bookmark_model->removeBookmark($bookmark);

        header('location: post_detail.php?p_id=' . $page_id . '&post_id=' . $post_id);
        die();

    } else {

        echo 'no bookmarks found';

        $new_bookmark = new Bookmark();

        $new_bookmark->user_id = $user_id;
        $new_bookmark->post_id = $post_id;

        $new_bookmark->addBookmark();

        header('location: post_detail.php?p_id=' . $page_id . '&post_id=' . $post_id);
        die();

    }