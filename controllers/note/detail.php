<?php

    use Core\App;
    use Core\Database;
    use Core\Response;

    $db = App::resolve(Database::class);
    $currentUser = $_SESSION['user']['id'];

    $note = $db->query('select * from note where id = :id', [
        'id' => $_GET['id']
    ])->fetchOrfail();

    authorize($note['user_id'] === $currentUser, Response::FORBIDDEN);

    view('partials/header.php');
    view('note/detail.view.php', [
        'note' => $note,
    ]);

