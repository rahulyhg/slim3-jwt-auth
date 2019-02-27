<?php

use App\Controllers\AppController;
use App\Middleware\AuthMiddleware;

$app->group('/auth', function () {
    $this->get('', AppController::class.':privateAction');
})->add(new AuthMiddleware($container));
