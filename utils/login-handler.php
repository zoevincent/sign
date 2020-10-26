<?php
include_once 'config.php';
$loginspace = True;

// Session init
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

// Message
$errorMessages = [];
$successMessages = [];

// Base values
$login = '';
$password = '';

// Form sent
if(!empty($_POST))
{

    // Sanitize data
    $login = trim(strip_tags($_POST['login']));
    $password = $_POST['password'];

    // Errors
    if(empty($login))
    {
        $errorMessages[] = 'Missing login';
    }
    if(empty($password))
    {
        $errorMessages[] = 'Missing password';
    }
    else if(strlen($password) < 5)
    {
        $errorMessages[] = 'Password too short';
    }

    // Success
    if(empty($errorMessages))
    {
        $requser = $pdo->prepare('SELECT * FROM users WHERE (login = ? OR mail = ?)');
        $requser->execute(array($login, $login));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $passwordhash = $userinfo['password'];
            if (password_verify($password, $passwordhash))
            {
                $_SESSION['login'] = $userinfo['login'];
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['mail'] = $userinfo['mail'];
                $_SESSION['auth'] = $userinfo;
                $successMessages[] = 'You are now logged in!';
                // Reset values
                $login = '';
                $password = '';
            }
            else
            {
                $errorMessages[] = 'Wrong login or password.';
            }
        }
        else
        {
            $errorMessages[] = 'Wrong login or password.';
        }
    }
}
