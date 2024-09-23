<?php
/**
 * Validate that a field's value does not exceed a maximum length.
 *
 * @param string $field The field name being validated.
 * @param string $part The maximum allowed length.
 * @return false|string False if the length exceeds the maximum, or the raw POST input if valid.
 */
function maxLen(string $field, string $part): false|string
{
    $data = filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
    if (strlen($data) > $part)
    {
        setFlash($field, 'This field is too long.');
        return false;
    }
    return $data;
}