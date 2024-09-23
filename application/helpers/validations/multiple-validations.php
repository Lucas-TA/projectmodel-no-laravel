<?php
/**
 * Apply multiple validation rules to a field.
 *
 * @param string $validation Pipe-separated string of validation rules (e.g., 'required|email').
 * @param string $field The field name being validated.
 * @param string $part Optional parameter for validation details (e.g., max length).
 * @return array Associative array of validation results for each rule.
 */
function multipleValidations(string $validation, string $field, string $part): array
{
    $result = [];
    $explodedPipeFromValidation = explode('|', $validation);
    foreach ($explodedPipeFromValidation as $validation) {
        if (str_contains($validation, ':'))
        {
            [$validation, $part] = explode(':', $validation);
        }
        $result[$field] = $validation($field, $part);
    }
    return $result;
}