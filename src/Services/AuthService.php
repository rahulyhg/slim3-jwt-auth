<?php

namespace App\Services;

use Anddye\Interfaces\AuthServiceInterface;
use Anddye\Interfaces\JwtSubjectInterface;
use App\Models\User;
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
     * @param string $username
     * @param string $password
     *
     * @return JwtSubjectInterface|null
     */
    public function byCredentials(string $username, string $password): ?JwtSubjectInterface
    {
        if (!$user = User::where('username', $username)->first()) {
            return null;
        }

        if (!$this->hashService->verify($password.$user->salt, $user->password)) {
            return null;
        }

        return $user;
    }

    /**
     * @param int $id
     *
     * @return JwtSubjectInterface|null
     */
    public function byId(int $id): ?JwtSubjectInterface
    {
        return User::find($id);
    }
}
