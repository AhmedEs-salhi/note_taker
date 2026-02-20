<?php
    use Core\App;
    use Core\Database;

    $db = App::resolve(Database::class);

    $currentUser = $_SESSION['user']['id'];

    $note = $db->query('select * from note where id = :id', [
        'id' => $_GET['id']
    ])->fetchOrFail();

    #dumpAndDie($note);

    authorize($note['user_id'] === $currentUser);

    view('note/edit.view.php', [
        'message' => [],
        'note' => $note
    ]);