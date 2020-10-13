<?php

namespace PoC\Controller;

use League\Plates\Engine;
use PoC\Model\User as ModelUser;
use PoC\Domain\Service\Log as LogService;
use PoC\Domain\Service\User as UserService;

class User
{
    private $userService;

    private $logService;

    private $templateEngine;

    public function __construct() {
        $this->userService = new UserService();
        $this->logService = new LogService();

        $this->templateEngine = new Engine('src/View', 'phtml');

    }

    public function list()
    {
        $allUsers = $this->userService->fetchAllUsers();

        echo $this->templateEngine->render('user/index', ['usersList' => $allUsers]);
    }

    public function handler(?int $id = null)
    {   

        $user = new ModelUser;

        if ($id) {
            $user = $this->userService->find($id);
        }

        echo $this->templateEngine->render('user/handler', ['userModel' => $user]);
    }

    public function save(array $post)
    {
        $newUser = $this->userService->newUser($post);

        if (!$newUser->getId()) {
            $this->userService->saveNewUser($newUser);
            $this->logService->saveAction("Um novo usuário cadastrado cpf:".$newUser->getCpf());
        } else {
            $this->userService->updateUser($newUser);
            $this->logService->saveAction("Usuário de id ". $newUser->getId() ." foi atualizado");

        }

        header("Location: http://localhost");
    }

    public function delete(int $id)
    {
        $this->userService->removeUser($id);
        $this->logService->saveAction("Usuário de id " . $id . " foi removido");


        header("Location: http://localhost");
    }
}
