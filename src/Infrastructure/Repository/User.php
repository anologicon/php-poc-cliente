<?php

namespace PoC\Infrastructure\Repository;

use PoC\Infrastructure\Crud;
use PoC\Domain\Entity\User as UserEntity;
use PoC\Model\User as ModelUser;

class User extends Crud
{
    public function __construct() {
        $userEntity = new UserEntity();
        
        $this->table = $userEntity->getTable();
    }

    public function fetchAll()
    {
        return $this->read();
    }

    public function find(int $id)
    {
        return $this->findById($id);
    }

    public function removeUser(int $id)
    {
        $this->remove($id);
    }

    public function saveNewUser(ModelUser $userModel)
    {
        return $this->save([
            'nome' => $userModel->getName(),
            'email' => $userModel->getEmail(),
            'telefone' => $userModel->getPhone(),
            'cpf' => $userModel->getCpf()
        ]);
    }

    public function updateUser(ModelUser $userModel)
    {
        return $this->update($userModel);
    }
}
