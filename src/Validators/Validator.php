<?php

namespace NW\WebService\References\Operations\Notification\Validators;

class Validator
{
    protected array $rules = [];
    protected array $errors = [];

    public function __construct($rules = [])
    {
        foreach ($rules as $key => $value) {
            $explodeRules = explode('|', $value);
            foreach ($explodeRules as $rule) {
                $rule = trim($rule);
                if (!empty($rule)) {
                    $this->rules[$key][] = $rule;
                }
            }
        }
    }

    public function isValid($fields): bool
    {
        $this->errors = [];

        foreach ($fields as $key => $value) {
            foreach ($this->rules[$key] as $rule) {
                switch ($rule) {
                    case 'required':
                        if (empty($value)) {
                            $this->errors[] = 'Empty key ' . $key;
                        }
                        break;
                    case 'integer':
                        if (!empty($value) && !filter_var($value, FILTER_VALIDATE_INT)) {
                            $this->errors[] = 'Incorrect integer value with key ' . $key;
                        }
                        break;
                    default:
                        break;
                }
            }
        }

        return !empty($this->errors);
    }

    public function getLastErrors(): array
    {
        return $this->errors;
    }
}