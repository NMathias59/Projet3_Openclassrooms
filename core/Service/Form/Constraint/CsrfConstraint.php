<?php

namespace Core\Service\Form\Constraint;


use Core\Service\Util\SessionUtil;

class CsrfConstraint extends AbstractConstraint
{
    public function isValid($data): bool
    {
        $csrf = SessionUtil::getInstance()->get('csrf');

        if (!$csrf) {
            return false;
        }

        if ($csrf['createdAt']->diff(new \DateTime())->i > 10) {
            return false;
        }

        return $data === $csrf['token'];
    }
}