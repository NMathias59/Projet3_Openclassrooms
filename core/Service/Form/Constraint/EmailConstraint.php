<?php

namespace Core\Service\Form\Constraint;


class EmailConstraint extends AbstractConstraint
{
    public function isValid($data): bool
    {
        if (empty($data)) {
            return true;
        }

        return filter_var($data, FILTER_VALIDATE_EMAIL);
    }
}