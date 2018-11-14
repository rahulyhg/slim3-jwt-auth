<?php

namespace App\Middleware;

use App\Services\AuthService;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Class AuthMiddleware.
 */
class AuthMiddleware
{
    /**
     * @var AuthService
     */
    private $authService;

    /**
     * AuthMiddleware constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->authService = $container->get('authService');
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
        if (!$header = $this->getAuthorizationHeader($request)) {
            return $response->withStatus(401);
        }
        try {
            $this->authService->authenticate($header);
        } catch (Exception $e) {
            return $response->withJson(['message' => $e->getMessage()], 401);
        }

        return $next($request, $response);
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    protected function getAuthorizationHeader(Request $request)
    {
        if (!list($header) = $request->getHeader('Authorization', false)) {
            return false;
        }

        return $header;
    }
}
