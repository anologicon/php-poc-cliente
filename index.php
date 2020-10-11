<?php

require __DIR__ . '/vendor/autoload.php';

use Pecee\SimpleRouter\SimpleRouter;

require_once 'src/routes.php';

SimpleRouter::start();
