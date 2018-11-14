<?php

use Anddye\Auth\ClaimsFactory;
use Anddye\Auth\Factory;
use Anddye\Auth\JwtAuth;
use Anddye\Auth\Parser;
use Anddye\Services\FirebaseService;
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
    $claimsFactory = new ClaimsFactory($jwt['claims']);
    $jwtService = new FirebaseService($jwt['config']);
    $factory = new Factory($claimsFactory, $jwtService);
    $parser = new Parser($jwtService);

    return new JwtAuth($authService, $factory, $parser);
};