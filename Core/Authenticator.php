<?php

namespace Core;
use Core\App;
use Core\Database;
class Authenticator
{
    public function attempt($email, $password) :bool
    {
        $user = App::resolve(Database::class)->query('select * from user where email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $user_id = App::resolve(Database::class)->query('select id from user where email = :email', [
                    'email' => $email
                ])->find();

                $this->login([
                    'id' => $user_id['id'],
                    'email' => $user['email'],
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name']
                ]);


                return true;
            }
        }
        return false;
    }

    public function login($user) :void
    {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name']
        ];

        session_regenerate_id(true);
    }

    public function logout() :void
    {
        Session::destroy();
    }
}