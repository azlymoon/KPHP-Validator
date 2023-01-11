<?php

namespace validator;

abstract class Constraint
{
    protected const VALUE_ERROR = 'VALUE_ERROR';

    public function __construct(){}

    abstract public function normalization(mixed $value): void;

    abstract public function checkConstraint(mixed $value): string|null;

    /**
     * @param string $correct_type
     * @param mixed $value
     * @return bool
     */
    protected function checkCorrectTypeValue(string $correct_type, mixed $value): bool
    {
        if (gettype($value) == $correct_type)
            return true;
        return false;
    }

}