<?php

    use Core\Validator;
    use Core\Database;
    use Core\App;

    $message = [];
    if (!Validator::string($_POST['content'], 1, 1000) || !Validator::string($_POST['title'], 1, 100))
    {
        $message['error'] = 'The content less than 1000 characters is required';
    }
    else
    {
        $message['success'] = 'Note Created Successfully';
    }

    if (key_exists('error', $message))
    {
        view('note/create.view.php', [
            'message' => $message
        ]);
        return;
    }

    $db = App::resolve(Database::class);
    #dumpAndDie($_SESSION);
    $query = "insert into note(name, user_id, content, created_at) values(:title, :user_id, :content, :created_at)";
    $db->query($query, [
        'title' => $_POST['title'],
        'user_id' => $_SESSION['user']['id'],
        'content' => $_POST['content'],
        'created_at' => date('Y-m-d H:i:s')
    ]);

    view('note/create.view.php', [
        'message' => $message
    ]);

