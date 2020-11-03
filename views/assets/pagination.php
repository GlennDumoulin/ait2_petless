<?php

    // define amount of posts per page and offset for that page
    $perPage = 5;
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $startAt = $perPage * ($page - 1);

    // get the filters data
    $filterType = $_GET["type"] ?? '';
    $filterRace = $_GET["race"] ?? '';
    $filterLocation = $_GET["location"] ?? '';
    $sort_order = $_GET["sort_order"] ?? 'DESC';
    $filterStatus = $_GET["status"] ?? '';

    $filters = (object) array(
        "type" => $filterType,
        "race" => $filterRace,
        "location" => '%' . $filterLocation  . '%',
        "sort_order" => $sort_order,
        "status" => $filterStatus
    );

    // count all posts of certain types
    if ($type == 'andere') {
        $total = $post_model->countOtherTypes($filters);
    } else {
        $total = $post_model->countByType($filters);
    }

    // count how many pages the pagination will have
    $totalPages = ceil($total / $perPage);
    $prevPage = $page - 1;
    $nextPage = $page + 1;

    // create the pagination links
    $links = '';
    $urlStart = '<a href="index.php?p_id=' . $page_id;
    $urlFilters = '&type=' . $filterType . '&race=' . $filterRace . '&location=' . $filterLocation . '&sort_order=' . $sort_order . '&status=' . $filterStatus;
    $standardUrl = $urlStart . $urlFilters . '&page=';

    if ($page > 1) {
        $links .= $standardUrl . $prevPage . '"><i data-feather="arrow-left"></i></a>';
    }
    for ($i = 1; $i <= $totalPages; $i++) {
        $links .= $standardUrl . $i . '" class="' . (($i == $page) ? "active" : "") . '">' . $i . '</a>';
    }
    if ($page < $totalPages) {
        $links .= $standardUrl . $nextPage . '"><i data-feather="arrow-right"></i></a>';
    }

    // get the posts for the current page of certain types
    if ($type == 'andere') {
        $posts = $post_model->getOtherTypes($startAt, $perPage, $filters);
    } else {
        $posts = $post_model->getByType($startAt, $perPage, $filters);
    }