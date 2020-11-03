<?php

    require 'app.php';

    // get pages and user data
    $page_id = $_GET['p_id'] ?? 1;
    $current_page = Page::getById($page_id);

    $all_pages = Page::getAll();

    $user_model = new User();

    // log the user in if email and password are correct
    $loginMsg = '';
    if ( isset( $_POST['login'] ) ) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $user_model->login($email);

        if ( isset( $user->email ) ) {
            if ( password_verify( $password, $user->password ) ) {

                $loginMsg = 'Welkom ' . $user->firstname;

                $_SESSION['user_id'] = $user->user_id;
                header('location: index.php');
                die();

            } else {

                $loginMsg = 'Email en/of wachtwoord is verkeerd!';

            }
        } else {

            $loginMsg = 'Email en/of wachtwoord is verkeerd!';

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Petless</title>
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
    <div class="login container">
        <h1 class="title">Log hier in</h1>
        <div class="login_content row">
            <form method="POST" class="col-12 col-lg-6">
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
                <button href="#" class="btn btn-primary" name="login">Login</button>
                <p>Heb je nog geen account? <a href="register.php">registreer hier</a></p>
                <?= ($loginMsg !== '') ? '<p class="login_error">' . $loginMsg . '</p>' : '' ?>
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