<?php

    require 'app.php';

    if (!$user_id) {
        header('location: login.php');
    }

    $page_id = $_GET['p_id'] ?? 1;
    $current_page = Page::getById($page_id);

    $all_pages = Page::getAll();

    $post_id = $_GET['post_id'] ?? 0;

    $img = '';

    if ( isset( $_FILES['img']) && $_FILES['img']['size'] > 0 ) {
        $upload_dir = './images/' . $user_id . '/';
        if( ! is_dir( $upload_dir ) ) {
            mkdir( $upload_dir);
        }

        $tmp_location = $_FILES['img']['tmp_name'];
        $old_name = $_FILES['img']['name'];
        $file_type = $_FILES['img']['type'];
        $file_info = pathinfo($old_name);
        $extension = $file_info['extension'];
        $img = uniqid() . '.' . $file_info['extension'];
        $new_location = $upload_dir . $img;

        move_uploaded_file($tmp_location, $new_location);
    }

    if ( isset( $_POST['submit_post'] ) ) {
        $new_post = new Post();

        $new_post->post_id = $post_id;
        $new_post->author_id = $user_id;
        $new_post->status = $_POST['status'] ?? '';
        $new_post->address = $_POST['address'] ?? '';
        $new_post->type = strtolower($_POST['type']) ?? '';
        $new_post->race = strtolower($_POST['race']) ?? '';
        $new_post->description = $_POST['description'] ?? '';
        $new_post->found_on_lost_since = $_POST['date'] ?? '';
        $new_post->image = $img ?? '';

        $new_post->save();

        if ($new_post->type === 'hond') {
            header('location: index.php?p_id=2&type=hond');
        } elseif ($new_post->type === 'kat') {
            header('location: index.php?p_id=3&type=kat');
        } else {
            header('location: index.php?p_id=4&type=andere');
        }
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Nieuw bericht - Petless</title>
        <script src="https://unpkg.com/feather-icons"></script>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <?php

            include 'views/assets/header.php';
        ?>
        <div class="container">
            <form method="POST" class="new_message_form row" enctype="multipart/form-data">
                <div class="content row col-6">
                    <div class="status col-6 d-flex align-items-center">
                        <select name="status" required>
                            <option value="found">Gevonden</option>
                            <option value="lost">Gezocht</option>
                        </select>
                        <b class="required">*</b>
                    </div>
                    <div class="address col-6">
                        <label for="address">
                            Adres <b class="required">*</b>
                        </label>
                        <br />
                        <input type="text" name="address" placeholder="straat+nr, zip+gemeente" required>
                    </div>
                    <div class="type col-6">
                        <label for="type">
                            Type <b class="required">*</b>
                        </label>
                        <br />
                        <input type="text" name="type" placeholder="bv. hond, kat,..." required>
                    </div>
                    <div class="race col-6">
                        <label for="race">Ras</label>
                        <br />
                        <input type="text" name="race" placeholder="bv. husky, perzisch,...">
                    </div>
                    <div class="description col-12">
                        <label for="description">
                            Beschrijving <b class="required">*</b>
                        </label>
                        <br />
                        <textarea name="description" cols="55" rows="5" required></textarea>
                    </div>
                    <div class="required req_definition">
                        * = verplichte velden
                    </div>
                </div>
                <div
                    class="date_and_img d-flex flex-column justify-content-between col-5 offset-1"
                >
                    <div class="date">
                        <label for="date">
                            Gevonden op / Verloren sinds
                            <b class="required">*</b>
                        </label>
                        <br />
                        <input type="date" name="date" />
                    </div>
                    <div class="img">
                        <label for="img"
                            >Selecteer uw foto
                            <b class="required">*</b></label
                        >
                        <input type="file" name="img" accept="image/*" required />
                    </div>
                </div>
                <button type="submit" class="form_submit btn btn-primary" name="submit_post">
                    <i data-feather="message-square"></i> Bericht plaatsen
                </button>
            </form>
        </div>
        <?php
            include 'views/assets/footer.php';
        ?>
        <script>
            feather.replace();
        </script>
    </body>
</html>