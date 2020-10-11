<?php

namespace Poc\Infrastructure\Database;

use PDO;

class Connection
{   

    /**
     * PDO instance
     */
    public $connection;

    private $username = 'pocuser';

    private $password = 'pocuser';

    public function __construct()
    {
        $this->newInstance();
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }

    private function newInstance()
    {
        $this->connection = $this->connect();
    }

    private function connect(): PDO
    {
        $connection = new PDO('mysql:host=db:3306;dbname=pocuser', $this->username, $this->password);

        return $connection;
    }
}
