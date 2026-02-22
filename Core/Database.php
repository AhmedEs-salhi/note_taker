<?php

    namespace Core;

    use PDO, PDOStatement, PDOException;
    use Core\Response;
    class Database
    {
        public PDO $connection;
        public PDOStatement $statement;
        public function __construct($username, $password, $config)
        {
            $dsn = 'mysql:' . http_build_query($config['database'], '', ';');

            $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }
        public function query($sql, $param = []) :Database
        {
            $this->statement = $this->connection->prepare($sql);
            $this->statement->execute($param);

            return $this;
        }

        public function get()
        {
            return $this->statement->fetchAll();
        }

        public function find()
        {
            return $this->statement->fetch();
        }

        public function fetchOrFail($isAll=false) :array
        {
            if ($isAll)
                $result = $this->get();
            else
                $result = $this->find();

            if (!$result)
                !$result = [];
                #abort(Response::FORBIDDEN);

            return $result;
        }
    }