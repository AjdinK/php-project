<?php

$heading = 'My Note';
$config = require "config.php";
$db = new Database($config['database']);

$note = $db->query('select * from notes where user_id = :id', [':id' => $_GET['id']])->fetchAll();
//dd($note);
require "views/note.view.php";