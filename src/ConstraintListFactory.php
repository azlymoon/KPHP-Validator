<?php

namespace validator;

class ConstraintListFactory
{
    public function ConstraintListFactory(): ConstraintList
    {
        return new ConstraintList();
    }
}