<?php

namespace Poc\Infrastructure;

use PoC\Infrastructure\Database;
use PoC\Infrastructure\Database\AbstractSqlHelpers;

class Crud extends AbstractSqlHelpers
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

    public function update($userModel)
    {
        $query = $this->newDb();

        try {
            $stmt = $query->prepare(
                'UPDATE ' . $this->table . ' SET nome=?, telefone=?, cpf=?, email=? WHERE id = ?'
            );

            $stmt->execute([
                $userModel->getName(),
                $userModel->getPhone(),
                $userModel->getCpf(),
                $userModel->getEmail(),
                $userModel->getId(),
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function remove(int $id)
    {
        $query = $this->newDb();

        try {
            $stmt = $query->prepare(
                'DELETE FROM ' . $this->table . ' WHERE id = ?'
            );

            $stmt->execute([
                $id,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function save(array $insert)
    {
        $query = $this->newDb();

        $queryInsert = $this->createInsertQuery(
            array_keys($insert), $this->table
        );
        
        try {
            $stmt = $query->prepare(
                $queryInsert
            );
            
            $stmt->execute(array_values($insert));
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function findById(int $id)
    {
        $query = $this->newDb();

        try {
            $stmt = $query->prepare(
                'SELECT * FROM ' . $this->table . ' WHERE id = :id'
            );

            $stmt->execute(array('id' => $id));

            $data = $stmt->fetch();
            
            return $data;

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
