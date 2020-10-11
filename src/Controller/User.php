<?php

namespace PoC\Controller;

use League\Plates\Engine;
use PoC\Domain\Service\User as UserService;

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

    public function edit(int $id)
    {
        $user = $this->service->find($id);

        echo $this->templateEngine->render('user/index', ['userModel' => $user]);
    }
}
