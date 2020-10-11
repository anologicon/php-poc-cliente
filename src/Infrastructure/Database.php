<?php

namespace PoC\Infrastructure;

use PoC\Infrastructure\Database\Connection;
use PDO;

class Database
{

    /**
     * Database instance
     *
     * @var PDO
     */
    private $db;

    public function __construct() {
        $this->newDb();
    }

    public function getDb(): PDO
    {
        if (!$this->db) {
            $this->newDb();
        }

        return $this->db;
    }

    private function newDb()
    {   
        try {
            $coonection =  new Connection();
        } catch (\Throwable $th) {
            throw $th;
        }

        $this->db = $coonection->getConnection();
    }
}
