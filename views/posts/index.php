<main>
    <div class="filter_wrapper">
        <form
            method="POST"
            class="filter_form container d-flex justify-content-between align-items-center"
        >
            <div class="filter_item">
                <label for="race">Ras</label><br />
                <input type="text" name="race" />
            </div>
            <div class="filter_item">
                <label for="location">Locatie</label><br />
                <input type="text" name="location" />
            </div>
            <select name="sort_by_date">
                <option value="recent_first">Recentste eerst</option>
                <option value="oldest_first">Oudste eerst</option>
            </select>
            <select name="status">
                <option value="found">Gevonden</option>
                <option value="lost">Verloren</option>
            </select>
            <button type="submit" class="btn btn-primary">
                <i data-feather="search"></i> Zoeken
            </button>
        </form>
    </div>
    <div class="container">
        <div class="dogs_list row">
            <?php

                require '../../app.php';

                $sql =
                'SELECT *
                FROM `posts`
                ORDER BY `created_on` DESC
                ';

                // voorbereiding
                $pdo_statement = $db->prepare($sql);
                // uitvoeren
                $pdo_statement->execute();
                // resultaat opvangen
                $posts = $pdo_statement->fetchAll();


                foreach ($posts as $post) {
                    include '../assets/post.php';
                }

            ?>
        </div>
        <div
            class="pagination d-flex justify-content-between align-items-center"
        >
            <p class="disabled"><i data-feather="arrow-left"></i></p>
            <p class="active">1</p>
            <p>2</p>
            <p><i data-feather="arrow-right"></i></p>
        </div>
    </div>
</main>