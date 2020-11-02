<?php

    require_once '../app.php';

    // get pages data
    $page_id = $_GET['p_id'] ?? 0;
    $current_page = Page::getById($page_id || 1);

    $all_pages = Page::getAll();

    // redirect if not logged in or not admin
    if (!$user_id) {
        header('location: ../login.php');
        die();
    }
    if (!$user->isAdmin) {
        header('location: ../index.php');
        die();
    }

    // create new page or update one
    if ( isset($_POST['submit']) ) {
        $new_page = new Page();

        $new_page->page_id = $page_id;
        $new_page->name = $_POST['name'] ?? '';
        $new_page->slug = $_POST['slug'] ?? '';
        $new_page->title = $_POST['title'] ?? '';
        $new_page->content = $_POST['content'] ?? '';
        $new_page->page_order = $_POST['page_order'] ?? '';
        $new_page->template = $_POST['template'] ?? 'page';
        $new_page->type = $_POST['type'] ?? NULL;

        $new_page->save();

        header('location: index.php#admin_control_pages');
        die();
    }

    $result = Page::getById($page_id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ( $page_id ) ? "Bewerk " . $result->name : "Pagina toevoegen" ?> - Petless</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <?php
        include '../views/assets/header.php';
    ?>
    <div class="container">
        <h1 class="title"><a href="./index.php#admin_control_pages">Pagina's</a> > <?= ( $page_id ) ? "Bewerk " . $result->name : "Pagina toevoegen" ?></h1>
        <form action="" method="POST">
        <p>
            <label>
                Naam <br>
                <input type="text" name="name" value="<?= ( $page_id ) ? $result->name : '' ?>" required>
            </label>
        </p>
        <p>
            <label>
                Slug <br>
                <input type="text" name="slug" value="<?= ( $page_id ) ? $result->slug : '' ?>" required>
            </label>
        </p>
        <p>
            <label>
                Titel <br>
                <input type="text" name="title" value="<?= ( $page_id ) ? $result->title : '' ?>" required>
            </label>
        </p>
        <p>
            <label>
                Inhoud <br>
                <textarea rows="10" cols="150" name="content">
                    <?= ( $page_id ) ? $result->content : '' ?>
                </textarea>
            </label>
        </p>
        <p>
            <label>
                Volgorde <br>
                <input type="number" name="page_order" value="<?= ( $page_id ) ? $result->page_order : '' ?>" required>
            </label>
        </p>
        <p>
            <label>
                Template <br>
                <select type="text" name="template" required>
                    <?php
                    $templates = [
                        'home',
                        'posts',
                        'page'
                    ];
                    foreach($templates as $template) : ?>
                    <option value="<?= $template; ?>"<?php if($page_id && $result->template == $template) { echo 'selected';  } ?>>
                        <?= $template; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </label>
        </p>
        <p>
            <label>
                Type <br>
                <input type="text" name="type" value="<?= ( $page_id ) ? $result->type : '' ?>">
            </label>
        </p>
        <button href="#" class="btn btn-primary" name="submit"><?= ( $page_id ) ? "Aanpassen" : "Toevoegen" ?></button>
        </form>
    </div>
    <?php
        include '../views/assets/footer.php';
    ?>
    <script>
        feather.replace();
    </script>
</body>
</html>