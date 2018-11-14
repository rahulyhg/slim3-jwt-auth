<?php

namespace App\Middleware;

use Anddye\Auth\JwtAuth;
use Exception;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Class AuthMiddleware.
 */
class AuthMiddleware
{
    /**
     * @var JwtAuth
     */
    private $jwtAuth;

    /**
     * AuthMiddleware constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->jwtAuth = $container->get('jwtAuth');
    }

    /**
     * @param Request  $request
     * @param Response $response
     * @param callable $next
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, callable $next): Response
    {
        if (!($header = $request->getHeader('Authorization'))) {
            return $response->withJson(['error' => 'No token provided!'], 401);
        }

        try {
            list($header) = $header;
            $this->jwtAuth->authenticate($header);
        } catch (Exception $ex) {
            return $response->withJson(['error' => $ex->getMessage()], 401);
        }

        return $next($request, $response);
    }
}
