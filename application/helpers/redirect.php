<?php
function redirect($to): null
{
    return header('Location: '. $to);
    exit();
}
function setMessageAndRedirect($index, $message, $redirectTo): null
{
    setFlash($index, $message);
    return redirect($redirectTo);
}