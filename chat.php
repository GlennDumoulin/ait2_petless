<?php

    require 'app.php';

    // redirect if not logged in
    if (!$user_id) {
        header('location: login.php');
        die();
    }

    // get pages, post and chatgroup data
    $page_id = $_GET['p_id'] ?? 1;
    $current_page = Page::getById($page_id);

    $all_pages = Page::getAll();
    
    $post_id = $_GET['post_id'] ?? 0;
    $post_model = new Post();
    $current_post = $post_model->getById($post_id);

    $group_id = $_GET['group_id'] ?? 0;

    if (!$group_id) {
        // redirect when entering chat with yourself
        if ($user_id == $current_post->author_id) {
            header('location: post_detail.php?p_id=' . $page_id . '&post_id=' . $post_id);
            die();
        }

        // get receiver data
        $receiver = $user_model->getById($current_post->author_id);

        // check if chatgroup already exists and create one if needed
        $groupdata = (object) array(
            "post_id" => $post_id,
            "sender" => $user_id,
            "receiver" => $receiver->user_id
        );
        $chatgroup_model = new Chatgroup();
        $total = $chatgroup_model->groupExists($groupdata);
        
        if (!$total) {
            $newChatgroup = new Chatgroup();

            $newChatgroup->post_id = $post_id;
            $newChatgroup->first_user_id = $user_id;
            $newChatgroup->second_user_id = $receiver->user_id;

            $newChatgroup->createGroup();
        }

        // get group data
        $current_group = $chatgroup_model->getGroup($groupdata);
        $group_id = $current_group->group_id;
    }

    // check if you are first or second user and get receiver data
    $chatgroup_model = new Chatgroup();
    $chatgroup = $chatgroup_model->getById($group_id);
    $receiver = $user_model->getById($chatgroup->second_user_id);
    if ($chatgroup->second_user_id == $user_id) {
        $receiver = $user_model->getById($chatgroup->first_user_id);
    }
    $receiver_name = $receiver->firstname . ' ' . $receiver->lastname;

    // get chatmessages
    $messages_model = new Chatmessage();
    $messages = $messages_model->getByGroup($group_id);

    // post new message
    if ( isset( $_POST['add_message'] ) ) {

        $message = $_POST['message'] ?? '';

        $newChatmessage = new Chatmessage();

        $newChatmessage->group_id = $group_id;
        $newChatmessage->sender_id = $user_id;
        $newChatmessage->message = $message;

        $newChatmessage->addMessage();

        header('location: chat.php?p_id=' . $page_id . '&post_id=' . $post_id . '&group_id=' . $group_id);
        die();

    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Chat met <?= $receiver_name ?> - Petless</title>
        <script src="https://unpkg.com/feather-icons"></script>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <?php
            include 'views/assets/header.php';
        ?>
        <div class="chat_wrapper">
            <a href="./post_detail.php?p_id=<?= $page_id ?>&post_id=<?= $post_id ?>" class="back_btn">
                <i data-feather="arrow-left-circle" width="50" height="50"></i>
            </a>
            <div class="container">
                <h1>Chat met <?= $receiver_name ?></h1>
                <div class="messages_list d-flex flex-column">
                    <form method="POST" class="add_message d-flex justify-content-between align-items-center">
                        <textarea name="message" cols="100" rows="2"></textarea>
                        <button href="#" class="btn btn-primary" name="add_message">chat verzenden</button>
                    </form>
                    <?php
                        if ($messages) {
                            foreach ($messages as $message) {
                                include 'views/assets/message.php';
                            }
                        } else {
                            echo '<p>Er zijn nog geen berichten om op te halen.</p>';
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