<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Honden lijst - Petless</title>
        <script src="https://unpkg.com/feather-icons"></script>
        <link rel="stylesheet" href="./css/main.css" />
    </head>
    <body>
        <?php

            include 'views/header.php';

        ?>

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
                    <div class="dogs_list_item col-6 col-md-4">
                        <a href="./detail.php">
                            <div class="item_content">
                                <div class="overlay"></div>
                                <h1 class="race">Duitse herder</h1>
                                <i data-feather="bookmark" class="bookmark"></i>
                                <div class="info">
                                    <i data-feather="map-pin"></i>
                                    <p>Gevonden op 7 okt 2020</p>
                                    <p>Vromondstraat 48,<br> 9270 Kalken</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dogs_list_item col-6 col-md-4">
                        <a href="./detail.php">
                            <div class="item_content">
                                <div class="overlay"></div>
                                <i data-feather="bookmark" class="bookmark"></i>
                                <div class="info">
                                    <i data-feather="frown"></i>
                                    <p>Vermist sinds 7 okt 2020</p>
                                    <p>Industrieweg 12,<br> 9000 Gent</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dogs_list_item col-6 col-md-4">
                        <a href="./detail.php">
                            <div class="item_content">
                                <div class="overlay"></div>
                                <h1 class="race">Bulldog</h1>
                                <i data-feather="bookmark" class="bookmark"></i>
                                <div class="info">
                                    <i data-feather="map-pin"></i>
                                    <p>Gevonden op 7 okt 2020</p>
                                    <p>Vromondstraat 48,<br> 9270 Kalken</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dogs_list_item col-6 col-md-4">
                        <a href="./detail.php">
                            <div class="item_content">
                                <div class="overlay"></div>
                                <i data-feather="bookmark" class="bookmark"></i>
                                <div class="info">
                                    <i data-feather="frown"></i>
                                    <p>Vermist sinds 7 okt 2020</p>
                                    <p>Industrieweg 12,<br> 9000 Gent</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dogs_list_item col-6 col-md-4">
                        <a href="./detail.php">
                            <div class="item_content">
                                <div class="overlay"></div>
                                <h1 class="race">Golden retriever</h1>
                                <i data-feather="bookmark" class="bookmark"></i>
                                <div class="info">
                                    <i data-feather="frown"></i>
                                    <p>Vermist sinds 7 okt 2020</p>
                                    <p>Industrieweg 12,<br> 9000 Gent</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dogs_list_item col-6 col-md-4">
                        <a href="./detail.php">
                            <div class="item_content">
                                <div class="overlay"></div>
                                <i data-feather="bookmark" class="bookmark"></i>
                                <div class="info">
                                    <i data-feather="map-pin"></i>
                                    <p>Gevonden op 7 okt 2020</p>
                                    <p>Vromondstraat 48,<br> 9270 Kalken</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dogs_list_item col-6 col-md-4">
                        <a href="./detail.php">
                            <div class="item_content">
                                <div class="overlay"></div>
                                <i data-feather="bookmark" class="bookmark"></i>
                                <div class="info">
                                    <i data-feather="map-pin"></i>
                                    <p>Gevonden op 7 okt 2020</p>
                                    <p>Vromondstraat 48,<br> 9270 Kalken</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dogs_list_item col-6 col-md-4">
                        <a href="./detail.php">
                            <div class="item_content">
                                <div class="overlay"></div>
                                <h1 class="race">Poedel</h1>
                                <i data-feather="bookmark" class="bookmark"></i>
                                <div class="info">
                                    <i data-feather="map-pin"></i>
                                    <p>Gevonden op 7 okt 2020</p>
                                    <p>Vromondstraat 48,<br> 9270 Kalken</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dogs_list_item col-6 col-md-4">
                        <a href="./detail.php">
                            <div class="item_content">
                                <div class="overlay"></div>
                                <h1 class="race">Golden retriever</h1>
                                <i data-feather="bookmark" class="bookmark"></i>
                                <div class="info">
                                    <i data-feather="frown"></i>
                                    <p>Vermist sinds 7 okt 2020</p>
                                    <p>Industrieweg 12,<br> 9000 Gent</p>
                                </div>
                            </div>
                        </a>
                    </div>
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

        <?php

            include 'views/footer.php';

        ?>

        <script>
            feather.replace();
        </script>
    </body>
</html>