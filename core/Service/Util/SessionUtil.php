<?php


namespace Core\Service\Util;


class SessionUtil
{
    static private $instance = null;

    private function __construct()
    {
        $this->sessionStart();
    }

    private function sessionStart()
    {
        session_start();
    }

    static public function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new SessionUtil();
        }

        return self::$instance;
    }

    public function set(string $key, $data)
    {
        $_SESSION[$key] = $data;
    }

    public function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public function remove(string $key)
    {
        unset($_SESSION[$key]);
    }
}