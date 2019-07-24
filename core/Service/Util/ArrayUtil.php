<?php

namespace Core\Service\Util;

class ArrayUtil
{
    static public function get(array $array, string $key, $default = null)
    {
        return $array[$key] ?? $default;
    }

    static public function exist(array $array, string $key): bool
    {
        return isset($array[$key]);
    }
}