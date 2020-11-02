<?php

    require_once '../app.php';

    // redirect if not logged in or not admin
    if (!$user_id) {
        header('location: ../login.php');
    }
    if (!$user->isAdmin) {
        header('location: ../index.php');
    }

    // get and delete post
    $post_id = $_GET['post_id'] ?? 0;
    $post_model = new Post();
    $post_model->deleteById($post_id);

    header('location: index.php#admin_control_posts');
    die();