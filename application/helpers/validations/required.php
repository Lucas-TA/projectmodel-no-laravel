<?php
/**
 * Check if a field is required and not empty.
 *
 * @param string $field The field name being validated.
 * @return false|string False if the field is empty, or the raw POST input if valid.
 */
function required(string $field): false|string
{
    if ($_POST[$field] === '')
    {
        setFlash($field, 'This field is required.');
        return false;
    }
    return filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
}