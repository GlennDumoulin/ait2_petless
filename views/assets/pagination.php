<?php

$perPage = 5;
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$startAt = $perPage * ($page - 1);

if ($type == 'andere') {
    $sql = 'SELECT COUNT(*)
    FROM `posts`
    WHERE `type` != :hond AND `type` != :kat';
    $pdo_statement = $db->prepare($sql);
    $pdo_statement->execute(
        [
            ':hond' => 'hond',
            ':kat' => 'kat'
        ]
    );
    $total = (int) $pdo_statement->fetchColumn();
} else {
    $sql = 'SELECT COUNT(*)
    FROM `posts`
    WHERE `type` = :type';
    $pdo_statement = $db->prepare($sql);
    $pdo_statement->execute(
        [
            ':type' => $type
        ]
    );
    $total = (int) $pdo_statement->fetchColumn();
}

$totalPages = ceil($total / $perPage);
$prevPage = $page - 1;
$nextPage = $page + 1;

$links = "";
if ($totalPages <= 1) {
    $links .= NULL;
} else {
    if ($page > 1) {
        $links .= "<a href='index.php?p_id=$page_id&type=$type&page=$prevPage'><i data-feather=\"arrow-left\"></i></a>";
    }
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $page) {
            $links .= "<a href='index.php?p_id=$page_id&type=$type&page=$i' class=\"active\">$i</a>";
        } else {
            $links .= "<a href='index.php?p_id=$page_id&type=$type&page=$i'>$i</a>";
        }
    }
    if ($page < $totalPages) {
        $links .= "<a href='index.php?p_id=$page_id&type=$type&page=$nextPage'><i data-feather=\"arrow-right\"></i></a>";
    }

    if ($type == 'andere') {
        $posts = $post_model->getOtherTypes($startAt, $perPage);
    } else {
        $posts = $post_model->getByType($type, $startAt, $perPage);
    }
}