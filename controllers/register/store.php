<?php

    use Core\App;
    use Core\Database;
    use Core\Validator;
    #dumpAndDie($_POST);
    $db = App::resolve(Database::class);
    $errors = [];

    if (!Validator::string($_POST['password'], 8, 255)) {
        $errors['password'] = 'Password must be more than 8 characters';
    }

    if (!Validator::email($_POST['email'])) {
        $errors['email'] = 'Please enter a valid email';
    }

    $user = $db->query('select * from user where email = :email', [
        'email' => $_POST['email'],
    ])->find();

    if ($user) {
        $errors['email'] = 'This email already exists';
    }

    if (count($errors)) {
        view('/register.view.php', [
            'errors' => $errors
        ]);
        return;
    }

    $db->query('insert into user(email, password, first_name, last_name) values(:email, :password, :first_name, :last_name)', [
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name']
    ]);

    $user = $db->query('select * from user where email = :email', [
        'email' => $_POST['email']
    ])->find();


    $_SESSION['user'] = [
        'id' => $user['id'],
        'email' => $user['email'],
        'first_name' => $user['first_name'],
        'last_name' => $user['last_name']
    ];

    #dumpAndDie($_SESSION);

    header('location: /notes');
    die();
