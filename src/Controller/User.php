<?php

namespace PoC\Controller;

use League\Plates\Engine;
use PoC\Domain\Service\User as UserService;

class User
{
    private $service;

    public function __construct() {
        $this->service = new UserService();
    }

    public function list()
    {
        // Create new Plates instance
        $templates = new Engine('src/View', 'phtml');

        $allUsers = $this->service->fetchAllUsers();

        // Render a template
        echo $templates->render('user/index', ['usersList' => $allUsers]);
    }
}
