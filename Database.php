<?php

class Database
{
    public $connection;


    public function __construct($config)
    {

        $dns = "mysql:".http_build_query($config, '', ';');

        $this->connection = new PDO($dns, 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement;
    }
}