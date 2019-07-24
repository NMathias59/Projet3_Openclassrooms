<?php

namespace Core\Service\Form\Constraint;


abstract class AbstractConstraint
{
    public abstract function isValid($data): bool;
}