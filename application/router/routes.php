<?php
return [
    'POST' => [
        '/login' => 'Login@store',
        '/user/store' => 'User@store',
    ],
    'GET' => [
        '/' => 'Home@index',
        '/login' => 'Login@index',
        '/user/create' => 'User@create',
        '/users' => 'Users@index',
        '/user/[0-9]+'=> 'User@show',
        '/logout' => 'Login@destroy',
    ]
];