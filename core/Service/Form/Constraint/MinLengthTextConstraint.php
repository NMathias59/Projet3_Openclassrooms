<?php

namespace Core\Service\Form\Constraint;


class MinLengthTextConstraint extends AbstractConstraint
{
    /**
     * @var int
     */
    private $min;

    public function __construct(int $min)
    {
        $this->min = $min;
    }

    public function isValid($data): bool
    {
        return (strlen($data) > $this->min);
    }
}