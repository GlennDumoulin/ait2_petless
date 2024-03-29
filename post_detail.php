<?php

    require 'app.php';

    // get pages and post data
    $page_id = $_GET['p_id'] ?? 1;
    $current_page = Page::getById($page_id);
    
    $all_pages = Page::getAll();
    
    $post_id = $_GET['post_id'] ?? 1;
    $post_model = new Post();
    $post = $post_model->getById($post_id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $current_page->name ?> detail - Petless</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php

        include 'views/assets/header.php';
        include 'views/assets/post_detail.php';
        include 'views/assets/footer.php';

    ?>
    <script>
        feather.replace();
    </script>
</body>
</html>