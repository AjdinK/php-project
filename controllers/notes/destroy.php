<?php

use Core\App;
use Core\Database;

$heading = 'My Note';
$current_user_id = 3;

$db = App::resolve(Database::class);

$note = $db->query(
    'select * from notes where id = :id',
    [':id' => $_POST['id'],]
)->findOrFail();

authorize($note['user_id'] === $current_user_id);


$db->query('delete from notes where id = :id', [
    ':id' => $_POST['id'],
]);

header("Location: /notes");
exit();
