<?php

namespace App\Services;

use Anddye\Interfaces\AuthServiceInterface;
use Anddye\Interfaces\JwtSubjectInterface;
use App\Models\User;
use Exception;
use Psr\Container\ContainerInterface;

/**
 * Class AuthService.
 */
class AuthService implements AuthServiceInterface
{
    /**
     * @var HashService
     */
    private $hashService;

    /**
     * AuthService constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->hashService = $container->get('hashService');
    }

    /**
     * Find a user with valid username and password.
     *
     * @param string $username
     * @param string $password
     *
     * @return JwtSubjectInterface
     *
     * @throws Exception
     */
    public function byCredentials(string $username, string $password): JwtSubjectInterface
    {
        if (!$user = User::where('username', $username)->first()) {
            throw new Exception('User not found!');
        }

        if (!$this->hashService->verify($password.$user->salt, $user->password)) {
            throw new Exception('Password not valid!');
        }

        return $user;
    }

    /**
     * Find a user by their ID.
     *
     * @param int $id
     *
     * @return JwtSubjectInterface
     *
     * @throws Exception
     */
    public function byId(int $id): JwtSubjectInterface
    {
        if (!$user = User::find($id)) {
            throw new Exception('User not found!');
        }

        return $user;
    }
}
