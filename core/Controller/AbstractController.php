<?php

namespace Core\Controller;

use Core\Service\Util\FlashBag;
use http\Header;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

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
            self::$twig->addFunction(new TwigFunction('flashbag', function (){
                return FlashBag::getInstance()->getFlashs();
            }));
        }
    }

    public function render(string $name, array $context = [])
    {
        echo self::$twig->render($name, $context);
    }

    public function redirectTo(string $url)
    {
        header('Location: '. $url);
        die();
    }


}