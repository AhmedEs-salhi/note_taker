<?php

    use Core\Session;
    use Core\Authenticator;
    use Http\Forms\LoginForm;

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ((new LoginForm)->validate($email, $password))
    {
        if ((new Authenticator)->attempt($email, $password))
        {
            redirect('/notes');
        }
        Session::flash('errors', 'No matching account for those credentials.');
        Session::flash('old', [
           'email' => $email
        ]);
    }

    redirect('/login');