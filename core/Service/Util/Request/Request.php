<?php
namespace Core\Service\Util\Request;


use Core\Service\Util\ArrayUtil;

class Request
{
    static public function get(string $key, $default)
    {
        return ArrayUtil::get($_POST, $key, $default);
    }

    static public function exist(string $key): bool
    {
        return isset($_POST[$key]);
    }
}