<?php

use Core\Database;

$heading = 'My Note';
$current_user_id = 3;

$config = require base_path("config.php");
$db = new Database($config['database']);


$note = $db->query(
    'select * from notes where id = :id',
    [':id' => $_GET['id'],]
)->findOrFail();

authorize($note['user_id'] === $current_user_id);

view("notes/show.view.php", [
    'heading' => $heading,
    'note' => $note,
]);