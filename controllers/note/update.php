<?php
    use Core\App;
    use Core\Database;
    use Core\Validator;

    $db = App::resolve(Database::class);

    $currentUser = $_SESSION['user']['id'];

    $note = $db->query('select * from note where id = :id', [
        'id' => $_REQUEST['id']
    ])->fetchOrFail();

    authorize($note['user_id'] === $currentUser);

    $message = [];

    if (!Validator::string($_POST['content'], 1, 100)) {
        $message['body'] = 'A body of no more than 1,000 characters is required';
    }

    if (count($message)) {
        view('note/edit.view.php', [
            'message' => $message,
            'note' => $note
        ]);
        return;
    }

    $db->query('update note set name = :name, content = :content, created_at = :created_at where id = :id', [
        'name' => $_REQUEST['title'],
        'content' => $_REQUEST['content'],
        'created_at' => date('Y-m-d H:i:s'),
        'id' => $_REQUEST['id']
    ]);

    header('location: /notes');
    die();