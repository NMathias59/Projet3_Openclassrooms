<?php


namespace Core\Service\Util;


abstract class CsrfUtil
{
    static public function generateToken()
    {
        $csrf = [
            'token' => bin2hex(md5(rand())),
            'createdAt' => new \DateTime()
        ];

        SessionUtil::getInstance()->set('csrf', $csrf);

        return $csrf['token'];
    }

}

