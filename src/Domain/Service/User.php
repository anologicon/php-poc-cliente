<?php

namespace PoC\Domain\Service;

use PoC\Infrastructure\Repository\User as UserRepository;
use PoC\Model\UserList;

class User
{   
    private $repository;

    public function __construct() {
        $this->repository = new UserRepository();
    }

    public function fetchAllUsers(): array
    {
        $allUsersRaw =  $this->repository->fetchAll();

        $usersModel = [];
        
        foreach ($allUsersRaw as $userRaw) {

            $newModelUserList = new UserList();

            $newModelUserList->setName($userRaw['nome']);
            $newModelUserList->setEmail($userRaw['email']);
            $newModelUserList->setPhone($userRaw['telefone']);
            $newModelUserList->setCpf((int) $userRaw['cpf']);
            $newModelUserList->setId((int) $userRaw['id']);

            $usersModel[] = $newModelUserList;
        }

        return $usersModel;
    }
}
