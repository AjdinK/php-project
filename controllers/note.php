<?php

$heading = 'My Note';

$config = require "config.php";
$db = new Database($config['database']);


$note = $db->query(
    'select * from notes where id = :id',
    [':id' => $_GET['id'],]
)->findOrFail();


$current_user_id = 1;
authorize($note['user_id'] === $current_user_id);

require "views/note.view.php";
