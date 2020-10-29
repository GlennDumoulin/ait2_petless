<?php

    $type = $_GET['type'] ?? '';
    $race = $_GET['race'] ?? '';
    $location = $_GET['location'] ?? '';
    $sort_order = $_GET['sort_order'] ?? 'DESC';
    $status = $_GET['status'] ?? '';
    print_r($location);

    $post_model = new Post();

    include 'views/assets/pagination.php';
?>

<main>
    <div class="filter_wrapper <?= $type ?>_bg">
        <form
            method="GET"
            class="filter_form d-flex justify-content-between align-items-center"
        >
            <input type="hidden" name="p_id" value=<?= $page_id ?> />
            <?php if ($type !== 'andere') : ?>
                <input type="hidden" name="type" value=<?= $type ?> />
            <?php endif; ?>
            <?php if ($page_id === '4') : ?>
                <div class="filter_item">
                    <label for="type">Type</label><br />
                    <input type="text" name="type" value="<?= ($type !== "" && $type !== "andere") ? $type : "" ?>" />
                </div>
            <?php endif; ?>
            <div class="filter_item">
                <label for="race">Ras</label><br />
                <input type="text" name="race" value="<?= $race ?? "" ?>" />
            </div>
            <div class="filter_item">
                <label for="location">Locatie</label><br />
                <input type="text" name="location" value="<?= $location ?? "" ?>" />
            </div>
            <select name="sort_order">
                <option value="DESC" <?= ($sort_order === "DESC") ? 'selected' : '' ?> >Recentste eerst</option>
                <option value="ASC" <?= ($sort_order === "ASC") ? 'selected' : '' ?> >Oudste eerst</option>
            </select>
            <select name="status">
                <option value="" <?= ($status === "") ? 'selected' : '' ?> >Alle posts</option>
                <option value="found" <?= ($status === "found") ? 'selected' : '' ?> >Gevonden</option>
                <option value="lost" <?= ($status === "lost") ? 'selected' : '' ?> >Gezocht</option>
            </select>
            <button type="submit" class="btn btn-primary">
                <i data-feather="search"></i> Zoeken
            </button>
        </form>
    </div>
    <div class="container">
        <div class="list row">
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