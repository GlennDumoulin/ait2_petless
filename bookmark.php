<?php

    require 'app.php';

    // redirect if not logged in
    if (!$user_id) {
        header('location: login.php');
    }

    $post_id = $_GET['post_id'] ?? 0;