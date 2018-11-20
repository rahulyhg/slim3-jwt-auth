<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\NotFoundException;

/**
 * Class AdminMiddleware.
 */
class AdminMiddleware extends AbstractMiddleware
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
     *
     * @throws NotFoundException
     */
    public function handle(Request $request, Response $response, callable $next): Response
    {
        if ($this->getUser()->isGranted('admin') or $this->getUser()->isGranted('superadmin') or $this->getUser()->isPermitted('view admin pages')) {
            $response = $next($request, $response);

            return $response;
        }

        throw new NotFoundException($request, $response);
    }
}
