<?php

use Pecee\SimpleRouter\SimpleRouter;

use PoC\Controller;

$mainController = new Controller\User();

SimpleRouter::get('/user/{id?}', function ($userId) use ($mainController) {
    $mainController->handler($userId);
});

SimpleRouter::post('/user', function () use ($mainController) {
   $mainController->newUser($_POST);
});

SimpleRouter::put('/user', function () use ($mainController) {
});

SimpleRouter::get('/', function () use ($mainController) {
    $mainController->list();
});