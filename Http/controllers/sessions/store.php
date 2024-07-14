<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

$db = App::resolve(Database::class);

$form = new LoginForm();
if (!$form->validate($email, $password)) {
    return view('sessions/create.view.php', [
        'errors' => $form->errors(),
    ]);
}

$user = $db->query("select * from users where email = :email", [
    'email' => $email,
])->find();


if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email,
        ]);
        header("location: /");
        exit();
    }
}


return view('sessions/create.view.php', [
    'errors' => [
        'email' => 'Invalid email or password',
        'password' => 'Invalid email or password',
    ],
]);
