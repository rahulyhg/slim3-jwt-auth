<?php

use App\Controllers\AppController;
use App\Controllers\AuthController;
use App\Middleware\AdminMiddleware;
use App\Middleware\AuthMiddleware;

$container = $app->getContainer();

$app->get('/', AppController::class.':publicAction');
$app->post('/login', AuthController::class.':loginAction');
$app->post('/register', AuthController::class.':registerAction');

$app->group('/auth', function () use ($container) {
    $this->get('', AppController::class.':privateAction');

    $this->group('/admin', function () {
        $this->get('', AppController::class.':adminAction');
    })->add(new AdminMiddleware($container));
})->add(new AuthMiddleware($container));
