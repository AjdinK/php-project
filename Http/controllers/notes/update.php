<?php

use Core\App;
use Core\Database;
use Core\Validator;


$current_user_id = 3;

$db = App::resolve(Database::class);


$note = $db->query(
    'select * from notes where id = :id',
    [':id' => $_POST['id'],]
)->findOrFail();

authorize($note['user_id'] === $current_user_id);

$errors = [];

if (!Validator::String($_POST['body'], 10, 1000)) {
    $errors['body'] = "The Body can not be less than 10 characters and more than 1,000 characters";
}

if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note,
    ]);
}

$db->query('update notes set body = :body where id = :id', [
    ':id' => $_POST['id'],
    ':body' => $_POST['body'],
]);

header('location: /notes');
die();