<?php
$heading = "Create Note";

$config = require "config.php";
$db = new Database($config['database']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query("insert into notes (body,user_id) values (:body, :user_id)", [
        ':user_id' => 1,
        ':body' => $_POST['body'],
    ]);
}

require "views/note-create.view.php";