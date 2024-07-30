<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$errors = [];


$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
]);


if ((new Authenticator)->attempt($attributes['email'], $attributes['password'])) {
    redirect('/');
}

$form->error('email', 'Invalid email or password');

redirect('/login');
