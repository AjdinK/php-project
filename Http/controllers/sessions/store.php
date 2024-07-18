<?php

use Core\Session;
use Core\Authenticator;
use Http\Forms\LoginForm;

$errors = [];


$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

if ((new Authenticator)->attempt($attributes['email'], $attributes['password'])) {
    redirect('/');
}

$form->error('email', 'No Matching account found for that email address and password');

Session::flash('errors', $form->errors());
Session::flash('old', [
    'email' => $_POST['email']
]);
redirect('/login');
