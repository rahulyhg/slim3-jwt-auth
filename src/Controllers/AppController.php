<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Class AppController.
 */
class AppController extends AbstractController
{
    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return Response
     */
    public function adminAction(Request $request, Response $response): Response
    {
        return $response->withJson([
            'actionName' => 'adminAction',
            'actionDescription' => 'Only an authenticated user with admin or superadmin roles can access this action!',
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
            'actionName' => 'privateAction',
            'actionDescription' => 'Only authenticated users can access this action!',
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
    public function publicAction(Request $request, Response $response): Response
    {
        return $response->withJson([
            'actionName' => 'publicAction',
            'actionDescription' => 'Both authenticated and unauthenticated users can access this action!',
            'controllerName' => 'AppController',
            'controllerLocation' => __DIR__.'/AppController.php',
        ]);
    }
}
