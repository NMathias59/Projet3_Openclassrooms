<?php

namespace Core\Controller;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController
{
    private static $twig;

    public function __construct()
    {
        if (self::$twig === null) {
            $loader = new FilesystemLoader('../template');
            self::$twig = new Environment($loader, [
                'debug' => true,
            ]);
            self::$twig->addExtension(new DebugExtension());
            self::$twig->addExtension(new \Twig_Extensions_Extension_Text());
        }
    }

    public function render(string $name, array $context = [])
    {
        echo self::$twig->render($name, $context);
    }
}