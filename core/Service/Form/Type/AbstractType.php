<?php

namespace Core\Service\Form\Type;


use Core\Service\Form\Constraint\AbstractConstraint;

abstract class AbstractType
{
    protected $value;
    protected $constraints;

    public function __construct(array $constraints = [])
    {
        $this->constraints = [];
        foreach ($constraints as $constraint) {
            $this->addConstraint($constraint);
        }
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    protected function addConstraint(AbstractConstraint $constraint)
    {
        $this->constraints[] = $constraint;
    }

    public function isValid()
    {
        $isValid = true;
        /** @var AbstractConstraint $constraint */
        foreach ($this->constraints as $constraint) {
            $isValid = $isValid && $constraint->isValid($this->value);
        }

        return $isValid;
    }
}