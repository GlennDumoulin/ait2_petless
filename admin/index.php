<?php

    require '../app.php';

    // get pages, posts and users data
    $page_id = $_GET['p_id'] ?? 1;
    $current_page = Page::getById($page_id);
    
    $all_pages = Page::getAll();
    
    $post_model = new Post();
    $all_posts = $post_model->getAll();

    $all_users = $user_model->getAll();

    // redirect if not logged in or not admin
    if (!$user_id) {
        header('location: ../login.php');
        die();
    }
    if (!$user->isAdmin) {
        header('location: ../index.php');
        die();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin paneel - Petless</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <?php
        include '../views/assets/header.php';
    ?>
    <div class="admin_control_wrapper">
        <div class="container">
            <h1>Welkom op het Admin paneel</h1>
            <h2>Selecteer wat u wil controleren</h2>
            <div class="admin_control_buttons">
                <a href="#admin_control_pages" class="btn btn-primary">Pagina's</a>
                <a href="#admin_control_posts" class="btn btn-primary">Berichten</a>
                <a href="#admin_control_users" class="btn btn-primary">Gebruikers</a>
            </div>
            <div id="admin_control_pages">
                <h3>Pagina's</h3>
                <?php foreach ( $all_pages as $page ) : ?>
                    <div class="page d-flex justify-content-between align-items-center">
                        <div>
                            <?= $page['name']; ?>
                        </div>
                        <div>
                            <a href="./edit_page.php?p_id=<?= $page["page_id"] ?>" class="btn btn-primary">Bewerk</a>
                            <a href="./delete_page.php?p_id=<?= $page["page_id"] ?>" class="btn btn-danger">Verwijder</a>
                        </div>
                    </div>
                <?php endforeach ?>
                <a href="./edit_page.php" class="btn btn-success">Pagina toevoegen</a>
            </div>
            <div id="admin_control_posts">
                <h3>Berichten</h3>
                <div class="row flex-nowrap overflow-auto">
                    <?php

                        foreach ( $all_posts as $post ) {
                            include '../views/assets/post.php';
                        }

                    ?>
                </div>
            </div>
            <div id="admin_control_users">
                <h3>Gebruikers</h3>
                <div class="users_list row">
                    <?php foreach ( $all_users as $user ) : ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="../my_account.php?u_id=<?= $user['user_id'] ?>">
                                <div class="user">
                                    <p class="user_name"><?= $user['firstname'] . ' ' . $user['lastname'] ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        include '../views/assets/footer.php';
    ?>
    <script>
        feather.replace();
    </script>
</body>
</html>