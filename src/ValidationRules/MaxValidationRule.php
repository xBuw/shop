<?php

namespace Shop\ValidationRules;

use xbuw\framework\Validation\AbstractValidationRule;

class MaxValidationRule extends AbstractValidationRule
{

    function check(string $field_name, $field_value, array $params): bool
    {
        return floatval($field_value) <= floatval($params[0]);
    }

    public function getError(string $field_name, $field_value, array $params): string
    {
        return "$field_name field must be less than " . $params[0];
    }
}