<?php

namespace PoC\Controller;

use League\Plates\Engine;
use PoC\Domain\Service\User as UserService;
use PoC\Model\User as ModelUser;

class User
{
    private $service;

    private $templateEngine;

    public function __construct() {
        $this->service = new UserService();

        $this->templateEngine = new Engine('src/View', 'phtml');

    }

    public function list()
    {
        $allUsers = $this->service->fetchAllUsers();

        echo $this->templateEngine->render('user/index', ['usersList' => $allUsers]);
    }

    public function handler(?int $id = null)
    {   

        $user = new ModelUser;

        if ($id) {
            $user = $this->service->find($id);
        }

        echo $this->templateEngine->render('user/handler', ['userModel' => $user]);
    }

    public function save(array $post)
    {
        $newUser = $this->service->newUser($post);

        if (!$newUser->getId()) {
            $this->service->saveNewUser($newUser);
        } else {
            $this->service->updateUser($newUser);
        }

        header("Location: http://localhost/user/".$newUser->getId());
    }
}
