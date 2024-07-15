<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];


$form = new LoginForm();
if (!$form->validate($email, $password)) {
    return view('sessions/create.view.php', [
        'errors' => $form->errors(),
    ]);
}

$auth = new Authenticator;

if ($auth->attempt($email, $password)) {
    redirect('/');
}

return view('sessions/create.view.php', [
    'errors' => [
        'email' => 'Invalid email or password',
        'password' => 'Invalid email or password',
    ],
]);
