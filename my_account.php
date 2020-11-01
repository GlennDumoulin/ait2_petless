<?php

    require 'app.php';

    $page_id = $_GET['p_id'] ?? 1;
    $current_page = Page::getById($page_id);
    
    $all_pages = Page::getAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn account - Petless</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
        include 'views/assets/header.php';
    ?>
    <h1>Account van <?= $user->firstname ?></h1>
    <?php
        include 'views/assets/footer.php';
    ?>
    <script>
        feather.replace();
    </script>
</body>
</html>