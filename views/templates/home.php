<main>
    <div class="home">
        <div class="container">
            <div class="home_intro">
                <h1>Welkom op de <?= $current_page->title ?> van Petless</h1>
                <p>Deze website is gemaakt om je huisdier sneller terug te vinden wanneer hij/zij wegliep als de voordeur even te lang open stond.</p>
                <p><a href="./register.php">Maak nu een account aan</a> om de website volledig te kunnen benutten en bezoek na het <a href="./login.php">inloggen</a> zeker eens de <a href="./my_account.php">Mijn account</a> pagina. Hier staat een volledig overzicht van al jouw berichten, berichten die je bewaard hebt om later te herbekijken en ook al je chats met andere gebruikers.</p>
                <p>Eens je ingelogd bent kan je zelf berichten plaatsen om een gezocht of gevonden huisdier te melden en zelf nog meer een steentje bij te dragen aan het doel van deze website namelijk:</p>
                <p>De dieren zoveel mogelijk helpen en zo snel mogelijk terug bij hun baasje krijgen.</p>
            </div>
            <div class="home_recent">
                <h1>Bekijk enkele recente berichten</h1>
                <div class="row">
                    <?php

                        $post_model = new Post();
                        $recent_posts = $post_model->getMostRecent();

                        foreach ($recent_posts as $post) {
                            include 'views/assets/post.php';
                        }

                    ?>
                </div>
            </div>
            <div class="home_page_links">
                <h1>Heb je een dier gevonden maar weet je niet direct wat te doen?</h1>
                <h3>Bekijk dan zeker eens deze pagina --> <a href="./index.php?p_id=5" class="btn btn-primary">Dier gevonden?</a><h3>
                <h1>Heb je nog andere vragen?</h1>
                <h3>Twijfel dan zeker niet om ons te contacteren --> <a href="./index.php?p_id=6" class="btn btn-primary">Contact</a><h3>
            </div>
        </div>
    </div>
</main>