<?php

    $chatgroup = (object) $chatgroup;

    $status = '';
    if ($chatgroup->status == "found") {
        $status = 'gevonden';
    } elseif ($chatgroup->status == "lost") {
        $status = 'gezocht';
    } else {
        $status = 'terug terecht';
    }

    // check if you are first or second user and get receiver data
    $receiver = $user_model->getById($chatgroup->second_user_id);
    if ($chatgroup->second_user_id == $user_id) {
        $receiver = $user_model->getById($chatgroup->first_user_id);
    }
    $receiver_name = $receiver->firstname;

?>
<div class="chatgroup list_item col-6 col-md-4">
    <a href="./chat.php?p_id=<?= $page_id ?>&post_id=<?= $chatgroup->post_id ?>&group_id=<?= $chatgroup->group_id ?>">
        <div class="item_content">
            <img src="images/<?= $chatgroup->author_id ?>/<?= $chatgroup->image ?>">
            <div class="overlay"></div>
            <h1 class="race"><?= $chatgroup->race ?> - <?= $status ?></h1>
            <p class="info">Chat verder met <?= $receiver_name ?></p>
        </div>
    </a>
</div>