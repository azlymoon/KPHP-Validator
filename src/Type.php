<?php

namespace Validation;

class Type extends Constraint
{
    public string $invalid_type_message = "This value should be of type %s.\n";
    public string $incorrect_type_message = "Incorrect type.\n";
    protected const INVALID_TYPE_ERROR = 'INVALID_TYPE_ERROR';
    protected const INCORRECT_TYPE_ERROR = 'INCORRECT_TYPE_ERROR';
    protected string $type;

    protected array $types = array (
        'boolean',
        'integer',
        'double',
        'string',
        'array',
        'object',
        'resource',
        'null'
    );

    public function __construct(string $type)
    {
        parent::__construct();
        $this->type = $type;
    }

    public function normalization(mixed $value): void {}

    /**
     * @param mixed $value
     * @return ?string
     */
    public function checkConstraint(mixed $value): ?string
    {
        if (in_array($this->type, $this->types)){
            if (gettype($value) !== $this->type) {
                print(sprintf($this->invalid_type_message, $this->type));
                return self::INVALID_TYPE_ERROR;
            }
        }
        else{
            print($this->incorrect_type_message);
            return self::INCORRECT_TYPE_ERROR;
        }
        return null;
    }
}