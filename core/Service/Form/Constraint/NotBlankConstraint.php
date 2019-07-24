<?php

namespace Core\Service\Form\Constraint;


class NotBlankConstraint extends AbstractConstraint
{
    public function isValid($data): bool
    {
        return !empty($data);
    }
}