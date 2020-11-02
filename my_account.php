<?php

    require 'app.php';

    // redirect if not logged in
    if (!$user_id) {
        header('location: login.php');
    }

    // get pages and posts data
    $page_id = $_GET['p_id'] ?? 1;
    $current_page = Page::getById($page_id);
    
    $all_pages = Page::getAll();

    $post_model = new Post();

    // admin can see the account of other users
    $admin = $user->isAdmin;
    $other_user_id = $_GET['u_id'] ?? 0;
    if ($user_id && $user->isAdmin) {
        $user_id = $other_user_id;
        $user = $user_model->getById($user_id);
    }

    // get all user specific data
    $my_posts = $post_model->getByAuthor($user_id);
    $my_bookmarks = $post_model->getMyBookmarks($user_id);

    $chatgroup_model = new Chatgroup();
    $my_chatgroups = $chatgroup_model->getByUser($user_id);

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
            <?php if ($admin) : ?>
                <div class="admin_btn d-flex align-items-center">
                    <h2>Bezoek het admin paneel</h2>
                    <a href="./admin/index.php" class="btn btn-primary">Admin paneel</a>
                    <a href="./admin/delete_user.php?u_id=<?= $user_id ?>" class="btn btn-danger">Verwijder gebruiker</a>
                </div>
            <?php endif ?>
            <h2>Mijn berichten</h2>
            <div class="my_posts row flex-nowrap overflow-auto">
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
            <h2>Mijn chats</h2>
            <div class="my_chats row">
                <?php

                    if ($my_chatgroups) {
                        foreach ($my_chatgroups as $chatgroup) {
                            include 'views/assets/chatgroup.php';
                        }
                    } else {
                        echo '<p>U heeft nog geen chats gestuurd/ontvangen.</p>';
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