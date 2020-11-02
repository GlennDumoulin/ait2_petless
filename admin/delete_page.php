<?php

    require_once '../app.php';

    // redirect if not logged in or not admin
    if (!$user_id) {
        header('location: ../login.php');
    }
    if (!$user->isAdmin) {
        header('location: ../index.php');
    }

    // get and delete page
    $page_id = $_GET['p_id'] ?? 0;
    $page_model = new Page();
    $page_model->deleteById($page_id);

    header('location: index.php#admin_control_pages');
    die();