<?php

namespace Validation;

class Length extends Constraint
{
    public string $maxMessage = "This value is too long. It should have %d character or less.\n";
    public string $minMessage = "This value is too short. It should have %d character or more.\n";
    public string $exactMessage = "This value should have exactly %d character.\n";

    protected const TOO_SHORT_ERROR = 'TOO_SHORT_ERROR';
    protected const TOO_LONG_ERROR = 'TOO_LONG_ERROR';
    protected const NOT_EQUAL_LENGTH_ERROR = 'NOT_EQUAL_LENGTH_ERROR';

    public int $max;
    public int $min;
    public int $exact;
    public int $value;
    public bool $normalize;
    /**
     * @param int $max
     * @param int $min
     * @param int $exact
     */
    public function __construct(int $min = -1, int $max = -1, int $exact = -1) {
        parent::__construct();
        $this->max = $max;
        $this->min = $min;
        $this->exact = $exact;
    }

    /**
     * @param mixed $value
     * @return void
     */
    public function normalization(mixed $value): void
    {
        $this->value = strlen($value);
    }

    /**
     * @param mixed $value
     * @return ?string
     */
    public function checkConstraint(mixed $value): ?string
    {
        if (parent::checkCorrectTypeValue("string", $value)){
            $this->normalization($value);
            if ($this->max != -1 && $this->value > $this->max) {
                print(sprintf($this->maxMessage, $this->max));
                return self::TOO_LONG_ERROR;
            }
            if ($this->min != -1 && $this->value < $this->min) {
                print(sprintf($this->minMessage, $this->min));
                return self::TOO_SHORT_ERROR;
            }
            if ($this->exact != -1 && $this->value != $this->exact) {
                print(sprintf($this->exactMessage, $this->exact));
                return self::NOT_EQUAL_LENGTH_ERROR;
            }
        }
        else {
            return parent::VALUE_ERROR;
        }
        return null;
    }
}