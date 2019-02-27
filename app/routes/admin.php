<?php

use App\Controllers\AppController;
use App\Middleware\AdminMiddleware;
use App\Middleware\AuthMiddleware;

$app->group('/auth/admin', function () {
    $this->get('', AppController::class.':adminAction');
})->add(new AuthMiddleware($container))->add(new AdminMiddleware($container));
