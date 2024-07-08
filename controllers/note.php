<?php

$heading = 'My Note';
$current_user_id = 1;
$config = require "config.php";
$db = new Database($config['database']);

$note = $db->query('select * from notes where id = :id',
    [':id' => $_GET['id'],])->fetch();


if (!$note) {
    abort(Response::NOT_FOUND);
}

if ($note['user_id'] !== $current_user_id) {
    abort(Response::FORBIDDEN);
}


require "views/note.view.php";