<?php
/**
 * Validate if a field contains a valid email address.
 *
 * @param string $field The field name being validated.
 * @return false|string False if the email is invalid, or the raw POST input if valid.
 */
function email(string $field): false|string
{
    $emailIsValid = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

    if (!$emailIsValid)
    {
        setFlash($field, 'This field requires a valid email address.');
        return false;
    }
    return filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
}