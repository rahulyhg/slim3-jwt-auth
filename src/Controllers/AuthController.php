<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\AuthService;
use App\Services\HashService;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Class AuthController.
 */
class AuthController
{
    /**
     * @var AuthService
     */
    private $authService;

    /**
     * @var HashService
     */
    private $hashService;

    /**
     * AuthController constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->authService = $container->get('authService');
        $this->hashService = $container->get('hashService');
    }

    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return Response
     */
    public function loginAction(Request $request, Response $response): Response
    {
        $username = $request->getParam('username', '');
        $password = $request->getParam('password', '');

        if (!$token = $this->authService->attempt($username, $password)) {
            return $response->withJson(['error' => 'Authentication failed!'], 401);
        }

        return $response->withJson(['token' => $token]);
    }

    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return Response
     */
    public function registerAction(Request $request, Response $response): Response
    {
        $username = $request->getParam('username');

        if (User::where('username', $username)->first()) {
            return $response->withJson(['error' => 'Username already in use!'], 400);
        }

        $salt = $this->hashService->generate();
        $password = $this->hashService->hash($request->getParam('password').$salt);

        $user = new User();
        $user->password = $password;
        $user->salt = $salt;
        $user->username = $username;
        $user->save();

        return $response->withJson(['success' => 'User successfully created!'], 201);
    }
}
