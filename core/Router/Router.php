<?php


namespace core\Router;


class Router
{
    public function run(string $uri): void
    {
        $route = $this->findRoutebyUri($uri);

        if ($route === null) {
            echo '404 not found';
            die();
        }

        $controllerName = ucfirst($route->getController()) . 'Controller';
        $controllerFullName = 'App\\Controller\\' . $controllerName;
        $actionName  = $route->getAction() . 'Action';

        if (!class_exists($controllerFullName)) {
            echo '500 controller doesn\'t exist';
            die();
        }
        $controller->$actionName();
    }

    private function findRouteByUri(string $uri): ?Route
    {
        $routes = new Routes();
        foreach ($routes->getRoutes() as $Route) {
            if ($route->getUri() === $uri){
                return $route;
            }
        }

        return null;
    }
}