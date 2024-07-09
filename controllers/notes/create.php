<?php
require "Validator.php";
$heading = "Create Note";

$config = require "config.php";
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];


    if (!Validator::String($_POST['body'], 1, 1000)) {
        $errors['body'] = "The Body can not be less than 10 characters and more than 1,000 characters";
    }

    if (empty($errors)) {
        $db->query("insert into notes (body,user_id) values (:body, :user_id)", [
            ':user_id' => 1,
            ':body' => $_POST['body'],
        ]);
    }
}

require "views/notes/create.view.php";
