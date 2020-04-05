<?php


namespace Core\Router;


use App\Config\Routes;

class Router
{
    public function run(string $uri): void
    {
        $route = $this->findRouteByUri($uri);

        if ($route === null) {
            echo '404 not found';
            die();
        }

        $controllerName = $route->getController() . 'Controller';
        $controllerFullName = 'App\\Controller\\' . $controllerName;
        $actionName = $route->getAction() . 'Action';

        if (!class_exists($controllerFullName)) {
            echo '500 controller doesn\'t exist';
            die();
        }

        $controller = new $controllerFullName();
//var_dump($actionName, $controller);
        if (!method_exists($controller, $actionName)) {
            echo '500 action doesn\'t exist';
            die();
        }

        $controller->$actionName();
    }

    private function findRouteByUri(string $uri): ?Route
    {
        $routes = new Routes();
        foreach ($routes->getRoutes() as $route) {
            if ($route->getUri() === $uri) {
                return $route;
            }
        }

        return null;
    }
}