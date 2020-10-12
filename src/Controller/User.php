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

    public function newUser(array $post)
    {
        $newUser = $this->service->newUser($post);

        $this->service->saveNewUser($newUser);

        echo $this->templateEngine->render('user/handler', ['userModel' => $newUser]);
    }
}
