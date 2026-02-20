<?php
    use Core\Database;
    use Core\App;

    $db = App::resolve(Database::class);

    $result = $db->query('select * from product')->fetchOrFail(true);

    view('index.view.php', [
        'result' => $result
    ]);