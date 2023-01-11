<?php

namespace validator;

class Validator
{
    public array $errors = [];
    protected const KEY_ERROR = 'KEY_ERROR';

    function __construct(){}

    /**
     * @param array $form
     * @param ConstraintList $constraintList
     * @return void
     */
    function validate(array $form, ConstraintList $constraintList): void
    {
        foreach ($form as $key => $item) {
            $constraints = $constraintList->getConstraints();
            if (array_key_exists($key, $constraints)) {
                foreach ($constraints[$key] as $constraint) {
                    /** @var Constraint $constraint */
                    $this->errors[$key][] = $constraint->checkConstraint($item);

                }
            } else {
                $this->errors[$key][] = self::KEY_ERROR;
            }
        }
        return;
    }
}