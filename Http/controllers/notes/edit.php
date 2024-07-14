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

view("notes/edit.view.php", [
    'heading' => "Edit Note",
    'errors' => [],
    'note' => $note,
]);
