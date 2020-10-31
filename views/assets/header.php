<header>
    <nav class="nav row no-gutters">
        <div class="nav_logo col-4">
            <a href="./index.php">petless</a>
        </div>
        <div class="nav_pages col-8">
            <div class="nav_pages_top d-flex justify-content-end">
                <a href="./edit_post.php" class="<?= ($user_id) ? '' : 'hidden' ?>" >bericht plaatsen</a>
                <p>
                    <i data-feather="user"></i>
                    <?php if ($user_id === 0) : ?>
                        <a href="./login.php">inloggen</a> of
                        <a href="./register.php">registreren</a>
                    <?php else : ?>
                        <a href="./account.php">mijn account</a> of
                        <a href="./logout.php">uitloggen</a>
                    <?php endif; ?>
                </p>
            </div>
            <div class="nav_pages_bottom d-flex justify-content-end">
                <?php

                    foreach ($all_pages as $page) {
                        $pageUrlMid = '';

                        if ($page['template'] === 'home') {
                            $pageUrlMid = '"><i data-feather="home"></i>';
                        } elseif ($page['template'] === 'posts') {
                            $pageUrlMid = '&type=' . $page['type'] . '" class="' . (($page['page_id'] == $current_page->page_id) ? "active" : "") . '">' . $page['name'];
                        } else {
                            $pageUrlMid = '" class="' . (($page['page_id'] == $current_page->page_id) ? 'active' : '') . '">' . $page['name'];
                        }

                        echo '<a href="./index.php?p_id=' . $page['page_id'] . $pageUrlMid . '</a>';
                    }

                ?>
            </div>
        </div>
    </nav>
</header>