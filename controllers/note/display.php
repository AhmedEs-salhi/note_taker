<?php

    use Core\Database;
    use Core\Response;
    use Core\App;

    $db = App::resolve(Database::class);
    #dumpAndDie($_SESSION);
    $notes = $db->query('select * from note where user_id = :user_id', [
        'user_id' => $_SESSION['user']['id']
    ])->fetchOrFail(true);

    view('partials/header.php');
    view('note/display.view.php', [
        'notes' => $notes
    ]);
