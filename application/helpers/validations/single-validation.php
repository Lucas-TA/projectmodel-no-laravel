<?php
/**
 * Apply a single validation rule to a field.
 *
 * @param string $validation The validation rule to apply.
 * @param string $field The field name being validated.
 * @param string $part Optional parameter for validation details (e.g., max length).
 * @return mixed The result of the validation or false if validation fails.
 */
function singleValidation(string $validation, string $field, string $part): mixed
{
    if (str_contains($validation, ':'))
    {
        [$validation, $part] = explode(':', $validation);
    }
    return $validation($field, $part);
}