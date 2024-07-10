<?php

use Core\Database;

$heading = 'My Note';

$config = require base_path("config.php");
$db = new Database($config['database']);


$note = $db->query(
    'select * from notes where id = :id',
    [':id' => $_GET['id'],]
)->findOrFail();


$current_user_id = 3;
authorize($note['user_id'] === $current_user_id);

view("notes/show.view.php", [
    'heading' => $heading,
    'note' => $note,
]);
