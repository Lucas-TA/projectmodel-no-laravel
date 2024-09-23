<?php
/**
 * Validate that a field's value is unique in the database.
 *
 * @param string $field The field name being validated.
 * @param string $part The database table or context for uniqueness check.
 * @return false|string False if the value is not unique, or the raw POST input if valid.
 */
function unique(string $field, string $part): false|string
{
    $data = filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
    $user = findBy($part, $field, $data);


    if ($user) {
        setFlash($field, 'This field is already in use.');
        return false;
    }
    return $data;
}