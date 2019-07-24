<?php


namespace Core\Service\Form\Type;


use Core\Service\Util\SessionUtil;

class CsrfType extends AbstractType
{
    public function initToken() {
        $csrf = [
            'token' => bin2hex(md5(rand())),
            'createdAt' => new \DateTime()
        ];

        SessionUtil::getInstance()->set('csrf', $csrf);

        $this->setValue($csrf['token']);

        return $this->getValue();
    }
}