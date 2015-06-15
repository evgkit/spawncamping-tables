<?php

ini_set('display_errors', 'On');

try {
    $db = new PDO('sqlite:../sakila-db/database.db');
    //$db = new PDO("mysql:host=localhost;dbname=sakila", $login, $pwd);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    echo "Wow! Database connection is broken." . PHP_EOL;
    echo $e->getMessage();
    die();
}