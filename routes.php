<?php

use Pecee\SimpleRouter\SimpleRouter;

use PoC\Controller;

SimpleRouter::get('/', function () {
    $app = new Controller\User();

    $app->list();
});