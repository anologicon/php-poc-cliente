<?php

namespace Poc\Infrastructure;

use PoC\Infrastructure\Database;

class Crud
{   
    /**
     * Table name to use on crud operations
     *
     * @var string
     */
    public $table;

    private function newDb()
    {
        $db = new Database();

        return $db->getDb();
    }

    public function read()
    {
        $query = $this->newDb();

        try {
            $stmt = $query->prepare(
                'SELECT * FROM '. $this->table
            );

            $stmt->execute();

            $data = $stmt->fetchAll();

            return $data;
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function find(int $id)
    {
        $query = $this->newDb();

        try {
            $stmt = $query->prepare(
                'SELECT * FROM ' . $this->table . 'WHERE id = :id'
            );

            $stmt->execute(array('id' => $id));

            $data = $stmt->fetch()[0];

            return $data;

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
