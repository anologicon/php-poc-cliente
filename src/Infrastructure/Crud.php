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

    public function save($userModel)
    {
        $query = $this->newDb();

        try {
            $stmt = $query->prepare(
                'INSERT INTO ' . $this->table . ' (nome, telefone, cpf, email)  VALUES (?,?,?,?)'
            );

            $stmt->execute([
                $userModel->getName(),
                $userModel->getPhone(),
                $userModel->getCpf(),
                $userModel->getEmail(),
            ]);

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
