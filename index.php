<?php
    include_once './utils/config.php';
    include './utils/login-handler.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="./sass/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Content -->
    <div class="content">
        <!-- Head -->
        <div class="content__head">
            <img class="content__head__img" src="./images/disc.svg" alt="disc">
            <h1 class="content__head__title">Sign in</h1>
        </div>
        <!-- Link to sign up -->
        <span class="content__redirection">
            <p>You don’t have an account ?</p>
            <a class="content__redirection__link" href="signup.php">sign up</a>
        </span>
        <!-- Form -->
        <form action="#" method="post" class="content__form">
            <!-- Messages -->
            <?php foreach($errorMessages as $_message): ?>
                <div class="alert-danger" role="alert">
                    <?= $_message ?>
                </div>
            <?php endforeach ?>
            <?php foreach($successMessages as $_message): ?>
                <div class="alert-success" role="alert">
                    <?= $_message ?>
                </div>
            <?php endforeach ?>
            <!-- Email -->
            <div class="content__form__element">
                <label for="login">Email address or login</label>
                <input type="text" id="login" name="login" value="<?= $login ?>">
            </div>
            <!-- Password -->
            <div class="content__form__element">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <!-- Password forgotten -->
            <a class="content__form__forgotten-password" href="#">Forgot password ?</a>
            <!-- Submit -->
            <div class="content__form__submit">
                <button type="submit">Sign in</button>
            </div>
        </form>
    </div>
    <!-- Image on the side -->
    <div class="image-container">
        <img class="image-container__img" src="./images/albums.png" alt="albums">
    </div>
</body>

</html>