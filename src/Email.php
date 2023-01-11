<?php

namespace validator;

class Email extends Constraint
{
    public string $message = "This value should be correct\n";

    protected const VALIDATE_EMAIL = "/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i";
    protected const EMAIL_ERROR = 'EMAIL_ERROR';

    public function __construct(){
        parent::__construct();
    }

    public function normalization(mixed $value): void{}

    /**
     * @param mixed $email
     * @return ?string
     */
    public function checkConstraint(mixed $email): ?string
    {
        if (parent::checkCorrectTypeValue("string", $email)) {
            if (!preg_match(self::VALIDATE_EMAIL, $email)) {
                print($this->message);
                return self::EMAIL_ERROR;
            }
            return null;
        }
        return parent::VALUE_ERROR;
    }
}