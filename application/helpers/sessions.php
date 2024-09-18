<?php
function user($logged)
{
    if (isset($_SESSION[$logged]))
    {
        return $_SESSION[$logged];
    }
}
function logged($logged): bool
{
    return isset($_SESSION[$logged]);
}