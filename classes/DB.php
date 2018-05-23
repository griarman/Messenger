<?php

class DB
{
    private $connection;

    public function __construct($host = 'localhost', $username = 'root', $password = '', $dbName = 'chat')
    {
        $this->connection = new mysqli($host, $username, $password, $dbName);

        if ($this->connection->connect_errno) {
            die('Connect Error: ' . $this->connection->connect_error);
        }
    }

    public function query($query)
    {
        $query = trim($query);

        $result = $this->connection->query($query);

        if($this->connection->errno)
        {
            die('Query error: ' . $this->connection->error);
        }

        return stripos($query, 'SELECT') !== FALSE ? $result->fetch_all(MYSQLI_ASSOC) : $result;
    }

    public function insertId()
    {
        return $this->connection->insert_id;
    }

    public function __destruct()
    {
        $this->connection->close();
    }
}