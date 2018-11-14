<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Class AppController.
 */
class AppController
{
    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return Response
     */
    public function publicAction(Request $request, Response $response): Response
    {
        return $response->withJson([
            'controllerName' => 'AppController',
            'controllerLocation' => __DIR__.'/AppController.php',
        ]);
    }

    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return Response
     */
    public function privateAction(Request $request, Response $response): Response
    {
        return $response->withJson([
            'controllerName' => 'AppController',
            'controllerLocation' => __DIR__.'/AppController.php',
        ]);
    }
}
