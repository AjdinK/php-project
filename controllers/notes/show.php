<?php

use Core\App;
use Core\Database;

$current_user_id = 3;

$db = App::resolve(Database::class);

$note = $db->query(
    'select * from notes where id = :id',
    [':id' => $_GET['id'],]
)->findOrFail();

authorize($note['user_id'] === $current_user_id);

view("notes/show.view.php", [
    'heading' => 'My Note',
    'note' => $note,
]);
