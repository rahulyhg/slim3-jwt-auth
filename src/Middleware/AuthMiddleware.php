<?php

namespace App\Middleware;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Class AuthMiddleware.
 */
class AuthMiddleware extends AbstractMiddleware
{
    /**
     * Manipulates the Request and Response objects. You MUST return an instance of
     * \Psr\Http\Message\ResponseInterface and should invoke the next middleware,
     * passing it Request and Response objects as arguments.
     *
     * @param Request  $request
     * @param Response $response
     * @param callable $next
     *
     * @return Response
     */
    public function handle(Request $request, Response $response, callable $next): Response
    {
        if (!($header = $request->getHeader('Authorization'))) {
            return $response->withJson(['error' => 'No token provided!'], 401);
        }

        try {
            list($header) = $header;
            $this->jwtAuth()->authenticate($header);
        } catch (Exception $ex) {
            return $response->withJson(['error' => $ex->getMessage()], 401);
        }

        return $next($request, $response);
    }
}
