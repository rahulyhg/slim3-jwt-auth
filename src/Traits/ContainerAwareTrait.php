<?php

namespace App\Traits;

use Anddye\Auth\JwtAuth;
use Anddye\Interfaces\JwtSubjectInterface;
use App\Services\HashService;
use Psr\Container\ContainerInterface;

/**
 * Trait ContainerAwareTrait.
 */
trait ContainerAwareTrait
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Explicitly fetches the jwt auth instance from the container.
     *
     * @return JwtAuth
     */
    public function getAuth(): JwtAuth
    {
        return $this->container->get('jwtAuth');
    }

    /**
     * Get the application dependency container instance.
     *
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    /**
     * Explicitly fetches the hash service from the container.
     *
     * @return HashService
     */
    public function getHash(): HashService
    {
        return $this->container->get('hashService');
    }

    /**
     * @return JwtSubjectInterface|null
     */
    public function getUser(): ?JwtSubjectInterface
    {
        return $this->getAuth()->user();
    }

    /**
     * Set the application dependency container instance.
     *
     * @param ContainerInterface $container
     *
     * @return ContainerAwareTrait
     */
    public function setContainer(ContainerInterface $container): self
    {
        $this->container = $container;

        return $this;
    }
}
