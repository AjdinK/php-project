<?php

namespace Core;

class Authenticator
{
    public static function logout()
    {
        Session::destroy();
    }

    public function attempt($email, $password)
    {
        $user = APP::resolve(Database::class)->query("select * from users where email = :email", [
            'email' => $email,
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email,
                ]);
                return true;
            }
        }
        return false;
    }

    public static function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

        session_regenerate_id(true);
    }
}
