<?php


namespace Core\Router;


class Route
{
    private $uri;
    private $controller;
    private $action;

    /**
     * Route constructor.
     * @param $uri
     * @param $controller
     * @param $action
     */
    public function __construct($uri, $controller, $action)
    {
        $this->uri = $uri;
        $this->controller = $controller;
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }
}