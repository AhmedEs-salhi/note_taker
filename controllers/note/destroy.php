<?php

    use Core\App;
    use Core\Database;
    use Core\Response;

    $db = App::resolve(Database::class);

    $currentUser = $_SESSION['user']['id'];

    $note = $db->query('select * from note where id = :id', [
        'id' => $_POST['id']
    ])->fetchOrfail();
    #dumpAndDie($_POST);
    authorize($note['user_id'] === $currentUser, Response::FORBIDDEN);

    $note = $db->query('delete from note where id = :id', [
        'id' => $_POST['id']
    ]);

    header('location: /notes');
    exit();