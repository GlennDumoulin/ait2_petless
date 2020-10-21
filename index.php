<?php

    require 'app.php';

    $page_id = $_GET['p_id'] ?? 1;
    $current_page = Page::getById($page_id);

    $all_pages = Page::getAll();

    $view = 'views/templates/' . $current_page->template . '.php';
    if(  ! file_exists($view) ) {
        $view = 'views/templates/page.php';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $current_page->name ?> - Petless</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php

        include 'views/assets/header.php';
        include $view;
        include 'views/assets/footer.php';

    ?>
    <script>
        feather.replace();
    </script>
</body>
</html>