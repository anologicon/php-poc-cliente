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

    public function newUser(array $post)
    {
        return $this->newModelUser($post);
    }

    public function removeUser(int $id)
    {   
        $this->repository->removeUser($id);
    }

    public function saveNewUser(UserModel $userModel)
    {
        return $this->repository->saveNewUser($userModel);
    }

    public function updateUser(UserModel $userModel)
    {
        return $this->repository->updateUser($userModel);
    }

    public function find(int $id)
    {
        $userRaw =  $this->repository->find($id);
        
        return $this->newModelUser($userRaw);
    }

    public function fetchAllUsers(): array
    {
        $allUsersRaw =  $this->repository->fetchAll();

        $usersModel = [];
        
        foreach ($allUsersRaw as $userRaw) {

            $usersModel[] = $this->newModelUser($userRaw);
        }

        return $usersModel;
    }

    private function newModelUser(array $userData): UserModel
    {
        $newModelUser = new UserModel();

        $newModelUser->setName($userData['nome']);
        $newModelUser->setEmail($userData['email']);
        $newModelUser->setPhone($userData['telefone']);
        $newModelUser->setCpf((int) $userData['cpf']);
        $newModelUser->setId((int) $userData['id']);

        return $newModelUser;
    }
}
