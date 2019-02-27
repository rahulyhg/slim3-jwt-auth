<?php

$container = $app->getContainer();

foreach (glob(__DIR__.'/routes/*.php') as $route) {
    require_once $route;
}
