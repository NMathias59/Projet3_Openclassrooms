<?php


namespace Core\Router;


abstract class AbstractRoutes
{
    /**
     * @return Route[] Liste des routes
     */
    abstract public function getRoutes(): array;
}