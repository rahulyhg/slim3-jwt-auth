<?php

namespace App\Controllers;

use Anddye\Auth\JwtAuth;
use App\Models\User;
use App\Services\HashService;
use Exception;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Class AuthController.
 */
class AuthController
{
    /**
     * @var HashService
     */
    private $hashService;

    /**
     * @var JwtAuth
     */
    private $jwtAuth;

    /**
     * AuthController constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->hashService = $container->get('hashService');
        $this->jwtAuth = $container->get('jwtAuth');
    }

    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return Response
     */
    public function loginAction(Request $request, Response $response): Response
    {
        try {
            $username = $request->getParam('username', '');
            $password = $request->getParam('password', '');

            $token = $this->jwtAuth->attempt($username, $password);

            return $response->withJson(['token' => $token]);
        } catch (Exception $ex) {
            return $response->withJson(['error' => $ex->getMessage()], 401);
        }
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
