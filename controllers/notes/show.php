<?php

use Core\Database;

$heading = 'My Note';
$current_user_id = 3;

$config = require base_path("config.php");
$db = new Database($config['database']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $note = $db->query(
        'select * from notes where id = :id',
        [':id' => $_GET['id'],]
    )->findOrFail();

    authorize($note['user_id'] === $current_user_id);


    $db->query('delete from notes where id = :id', [
        ':id' => $_GET['id'],
    ]);

    header("Location: /notes");
    exit();

} else {

    $note = $db->query(
        'select * from notes where id = :id',
        [':id' => $_GET['id'],]
    )->findOrFail();

    authorize($note['user_id'] === $current_user_id);
}

view("notes/show.view.php", [
    'heading' => $heading,
    'note' => $note,
]);