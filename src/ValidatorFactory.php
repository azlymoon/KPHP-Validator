<?php

namespace Validation;

class ValidatorFactory
{
    public function ValidatorFactory(): Validator
    {
        return new Validator();
    }
}