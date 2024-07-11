<?php

use Core\Database;
use Core\Validator;

$config = require base_path("config.php");
$db = new Database($config['database']);
$errors = [];


if (!Validator::String($_POST['body'], 10, 1000)) {
    $errors['body'] = "The Body can not be less than 10 characters and more than 1,000 characters";
}

if (!empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => "Create Note",
        'errors' => $errors,
    ]);
}

$db->query("insert into notes (body,user_id) values (:body, :user_id)", [
    ':user_id' => 3,
    ':body' => $_POST['body'],
]);

header('location: /notes');
die();