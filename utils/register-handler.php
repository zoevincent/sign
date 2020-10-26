<?php

// Message
$errorMessages = [];
$successMessages = [];

// Base values
$login = '';
$mail = '';
$password = '';


// Form sent
if(!empty($_POST))
{
    // Sanitize data
    $login = trim(strip_tags($_POST['login']));
    $password = $_POST['password'];
    $passwordconfirm = $_POST['passwordconfirm'];
    $mail = $_POST['mail'];

    // Errors
    if(empty($login))
    {
        $errorMessages[] = 'Missing login';
    }
    if(empty($mail))
    {
        $errorMessages[] = 'Missing mail';
    }
    else if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
    {
        $errorMessages[] = 'Wrong mail format';
    }
    if(empty($password))
    {
        $errorMessages[] = 'Missing password';
    }
    else if(strlen($password) < 5)
    {
        $errorMessages[] = 'Password too short';
    }
    else if(!preg_match('/[a-z]/', $password) || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password))
    {
        $errorMessages[] = 'Password should contain lowercase, uppercase and numbers';
    }
    else if($password != $passwordconfirm)
    {
        $errorMessages[] = 'Password must be the same !';
    }


    // Check DB and Success
    if(empty($errorMessages))
    {
        $reqlogin = $pdo->prepare("SELECT * FROM users WHERE login = ?");
        $reqlogin->execute(array($login));
        $loginexist = $reqlogin->rowCount();
        if($loginexist == 0)
        {
            $reqmail = $pdo->prepare("SELECT * FROM users WHERE mail = ?");
            $reqmail->execute(array($mail));
            $mailexist = $reqmail->rowCount();
            if($mailexist == 0)
            {
                $successMessages[] = 'You are now registered  <a href="index.php"">Click here to connect</a>';
        
                // DB Add values
                $prepare = $pdo->prepare('
                    INSERT INTO
                        users (login, password, mail)
                    VALUES
                        (:login, :password, :mail)
                ');

                $prepare->bindValue(':login', $login);
                $prepare->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
                $prepare->bindValue(':mail', $mail);
                $prepare->execute();
            }
            else
            {
                $errorMessages[] = 'This mail is already used !';
            }
        }
        else 
        {
            $errorMessages[] = 'This login is already used !';
        }

        // Reset values
        $login = '';
        $password = '';
        $mail = '';
    }
}