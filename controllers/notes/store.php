<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
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
    ':user_id' => 1,
    ':body' => $_POST['body'],
]);

header('location: /notes');
die();
