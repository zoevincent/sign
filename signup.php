<?php
    include_once './utils/config.php';
    include './utils/register-handler.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
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
            <h1 class="content__head__title">Sign up</h1>
        </div>
        <!-- Link to sign in -->
        <span class="content__redirection">
            <p>You already have an account ?</p>
            <a class="content__redirection__link" href="index.php">sign in</a>
        </span>
        <!-- Form -->
        <form action="" method="post" class="content__form">
            <!-- Messages -->
            <?php foreach($errorMessages as $_message): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_message ?>
                </div>
            <?php endforeach ?>
            <?php foreach($successMessages as $_message): ?>
                <div class="alert alert-success" role="alert">
                    <?= $_message ?>
                </div>
            <?php endforeach ?>
            <!-- Name / Login -->
            <div class="content__form__element">
                <label for="login">Username</label>
                <input type="text" id="login" name="login" value="<?= $login ?>">
            </div>
            <!-- Email -->
            <div class="content__form__element">
                <label for="email">Email address</label>
                <input type="email" id="mail" name="mail" value="<?= $mail ?>">
            </div>
            <!-- Password -->
            <div class="content__form__element">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <!-- Confirm password -->
            <div class="content__form__element">
                <label for="passwordconfirm">Confirm password</label>
                <input type="password" id="passwordconfirm" name="passwordconfirm">
            </div>
            <!-- Submit -->
            <div class="content__form__submit">
                <button type="submit">Register</button>
            </div>
        </form>
        <p class="content__info">By selecting ‘Continue’, you agree to Tosha’s <a class="content__info__link"
                href="#">Terms & Conditions</a>.</p>
    </div>
    <!-- Image on the side -->
    <div class="image-container">
        <img class="image-container__img" src="./images/albums.png" alt="albums">
    </div>
</body>

</html>