<?php

use Anddye\Auth\JwtAuth;
use Anddye\Providers\FirebaseProvider;
use App\Services\AuthService;
use App\Services\HashService;
use Illuminate\Database\Capsule\Manager as Capsule;

$container = $app->getContainer();

// Database
// ==============================================================================
$container['db'] = function ($container) {
    $capsule = new Capsule();
    $capsule->addConnection($container->settings['db']);
    $capsule->setAsGlobal();

    return $capsule;
};

$container->get('db')->bootEloquent();

// Hash Service
// ==============================================================================
$container['hashService'] = function () {
    return new HashService();
};

// JWT Auth
// ==============================================================================
$container['jwtAuth'] = function ($container) {
    $jwt = $container->settings['jwt'];

    $authService = new AuthService($container);
    $firebaseProvider = new FirebaseProvider($jwt['config']);

    return new JwtAuth($authService, $firebaseProvider, $jwt['claims']);
};
