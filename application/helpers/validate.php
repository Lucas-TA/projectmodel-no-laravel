<?php
/**
 * Validate an array of fields using single or multiple validation rules.
 * @param array $validations Associative array where keys are field names and values are validation rules.
 * @return false|array False if any validation fails, or an array of results for each field.
 */
function validate(array $validations): false|array
{
    $result = [];
    $part = "";
    foreach ($validations as $field => $validation)
    {
        $result[$field] = (!str_contains($validation, '|'))
            ?
            singleValidation($validation, $field, $part)
            :
            multipleValidations($validation, $field, $part);
    }
    if (in_array(false, $result))
    {
        return false;
    }
    return $result;
}
