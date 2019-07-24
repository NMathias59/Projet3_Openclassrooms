<?php


namespace Core\Service\Util;


class FlashBag
{
    const FLASH_BAG_SESSION = 'FLASH_BAG_SESSION';

    static private $instance = null;

    static public function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new FlashBag();
        }

        return self::$instance;
    }

    private $sessionUtil;

    private function __construct()
    {
        $this->sessionUtil = SessionUtil::getInstance();
    }

    public function addFlash(string $message, string $type = 'info')
    {
        $flashs = $this->sessionUtil->get(self::FLASH_BAG_SESSION, []);
        $flashs[$type][] = $message;

        $this->sessionUtil->set(self::FLASH_BAG_SESSION, $flashs);
    }

    public function getFlashs()
    {
        $message = $this->sessionUtil->get(self::FLASH_BAG_SESSION);
        $this->sessionUtil->remove(self::FLASH_BAG_SESSION);
        return $message;
    }

    public function hasFlashs()
    {
        return !empty($this->sessionUtil->get(self::FLASH_BAG_SESSION));
    }
}