<?php

namespace App\Interfaces;

use Psr\Container\ContainerInterface;

/**
 * Interface ContainerAwareInterface.
 */
interface ContainerAwareInterface
{
    /**
     * Set the application dependency container instance.
     *
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container);
}
