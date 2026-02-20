<?php

    use Core\App;
    use Core\Database;
    use Core\Validator;

    $db = App::resolve(Database::class);

    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];
    if (!Validator::email($email)) {
        $errors['email'] = 'Please provide a valid email address.';
    }

    if (!Validator::string($password)) {
        $errors['password'] = 'Please provide a valid password.';
    }

    if (! empty($errors)) {
        view('login.view.php', [
            'errors' => $errors
        ]);
        return;
    }

    $user = $db->query('select * from user where email = :email', [
        'email' => $email
    ])->find();

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $user_id = $db->query('select id from user where email = :email', [
                'email' => $email
            ])->find();

            login([
                'id' => $user_id['id'],
                'email' => $user['email'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name']
            ]);

            header('location: /notes');
            exit();
        }
    }
    #dumpAndDie($_SESSION);
    view('login.view.php', [
        'errors' => [
            'email' => 'No matching account found for that email address and password.'
        ]
    ]);