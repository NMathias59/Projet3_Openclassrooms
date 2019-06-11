<?php

namespace core\controller;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController
{
    private static $twig;

    /**
     * AbstractController constructor.
     */
    public function __construct()
    {
        if (self::$twig === null) {
            $loader = new FilesystemLoader('../template');
            self::$twig = new Environment($loader, [
                'debug' => true,
            ]);
            self::$twig->addExtention(new DebugExtension());
        }
    }

    public function render(string $name, array $context = [])
    {
        echo self::$twig->reder($name, $context);
    }

}