<?php

    require 'app.php';

    // get pages and user data
    $page_id = $_GET['p_id'] ?? 1;
    $current_page = Page::getById($page_id);
    
    $all_pages = Page::getAll();

    $user_model = new User();

    // create a new user if the email is unique
    $registerMsg = '';
    if ( isset( $_POST['register'] ) ) {
        $firstname = $_POST['firstname'] ?? '';
        $lastname = $_POST['lastname'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = password_hash( $_POST['password'], PASSWORD_DEFAULT );

        $userInfo = (object) array(
            "firstname" => $firstname,
            "lastname" => $lastname,
            "email" => $email,
            "password" => $password
        );

        $total = $user_model->emailExists($email);

        if ( $total > 0 ) {
            $registerMsg = 'deze email bestaat al...';
        } else {

            $user_model->register($userInfo);

            $new_user_id = $db->lastInsertId();
            $registerMsg = 'Gebruiker ' . $new_user_id . ' is aangemaakt!';

            header('location: login.php');
            die();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren - Petless</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="css/main.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include 'views/assets/header.php';
    ?>
    <div class="register container">
        <h1>Maak hier uw account aan</h1>
        <div class="register_content row">
            <form method="POST" class="col-12 col-lg-6">
                <p>
                    <label>
                        Firstname <br>
                        <input type="text" name="firstname" required>
                    </label>
                </p>
                <p>
                    <label>
                        Lastname <br>
                        <input type="text" name="lastname" required>
                    </label>
                </p>
                <p>
                    <label>
                        Email <br>
                        <input type="email" name="email" required>
                    </label>
                </p>
                <p>
                    <label>
                        Password <br>
                        <input type="password" name="password" required>
                    </label>
                </p>
                <button href="#" class="btn btn-primary" name="register">Registreer</button>
                <p>Heb je al een account? <a href="login.php">log hier in</a></p>
                <?= ($registerMsg !== '') ? '<p>' . $registerMsg . '</p>' : '' ?>
            </form>
            <div id="carouselExampleInterval" class="carousel slide col-12 col-lg-6" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-interval="5000">
                        <a href="./index.php?p_id=2&type=hond">
                            <img src="./images/hond_bg.jpg">
                        </a>
                    </div>
                    <div class="carousel-item" data-interval="5000">
                        <a href="./index.php?p_id=3&type=kat">
                            <img src="./images/kat_bg.jpg">
                        </a>
                    </div>
                    <div class="carousel-item" data-interval="5000">
                        <a href="./index.php?p_id=4&type=andere">
                            <img src="./images/andere_bg.jpg">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include 'views/assets/footer.php';
    ?>
    <script>
        feather.replace();
    </script>
</body>
</html>