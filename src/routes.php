<?php

use Pecee\SimpleRouter\SimpleRouter;

use PoC\Controller;

$mainController = new Controller\User();

SimpleRouter::get('/user/{id?}', function ($userId) use ($mainController) {
    $mainController->handler($userId);
});

SimpleRouter::post('/user', function () use ($mainController) {
   $mainController->save($_POST);
});

SimpleRouter::get('/user/delete/{id}', function ($userId) use ($mainController) {
    $mainController->delete($userId);
});


SimpleRouter::get('/', function () use ($mainController) {
    $mainController->list();
});