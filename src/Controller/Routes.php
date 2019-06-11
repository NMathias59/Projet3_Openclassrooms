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
          new Route('homepage', 'Home', 'homepage'),
            new Route('chapitres', 'Chapitre', 'chapitre'),
            new Route('autobiographie', 'Autiobio', 'autiobiographie'),
            new Route('contact', 'Contact', 'contact'),
            new Route('connection', 'Connection', 'connection'),
        ];
    }

}