<?php


namespace App\Config;


use  Core\Router\AbstractRoutes;
use  Core\Router\Route;

class Routes extends AbstractRoutes
{
    /**
     * @return Route[] Liste des routes
     */
    public function getRoutes(): array
    {

        return[
          new Route('homepage', 'Default', 'homepage'),

        ];
    }

}