<?php
return [
    'POST' => [
        '/login' => 'Login@store'
    ],
    'GET' => [
        '/' => 'Home@index',
        '/login' => 'Login@index',
        '/user/register' => 'User@register',
        '/user/[0-9]+'=> 'User@show',
        '/logout' => 'Login@destroy',
    ]
];