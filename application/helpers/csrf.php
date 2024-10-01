<?php
function getCsrf(): string
{
    $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(8));

    return "<input name=\"csrf\" type=\"hidden\" value=\"{$_SESSION['csrf']}\">";
}
function checkCsrf(): void
{
    $csrf = filter_input(INPUT_POST, 'csrf', FILTER_UNSAFE_RAW);
    if (!$csrf)
    {
        throw new Exception('Token is not valid');
    }
    if (!isset($_SESSION['csrf']))
    {
        throw new Exception('Token is not valid');
    }
    if ($csrf !== $_SESSION['csrf'])
    {
        throw new Exception('Token is not valid');
    }
    unset($_SESSION['csrf']);
}