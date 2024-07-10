<?php

class Database
{
    protected $connection;
    protected $statement;


    public function __construct(
        $config,
        $username = 'root',
        $password = '123'
    ) {

        $dns = "mysql:".http_build_query($config, '', ';');

        $this->connection = new PDO($dns, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) {
            abort(Response::NOT_FOUND);
        }

        return $result;
    }

    public function find()
    {
        return $this->statement->fetch();
    }
}
