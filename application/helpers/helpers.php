<?php
function isAjax(): bool
{
    return isset($_SERVER['HTTP_HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}