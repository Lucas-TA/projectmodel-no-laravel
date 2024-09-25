<?php

namespace application\controllers;

use JetBrains\PhpStorm\NoReturn;

class Home
{
    public function index($parts): array
    {
        $users = fetchAll('users');
        return [
          'view' => 'home',
            'data' => [
                'title' => 'Home',
                'users' => $users
            ]
        ];
    }
}