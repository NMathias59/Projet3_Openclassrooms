<?php

namespace Core\Service\Form\Constraint;


class MaxLengthTextConstraint extends AbstractConstraint
{
    /**
     * @var int
     */
    private $max;

    public function __construct(int $max)
    {
        $this->max = $max;
    }

    public function isValid($data): bool
    {
        return (strlen($data) < $this->max);
    }
}