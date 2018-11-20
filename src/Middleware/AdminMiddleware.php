<?php

namespace App\Middleware;

use App\Models\Permission;
use App\Models\Role;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\NotFoundException;

/**
 * Class AdminMiddleware.
 */
class AdminMiddleware extends AbstractMiddleware
{
    /**
     * Check to ensure the admin has either admin or super admin role or can view admin pages. Throw a not found
     * exception if these checks fail.
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
        if (
            $this->getUser()->isGranted(Role::ADMIN) or
            $this->getUser()->isGranted(Role::SUPERADMIN) or
            $this->getUser()->isPermitted(Permission::VIEW_ADMIN_PAGES)
        ) {
            $response = $next($request, $response);

            return $response;
        }

        throw new NotFoundException($request, $response);
    }
}
