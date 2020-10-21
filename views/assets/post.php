<?php
    $post = (object) $post;
    $address = (str_replace(", ", "<br>", $post->address));
    $formatted_date = date("d M Y", strtotime($post->found_on_lost_since));
?>

<div class="dogs_list_item col-6 col-md-4">
    <a href="./detail.php">
        <div class="item_content">
            <div class="overlay"></div>
            <h1 class="race"><?= $post->race ?></h1>
            <i data-feather="bookmark" class="bookmark"></i>
            <div class="info">
                <?php if ($post->status == "found") : ?>
                    <i data-feather="map-pin"></i>
                    <p>Gevonden op <?= $formatted_date ?></p>
                    <p><?= $address ?></p>
                <?php elseif ($post->status == "lost") : ?>
                    <i data-feather="frown"></i>
                    <p>Verloren sinds <?= $formatted_date ?></p>
                    <p><?= $address ?></p>
                <?php elseif ($post->status == "resolved") : ?>
                    <i data-feather="smile"></i>
                    <p>Bedankt om mij terug thuis te brengen</p>
                <?php endif; ?>
            </div>
        </div>
    </a>
</div>