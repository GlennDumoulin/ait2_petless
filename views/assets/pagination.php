<?php

$perPage = 5;
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$startAt = $perPage * ($page - 1);

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

if ($type == 'andere') {
    $total = $post_model->countOtherTypes($filters);
} else {
    $total = $post_model->countByType($type, $filters);
}

$totalPages = ceil($total / $perPage);
$prevPage = $page - 1;
$nextPage = $page + 1;

$links = "";
if ($page > 1) {
    $links .= "<a href='index.php?p_id=$page_id&type=$filters->type&race=$filters->race&location=$filters->location&sort_order=$sort_order&status=$filterStatus&page=$prevPage'><i data-feather=\"arrow-left\"></i></a>";
}
for ($i = 1; $i <= $totalPages; $i++) {
    if ($i == $page) {
        $links .= "<a href='index.php?p_id=$page_id&type=$filterType&race=$filterRace&location=$filterLocation&sort_order=$sort_order&status=$filterStatus&page=$i' class=\"active\">$i</a>";
    } else {
        $links .= "<a href='index.php?p_id=$page_id&type=$filterType&race=$filterRace&location=$filterLocation&sort_order=$sort_order&status=$filterStatus&page=$i'>$i</a>";
    }
}
if ($page < $totalPages) {
    $links .= "<a href='index.php?p_id=$page_id&type=$filterType&race=$filterRace&location=$filterLocation&sort_order=$sort_order&status=$filterStatus&page=$nextPage'><i data-feather=\"arrow-right\"></i></a>";
}

if ($type == 'andere') {
    $posts = $post_model->getOtherTypes($startAt, $perPage, $filters);
} else {
    $posts = $post_model->getByType($type, $startAt, $perPage, $filters);
}