<?php

namespace Validation;

class ConstraintListFactory
{
    public function ConstraintListFactory(): ConstraintList
    {
        return new ConstraintList();
    }
}