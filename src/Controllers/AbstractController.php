<?php

namespace App\Controllers;

use App\Interfaces\ContainerAwareInterface;
use App\Traits\ContainerAwareTrait;
use Psr\Container\ContainerInterface;

/**
 * Class AbstractController.
 */
abstract class AbstractController implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * AbstractController constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->setContainer($container);
    }
}
