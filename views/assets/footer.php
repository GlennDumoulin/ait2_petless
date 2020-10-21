<footer class="footer_wrapper">
    <div class="container">
        <div class="footer_main row">
            <div class="footer_info col-12 col-lg-6">
                <div class="footer_login">
                    <h1>Heb je al een account?</h1>
                    <p>
                        <a href="#">Log je hier in</a>
                        of
                        <a href="#">maak er nu één aan</a>
                    </p>
                </div>
                <div class="footer_sitemap">
                    <h1>Sitemap</h1>
                    <nav class="d-flex justify-content-between">
                    <?php

                        foreach ($all_pages as $page) {
                            echo '<a href="./index.php?p_id=' . $page['page_id'] . '">' . $page['name'] . '</a>';
                        }

                    ?>
                    </nav>
                </div>
            </div>
            <div class="footer_contact col-12 col-md-6">
                <div class="footer_socials d-flex flex-column">
                    <h1>Bereik ons via:</h1>
                    <a href="tel:+3212345678">
                        <i data-feather="phone"></i> +32 1 234 56 78
                    </a>
                    <a href="mailto:helpdesk.petless@gmail.com">
                        <i data-feather="mail"></i>
                        helpdesk.petless@gmail.com
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_legal d-flex justify-content-center">
        <p>©2020</p>
        <p>gemaakt door Glenn Dumoulin</p>
    </div>
</footer>