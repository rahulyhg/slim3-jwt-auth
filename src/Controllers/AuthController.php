<?php

namespace App\Controllers;

use App\Models\User;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Class AuthController.
 */
class AuthController extends AbstractController
{
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

            $token = $this->getAuth()->attempt($username, $password);

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
        $password = $request->getParam('password');

        if (User::where('username', $username)->first()) {
            return $response->withJson(['error' => 'Username already in use!'], 400);
        }

        $salt = $this->getHash()->generate();
        $hashedPassword = $this->getHash()->hash($password.$salt);

        $user = new User();
        $user->password = $hashedPassword;
        $user->salt = $salt;
        $user->username = $username;
        $user->save();

        return $response->withJson(['success' => 'User successfully created!'], 201);
    }
}
