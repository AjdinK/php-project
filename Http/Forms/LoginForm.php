<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function validate($email, $password)
    {

        if (!Validator::Email($email)) {
            $this->errors['email'] = 'Invalid email, Please enter a valid email address';
        }

        if (!Validator::String($password)) {
            $this->errors['password'] = 'Please provide a valid password';
        }

        return empty($errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}
