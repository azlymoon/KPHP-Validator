<?php

namespace validator;

class ConstraintList
{
    /** @var Constraint[][] $constraints */
    private array $constraints = [[]];

    /**
     * @param string $name
     * @param Constraint $rule
     */
    public function addConstraint(string $name, Constraint $rule): void {
        $this->constraints[$name][] = $rule;
    }

    /** @return Constraint[][] */
    public function getConstraints(): array{
        return $this->constraints;
    }

}