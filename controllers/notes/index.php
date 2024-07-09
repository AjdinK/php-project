<?php

$heading = "My Notes";
$config = require "config.php";
$db = new Database($config['database']);
$notes = $db->query('select * from notes')->fetchAll();


require "views/notes/index.view.php";
