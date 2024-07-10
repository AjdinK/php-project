<?php
require base_path("Core/Validator.php");

$heading = "Create Note";

$config = require base_path("config.php");
$db = new Database($config['database']);
$errors = [];


function redirectToNotes()
{
    session_start();
    $_SESSION['message'] = 'Note created successfully';
    header('Location: /notes');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!Validator::String($_POST['body'], 10, 1000)) {
        $errors['body'] = "The Body can not be less than 10 characters and more than 1,000 characters";
    }

    if (empty($errors)) {
        $db->query("insert into notes (body,user_id) values (:body, :user_id)", [
            ':user_id' => 3,
            ':body' => $_POST['body'],
        ]);

        redirectToNotes();
    }
}


view("notes/create.view.php", [
    'heading' => $heading,
    'errors' => $errors,
]);
