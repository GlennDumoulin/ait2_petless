<?php

    require 'app.php';

    $page_id = $_GET['p_id'] ?? 1;
    $current_page = Page::getById($page_id);
    
    $all_pages = Page::getAll();

    $post_model = new Post();
    $my_posts = $post_model->getByAuthor($user_id);
    $my_bookmarks = $post_model->getMyBookmarks($user_id);

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
    <div class="container">
        <div class="my_account_wrapper">
            <h1>Account van <?= $user->firstname ?></h1>
            <h2>Mijn berichten</h2>
            <div class="my_posts_list row flex-nowrap overflow-auto">
                <?php
    
                    if ($my_posts) {
                        foreach ($my_posts as $post) {
                            include 'views/assets/post.php';
                        }
                    } else {
                        echo '<p>U heeft nog geen berichten geplaatst.</p>';
                    }
    
                ?>
            </div>
            <h2>Mijn bewaarde berichten</h2>
            <div class="my_bookmarks row flex-nowrap overflow-auto">
                <?php
    
                    if ($my_bookmarks) {
                        foreach ($my_bookmarks as $post) {
                            include 'views/assets/post.php';
                        }
                    } else {
                        echo '<p>U heeft nog geen berichten bewaard.</p>';
                    }
    
                ?>
            </div>
        </div>
    </div>
    <?php
        include 'views/assets/footer.php';
    ?>
    <script>
        feather.replace();
    </script>
</body>
</html>