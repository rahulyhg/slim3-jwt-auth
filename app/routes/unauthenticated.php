<?php

use App\Controllers\AppController;
use App\Controllers\AuthController;

$app->get('/', AppController::class.':publicAction');
$app->post('/login', AuthController::class.':loginAction');
$app->post('/register', AuthController::class.':registerAction');
