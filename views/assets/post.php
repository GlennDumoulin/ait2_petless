<?php

    // create new object for current post and format some data
    $post = (object) $post;
    $address = (str_replace(", ", "<br>", $post->address));
    $formatted_date = strftime("%a %e %b %Y", strtotime($post->found_on_lost_since));

    // set page_id based on type of the post
    if ($post->type === 'hond') {
        $page_id = 2;
    } elseif ($post->type === 'kat') {
        $page_id = 3;
    } else {
        $page_id = 4;
    }

?>
<!-- Check if the request comes from admin folder or not -->
<?php if (strpos($_SERVER['PHP_SELF'], 'admin')) : ?>
    <div class="list_item col-6 col-md-4">
        <a href="../post_detail.php?p_id=<?= $page_id ?>&post_id=<?= $post->post_id ?>">
            <div class="item_content">
                <img src="../images/<?= $post->author_id ?>/<?= $post->image ?>">
                <div class="overlay"></div>
                <h1 class="race"><?= $post->race ?></h1>
                <div class="info">
                    <?php if ($post->status == "found") : ?>
                        <i data-feather="map-pin"></i>
                        <p>Gevonden op <?= $formatted_date ?></p>
                        <p><?= $address ?></p>
                    <?php elseif ($post->status == "lost") : ?>
                        <i data-feather="frown"></i>
                        <p>Gezocht sinds <?= $formatted_date ?></p>
                        <p><?= $address ?></p>
                    <?php elseif ($post->status == "resolved") : ?>
                        <i data-feather="smile"></i>
                        <p>Bedankt om mij terug thuis te brengen</p>
                    <?php endif; ?>
                </div>
            </div>
        </a>
    </div>
<?php else : ?>
    <div class="list_item col-6 col-md-4">
        <a href="./post_detail.php?p_id=<?= $page_id ?>&post_id=<?= $post->post_id ?>">
            <div class="item_content">
                <img src="images/<?= $post->author_id ?>/<?= $post->image ?>">
                <div class="overlay"></div>
                <h1 class="race"><?= $post->race ?></h1>
                <div class="info">
                    <?php if ($post->status == "found") : ?>
                        <i data-feather="map-pin"></i>
                        <p>Gevonden op <?= $formatted_date ?></p>
                        <p><?= $address ?></p>
                    <?php elseif ($post->status == "lost") : ?>
                        <i data-feather="frown"></i>
                        <p>Gezocht sinds <?= $formatted_date ?></p>
                        <p><?= $address ?></p>
                    <?php elseif ($post->status == "resolved") : ?>
                        <i data-feather="smile"></i>
                        <p>Bedankt om mij terug thuis te brengen</p>
                    <?php endif; ?>
                </div>
            </div>
        </a>
    </div>
<?php endif ?>