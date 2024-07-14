<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];
$db = App::resolve(Database::class);

if (!Validator::Email($email)) {
    $errors['email'] = 'Invalid email, Please enter a valid email address';
}

if (!Validator::String($password, 7, 255)) {
    $errors['password'] = 'Password must be between 7 and 255 characters';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}


$user = $db->query("SELECT * FROM users WHERE email = :email", [
    ':email' => $email,
])->find();


if ($user) {
    $_SESSION['user'] = [
        'email' => $email,
    ];
    header("location: /");
    die();
} else {
    $db->query("INSERT INTO users (email,password) VALUES (:email,:password)", [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);
}


//mark the user as logged in
login($user);


header('location: /');
die();