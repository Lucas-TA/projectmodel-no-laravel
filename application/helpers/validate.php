<?php
function validate(array $validations): false|array
{
    $result = [];
    $part = "";
    foreach ($validations as $field => $validation)
    {
        if (!str_contains($validation, '|'))
        {
            if (str_contains($validation, ':'))
            {
                [$validation, $part] = explode(':', $validation);
            }
            $result[$field] = $validation($field, $part);
        } else {
            $explodedPipeFromValidation = explode('|', $validation);
            foreach ($explodedPipeFromValidation as $validation) {
                if (str_contains($validation, ':'))
                {
                    [$validation, $part] = explode(':', $validation);
                }
                $result[$field] = $validation($field, $part);
            }
        }
    }
    if (in_array(false, $result))
    {
        return false;
    }
    return $result;
}
function required($field)
{
    if ($_POST[$field] === '')
    {
        setFlash($field, 'This field is required.');
        return false;
    }
    return filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
}
function email($field)
{
    $emailIsValid = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

    if (!$emailIsValid)
    {
        setFlash($field, 'This field requires a valid email address.');
        return false;
    }
    return filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
}

function unique($field, $part)
{
    if (empty($part)) {
        var_dump('erro sem part');
        die();
    }
    $data = filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
    $user = findBy($part, $field, $data);


    if ($user) {
        setFlash($field, 'This field is already in use.');
        return false;
    }
    setFlash($field, 'Deu certo');
    return $data;
//    var_dump($user);
//    die();
}
function maxLen()
{

}