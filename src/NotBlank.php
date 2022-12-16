<?php

namespace Validation;

class NotBlank extends Constraint
{
    public string $message = "This value should not be blank.\n";

    protected const IS_BLANK_ERROR = 'IS_BLANK_ERROR';

    public function __construct(){
        parent::__construct();
    }

    public function normalization(mixed $value): void{}

    /**
     * @param mixed $value
     * @return ?string
     */
    public function checkConstraint(mixed $value): ?string
    {
        if (parent::checkCorrectTypeValue("string", $value)) {

            if (empty($value)) {
                print($this->message);
                return self::IS_BLANK_ERROR;
            }
            return null;
        }
        else{
            return parent::VALUE_ERROR;
        }
    }
}