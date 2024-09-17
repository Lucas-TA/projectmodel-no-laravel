<?php
return [
    '/' => 'Home@index',
    '/user/register' => 'User@register',
    '/user/[0-9]+'=> 'User@show',
];