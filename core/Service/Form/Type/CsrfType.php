<?php


namespace Core\Service\Form\Type;


use Core\Service\Util\CsrfUtil;
use Core\Service\Util\SessionUtil;

class CsrfType extends AbstractType
{
    public function initToken() {

        $csrfToken = CsrfUtil::generateToken();

        $this->setValue($csrfToken);

        return $this->getValue();
    }
}