<?php

use Pecee\SimpleRouter\SimpleRouter;

use PoC\Controller;

$mainController = new Controller\User();

SimpleRouter::get('/user/{id?}', function ($userId) use ($mainController) {
    $mainController->handler($userId);
});

SimpleRouter::post('/user', function ($userId) use ($mainController) {
    
});

SimpleRouter::put('/user', function ($userId) use ($mainController) {
    
});

SimpleRouter::get('/', function () use ($mainController) {
    $mainController->list();
});