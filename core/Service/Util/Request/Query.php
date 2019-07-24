<?php

namespace Core\Service\Util\Request;


use Core\Service\Util\ArrayUtil;

class Query
{
    static public function get(string $key, $default = null)
    {
        return ArrayUtil::get($_GET, $key, $default);
    }

    static public function exist(string $key): bool
    {
        return isset($_GET[$key]);
    }
}