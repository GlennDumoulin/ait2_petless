<?php

    $type = $_GET['type'] ?? '';

    $post_model = new Post();

    include 'views/assets/pagination.php';

?>

<main>
    <div class="filter_wrapper <?= $type ?>_bg">
        <form
            method="POST"
            class="filter_form d-flex justify-content-between align-items-center"
        >
            <?php if ($type == 'andere') : ?>
                <div class="filter_item">
                    <label for="type">Type</label><br />
                    <input type="text" name="type" />
                </div>
            <?php endif; ?>
            <div class="filter_item">
                <label for="race">Ras</label><br />
                <input type="text" name="race" />
            </div>
            <div class="filter_item">
                <label for="location">Locatie</label><br />
                <input type="text" name="location" placeholder="postcode + gemeente" />
            </div>
            <select name="sort_by_date">
                <option value="recent_first">Recentste eerst</option>
                <option value="oldest_first">Oudste eerst</option>
            </select>
            <select name="status">
                <option value="found">Gevonden</option>
                <option value="lost">Gezocht</option>
            </select>
            <button type="submit" class="btn btn-primary">
                <i data-feather="search"></i> Zoeken
            </button>
        </form>
    </div>
    <div class="container">
        <div class="dogs_list row">
            <?php

                if ($posts) {
                    foreach ($posts as $post) {
                        include 'views/assets/post.php';
                    }
                }

            ?>
        </div>
        <div
            class="pagination d-flex justify-content-between align-items-center"
        >
            <?php

                if ($links == NULL) {
                    echo "<p>Er werden geen posts gevonden.</p>";
                } elseif ($totalPages == 1) {
                    echo "";
                } else {
                    echo $links;
                }

            ?>
        </div>
    </div>
</main>