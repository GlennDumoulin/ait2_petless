<?php

    require '../app.php';

    // redirect if not logged in or not admin
    if (!$user_id) {
        header('location: ../login.php');
        die();
    }
    if (!$user->isAdmin) {
        header('location: ../index.php');
        die();
    }

    // get and delete user
    $user_id = $_GET['u_id'] ?? 0;
    $user_model->deleteById($user_id);

    // get and delete posts of this user
    $post_model = new Post();
    $post_model->deleteByUser($user_id);

    // get and delete bookmarks of this user
    $bookmark_model = new Bookmark();
    $bookmark_model->deleteByUser($user_id);

    // get and delete chatgroups of this user
    $chatgroup_model = new Chatgroup();
    $chatgroup_model->deleteByUser($user_id);
    
    // get and delete chatmessages of this user
    $chatmessage_model = new Chatmessage();
    $chatmessage_model->deleteByUser($user_id);


    header('location: index.php#admin_control_users');
    die();