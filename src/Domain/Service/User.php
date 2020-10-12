<?php

namespace PoC\Domain\Service;

use PoC\Infrastructure\Repository\User as UserRepository;
use PoC\Model\User as UserModel;

class User
{   
    private $repository;

    public function __construct() {
        $this->repository = new UserRepository();
    }

    public function find(int $id)
    {
        $userRaw =  $this->repository->find($id);

        $newModelUser = new UserModel();

        $newModelUser->setName($userRaw['nome']);
        $newModelUser->setEmail($userRaw['email']);
        $newModelUser->setPhone($userRaw['telefone']);
        $newModelUser->setCpf((int) $userRaw['cpf']);
        $newModelUser->setId((int) $userRaw['id']);

        return $newModelUser;
    }

    public function fetchAllUsers(): array
    {
        $allUsersRaw =  $this->repository->fetchAll();

        $usersModel = [];
        
        foreach ($allUsersRaw as $userRaw) {

            $newModelUser = new UserModel();

            $newModelUser->setName($userRaw['nome']);
            $newModelUser->setEmail($userRaw['email']);
            $newModelUser->setPhone($userRaw['telefone']);
            $newModelUser->setCpf((int) $userRaw['cpf']);
            $newModelUser->setId((int) $userRaw['id']);

            $usersModel[] = $newModelUser;
        }

        return $usersModel;
    }
}
