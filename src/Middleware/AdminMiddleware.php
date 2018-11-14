<?php

namespace App\Middleware;

use Anddye\Auth\JwtAuth;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\NotFoundException;

/**
 * Class AdminMiddleware.
 */
class AdminMiddleware
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
     *
     * @throws NotFoundException
     */
    public function __invoke(Request $request, Response $response, callable $next): Response
    {
        $user = $this->jwtAuth->user();
        if ($user->isGranted('admin') or $user->isGranted('superadmin') or $user->isPermitted('view admin pages')) {
            $response = $next($request, $response);

            return $response;
        }

        throw new NotFoundException($request, $response);
    }
}
