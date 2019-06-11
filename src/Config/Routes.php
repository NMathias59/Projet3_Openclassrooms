<?php


namespace App\Config;


use  Core\Router\AbstractRoutes;
use  Core\Router\Route;

class Routes extends AbstractRoutes
{
    public function getRoutes(): array
    {
        // TODO: Implement getRoutes() method.
        return[
          new Route('homepage', 'default', 'homepage'),
        ];
    }

}