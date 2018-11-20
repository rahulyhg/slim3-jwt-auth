<?php

namespace App\Middleware;

use App\Interfaces\ContainerAwareInterface;
use App\Interfaces\MiddlewareInterface;
use App\Traits\ContainerAwareTrait;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Class AbstractMiddleware.
 */
abstract class AbstractMiddleware implements ContainerAwareInterface, MiddlewareInterface
{
    use ContainerAwareTrait;

    /**
     * AbstractMiddleware constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->setContainer($container);
    }

    /**
     * Invokable class that executes the handle method to manipulate the
     * Request and Response objects.
     *
     * @param Request  $request
     * @param Response $response
     * @param callable $next
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, callable $next): Response
    {
        return $this->handle($request, $response, $next);
    }
}
