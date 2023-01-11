<?php

namespace validator;

class ValidatorFactory
{
    public function ValidatorFactory(): Validator
    {
        return new Validator();
    }
}