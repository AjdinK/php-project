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

if (!Validator::String($password)) {
    $errors['password'] = 'Please provide a valid password';
}

if (!empty($errors)) {
    return view('sessions/create.view.php', [
        'errors' => $errors,
    ]);
}

$user = $db->query("select * from users where email = :email", [
    'email' => $email,
])->find();


if (!$user) {
    return view('sessions/create.view.php', [
        'errors' => [
            'email' => 'Invalid email or password',
            'password' => 'Invalid email or password',
        ],
    ]);
}

if (password_verify($password, $user['password'])) {
    login([
        'email' => $email,
    ]);
    header("location: /");
    exit();
}

return view('sessions/create.view.php', [
    'errors' => [
        'email' => 'Invalid email or password',
        'password' => 'Invalid email or password',
    ],
]);
