<?php

// Errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// DB
if($_SERVER['HTTP_HOST'] === 'localhost')
{
    define('DB_HOST', '127.0.0.1');
    define('DB_PORT', '3306');
}
else if($_SERVER['HTTP_HOST'] === 'sandbox.matthieuvidal.fr') // OVH Server
{
    define('DB_HOST', '127.0.0.1');
    define('DB_PORT', '3306');
}
define('DB_NAME', 'tosha');
define('DB_USER', 'blogaccess');
define('DB_PASS', '3yKgqWB5LV1fB7jV');

$pdo = new PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME, DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

