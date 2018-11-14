<?php

use App\Controllers\AppController;
use App\Controllers\AuthController;
use App\Middleware\AuthMiddleware;

$container = $app->getContainer();

$app->get('/', AppController::class.':publicAction');
$app->post('/login', AuthController::class.':loginAction');
$app->post('/register', AuthController::class.':registerAction');

$app->group('/auth', function () {
    $this->get('', AppController::class.':privateAction');
})->add(new AuthMiddleware($container));
