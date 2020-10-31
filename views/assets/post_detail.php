<?php

    $address = (str_replace(", ", "<br>", $post->address));
    $formatted_date = strftime("%a %e %b %Y", strtotime($post->found_on_lost_since));
    if ($post->status == "lost") {
        $status = "gezocht";
    } elseif ($post->status == "found") {
        $status = "gevonden";
    } elseif ($post->status == "resolved") {
        $status = "terug terecht";
    }

?>
<main>
    <div class="detail_wrapper">
        <a href="./index.php?p_id=<?= $page_id ?>&type=<?= $current_page->type ?>" class="back_btn">
            <i
                data-feather="arrow-left-circle"
                width="50"
                height="50"
            ></i>
        </a>
        <div class="container">
            <h1>
                <?php
                    if ($post->race != "") {
                        echo $post->race . " - " . $status ;
                    } else {
                        echo $status ;
                    }
                ?>
            </h1>
            <div class="detail_content row">
                <div class="content_wrapper col-6 d-flex flex-column justify-content-between">
                    <div class="description">
                        <p>
                            <?= $post->description ?>
                        </p>
                    </div>
                    <div class="related_info">
                        <div class="info content_item row justify-content-around align-items-center">
                            <p class="col-12 offset-1"><i data-feather="info"></i> Info</p>
                            <?php if ($post->status == "found") : ?>
                                <p><?= $address ?></p>
                                <p>Gevonden op <?= $formatted_date ?></p>
                            <?php elseif ($post->status == "lost") : ?>
                                <p><?= $address ?></p>
                                <p>Gezocht sinds <?= $formatted_date ?></p>
                            <?php elseif ($post->status == "resolved") : ?>
                                <p>Bedankt om mij terug thuis te brengen</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="image col-6">
                    <img src="./images/<?= $post->author_id ?>/<?= $post->image ?>" />
                </div>
            </div>
            <div class="detail_buttons d-flex justify-content-center">
                <?php if ($user_id == $post->author_id) : ?>
                    <a href="./edit_post.php?post_id=<?= $post_id ?>" class="btn btn-warning">
                        <i data-feather="message-square"></i>
                        Bericht bewerken
                    </a>
                <?php else : ?>
                    <a href="#" class="btn btn-primary">
                        <i data-feather="message-circle"></i>
                        Start een chat
                    </a>
                <?php endif ?>
                <a href="#" class="btn btn-primary">
                    <i data-feather="bookmark"></i>
                    Bericht bewaren
                </a>
                <?php if ($user->isAdmin) : ?>
                    <a href="#" class="btn btn-danger">
                        <i data-feather="alert-triangle"></i>
                        Bericht verwijderen
                    </a>
                <?php endif ?>
            </div>
        </div>
    </div>
</main>