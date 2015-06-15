<?php

require_once 'database.php';

try {
    $result = $db->query('SELECT film_id, title, release_year, rental_duration, length, replacement_cost FROM film');
} catch(Exception $e) {
    echo $e->getMessage();
    die();
}

$films = $result->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films Information</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <table>
        <caption>Films</caption>
        <thead>
            <tr>
                <? foreach(array_keys($films[0]) as $key) { ?>
                    <th scope='col'><?= $key ?></th>
                <? } ?>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="3">Data is updated every 15 minutes.</td>
            </tr>
        </tfoot>
        <tbody>
            <? foreach ($films as $item) { ?>
                <tr>
                <? foreach ($item as $key => $value) {
                    if ('title' === $key) { ?>
                        <th scope='row'><?= $value ?></th>
                    <? } else { ?>
                        <td><?= $value ?></td>
                    <? }
                } ?>
                </tr>
            <? } ?>
        </tbody>
    </table>
</body>
</html>
