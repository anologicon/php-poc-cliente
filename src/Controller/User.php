<?php

namespace PoC\Controller;

use League\Plates\Engine;

class User
{
    public function list()
    {
        // Create new Plates instance
        $templates = new Engine('src/View/Templates', 'phtml');

        // Render a template
        echo $templates->render('profile', ['name' => 'Jonathan']);
    }
}
